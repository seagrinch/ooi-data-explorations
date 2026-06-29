#!/usr/bin/env python3
"""Extract sediment point placemarks from the SERC KMZ into a lean GeoJSON file.

Usage:
  python3 extract_sediment_points.py \
    --kmz surficial_sediment.kmz \
    --out sediment_points.geojson

This script keeps only lightweight fields useful for mapping and filtering:
  - sediment_type (from top-level sediment folder)
  - program (parsed from popup metadata when present)
  - site_name (placemark name)
  - symbol_type (filled/open from styleUrl hint)
  - lithology_summary (first bold text in description when available)
    - water_depth_m (parsed numeric water depth in meters)
"""

from __future__ import annotations

import argparse
import json
import re
import sys
import xml.etree.ElementTree as ET
import zipfile
from pathlib import Path


KML_NS = "http://www.opengis.net/kml/2.2"
NS = {"k": KML_NS}


def local_name(tag: str) -> str:
    if "}" in tag:
        return tag.rsplit("}", 1)[1]
    return tag


def get_text(el: ET.Element | None) -> str:
    if el is None or el.text is None:
        return ""
    return el.text.strip()


def parse_first_bold(description_html: str) -> str:
    # First <b>...</b> is the short lithology summary in this KMZ.
    m = re.search(r"<b>(.*?)</b>", description_html, flags=re.IGNORECASE | re.DOTALL)
    if not m:
        return ""
    return re.sub(r"\s+", " ", m.group(1)).strip()


def parse_program(description_html: str) -> str:
    m = re.search(
        r"<b>Program:</b>\s*</td>\s*<td[^>]*>(.*?)</td>",
        description_html,
        flags=re.IGNORECASE | re.DOTALL,
    )
    if not m:
        return ""
    return re.sub(r"\s+", " ", m.group(1)).strip()


def parse_symbol_type(style_url: str) -> str:
    s = style_url.lower()
    if "donut" in s:
        return "open"
    if "shaded_dot" in s:
        return "filled"
    return "unknown"


def parse_water_depth_m(description_html: str) -> float | None:
    m = re.search(
        r"<b>Water\s*Depth:</b>\s*</td>\s*<td[^>]*>\s*([-+]?\d*\.?\d+)\s*m\s*</td>",
        description_html,
        flags=re.IGNORECASE | re.DOTALL,
    )
    if not m:
        return None
    try:
        return float(m.group(1))
    except ValueError:
        return None


def parse_lon_lat(coord_text: str) -> tuple[float, float] | None:
    # KML Point coordinates are lon,lat[,alt]
    parts = [p.strip() for p in coord_text.split(",")]
    if len(parts) < 2:
        return None
    try:
        lon = float(parts[0])
        lat = float(parts[1])
    except ValueError:
        return None
    return lon, lat


def find_sediment_root(root: ET.Element) -> ET.Element | None:
    for folder in root.findall(".//k:Folder", NS):
        name = get_text(folder.find("k:name", NS))
        if name == "Surficial Sea Floor Sediment Map Data":
            return folder
    return None


def extract_features(root: ET.Element) -> list[dict]:
    sediment_root = find_sediment_root(root)
    if sediment_root is None:
        raise ValueError("Could not find 'Surficial Sea Floor Sediment Map Data' folder in KML")

    features: list[dict] = []

    # Top-level children under sediment_root are sediment categories.
    for sediment_folder in sediment_root.findall("k:Folder", NS):
        sediment_type = get_text(sediment_folder.find("k:name", NS))
        if not sediment_type:
            continue

        for pm in sediment_folder.findall(".//k:Placemark", NS):
            point = pm.find("k:Point", NS)
            if point is None:
                continue

            coord_el = point.find("k:coordinates", NS)
            coord_text = get_text(coord_el)
            lon_lat = parse_lon_lat(coord_text)
            if lon_lat is None:
                continue
            lon, lat = lon_lat

            site_name = get_text(pm.find("k:name", NS))
            style_url = get_text(pm.find("k:styleUrl", NS))
            description_html = get_text(pm.find("k:description", NS))

            lithology_summary = parse_first_bold(description_html)
            program = parse_program(description_html)
            water_depth_m = parse_water_depth_m(description_html)

            # Fallback if popup metadata is missing.
            if not program and site_name:
                program = site_name.split(" ", 1)[0]

            feature = {
                "type": "Feature",
                "geometry": {
                    "type": "Point",
                    "coordinates": [lon, lat],
                },
                "properties": {
                    "sediment_type": sediment_type,
                    "program": program,
                    "site_name": site_name,
                    "symbol_type": parse_symbol_type(style_url),
                    "lithology_summary": lithology_summary,
                    "water_depth_m": water_depth_m,
                },
            }
            features.append(feature)

    return features


def parse_args() -> argparse.Namespace:
    p = argparse.ArgumentParser(description="Extract sediment points from KMZ to GeoJSON")
    p.add_argument("--kmz", required=True, help="Path to source KMZ file")
    p.add_argument("--out", required=True, help="Path to output GeoJSON file")
    return p.parse_args()


def main() -> int:
    args = parse_args()
    kmz_path = Path(args.kmz)
    out_path = Path(args.out)

    if not kmz_path.exists():
        print(f"ERROR: KMZ not found: {kmz_path}", file=sys.stderr)
        return 1

    with zipfile.ZipFile(kmz_path, "r") as zf:
        if "doc.kml" not in zf.namelist():
            print("ERROR: KMZ does not contain doc.kml", file=sys.stderr)
            return 1
        kml_bytes = zf.read("doc.kml")

    root = ET.fromstring(kml_bytes)
    features = extract_features(root)

    fc = {
        "type": "FeatureCollection",
        "features": features,
    }

    out_path.parent.mkdir(parents=True, exist_ok=True)
    out_path.write_text(json.dumps(fc, indent=2), encoding="utf-8")

    print(f"Wrote {len(features)} features to {out_path}")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
