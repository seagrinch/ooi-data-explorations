/* 
OOI Data Labs Notebook - Tectonics Activity #2 - Toggle Eq by Depth and Volcanoes

Revised for the Third Edition by Sage Lichtenwalner, March 3, 2025.
Major rewrite for the Second Edition 7/9-12/2021.
Created for OOI Lab Manual by Sage Lichtenwalner, 8/14/2020.  
Originally adapted from the Tectonics and Plate Movement - Exploration Widget
OOI Data Labs 2019

This code was adapted from the following references
http://bl.ocks.org/tnightingale/4718717
https://bost.ocks.org/mike/leaflet/
http://bl.ocks.org/sumbera/10463358
https://bl.ocks.org/rgdonohue/51c43bb749689e696b8a

Leaflet Draw references
http://www.d3noob.org/2014/01/using-leafletdraw-plugin-for-leafletjs.html
http://leaflet.github.io/Leaflet.draw/docs/leaflet-draw-latest.html

Other ideas...
https://docs.mapbox.com/mapbox-gl-js/example/timeline-animation/
https://observablehq.com/@nchavez1/class-2-21-2019-earthquakes-on-leaflet
https://observablehq.com/search?query=earthquakes

New references (July 2021)...
https://deneli.us/an-introduction-to-d3-js-and-leaflet/
https://leafletjs.com/examples/choropleth/
https://codepen.io/ryshackleton/pen/NpdNjJ
https://www.d3-graph-gallery.com/graph/bubble_template.html
*/

$(document).ready(function() {
    // Global objects
    var myMap, myChart, dateRangeControl, playInterval;
    var isPlaying = false;
    var container = L.DomUtil.get('map');
    var zoomlevel = container.dataset.zoom || 5;
    var mapcenter = container.dataset.center ? JSON.parse(container.dataset.center) : [44, -128 + 360]; // Wrap points around Dateline
    var selected_days = container.dataset.days || 30;

    d3.csv(container.dataset.source, formatData, function(error, data) {
        if (error) throw error;

        function reformat(array) {
            return array.map(function(d, i) {
                return {
                    id: i,
                    type: "Feature",
                    geometry: {
                        coordinates: [+d.longitude + 360, +d.latitude], // Wrap points around Dateline
                        type: "Point"
                    },
                    properties: {
                        time: d.time,
                        depth: d.depth,
                        mag: d.mag,
                    }
                };
            });
        }

        var geoData = { type: "FeatureCollection", features: reformat(data) };

        addMaps();
        drawFeatures(geoData);

        myChart = timeseries_chart()
            .x(getTime).xLabel("Earthquake origin time")
            .y(getMagnitude).yLabel("Earthquake Magnitude")
            .days(selected_days);

        d3.select("#chart").datum(data).call(myChart);

        addVolcanoes();
    });

    function addMaps() {
        myMap = L.map(container, {
            crs: L.CRS.EPSG3857,
            maxBounds: [[-80, 0], [85, 360]], // Center around Dateline
            minZoom: 1,
            maxZoom: 8,
//preferCanvas: true,   
      //worldCopyJump: true, 
        }).setView(mapcenter, zoomlevel);

        // Basemap
        var baseMap = L.tileLayer.wms('https://www.gmrt.org/services/mapserver/wms_merc?', {
            attribution: 'Global Multi-Resolution Topography (<a href="https://www.gmrt.org">GMRT</a>)',
            layers: 'topo',
            format: 'image/png',
            transparent: true,
            crs: L.CRS.EPSG3857
        }).addTo(myMap);

        // Dataset boundary
        var data_bounds = [[40, -132 + 360], [49, -118 + 360]];
        var data_rect = L.rectangle(data_bounds, {
            color: 'grey',
            weight: 2,
            fill: false
        }).addTo(myMap);

        // Draw Layer
        var drawnItems = new L.FeatureGroup();
        myMap.addLayer(drawnItems);
        var drawControl = new L.Control.Draw({
            draw: {
                polyline: {
                    shapeOptions: {
                        color: 'black'
                    },
                },
                circlemarker: false,
                circle: false,
                rectangle: false,
                polygon: false,
            },
            edit: {
                featureGroup: drawnItems
            }
        });
        myMap.addControl(drawControl);
        myMap.on('draw:created', function(e) {
            var layer = e.layer;
            drawnItems.addLayer(layer);
        });

        // Add SVG Layer for Earthquakes
        // L.svg({clickable:true}).addTo(myMap);

        // Add city markers and labels
        addCityMarkers();

        // Add date range control
        addDateRangeControl();
    }

    function togglePlayPause() {
        var button = document.getElementById('playPauseButton');
        if (isPlaying) {
            clearInterval(playInterval);
            button.innerText = 'Play';
        } else {
            playInterval = setInterval(animateGraph, 400);
            button.innerText = 'Pause';
        }
        isPlaying = !isPlaying;
    }
    document.getElementById('playPauseButton').addEventListener('click', togglePlayPause);

    function animateGraph() {
        var brush_box = d3.select("#brush_box");
        var x = myChart.xx();
        var brush = myChart.brush();
        var extent = d3.brushSelection(brush_box.node()) || x.range();
        var min_date = d3.timeMonth.offset(x.invert(extent[0]), 1);
        var max_date = d3.timeMonth.offset(x.invert(extent[1]), 1);
        // console.log(min_date, max_date);
        if (max_date > x.domain()[1]) {
            clearInterval(playInterval);
            document.getElementById('playPauseButton').innerText = 'Play';
            isPlaying = false;
        } else {
            brush_box.call(brush.move, [x(min_date), x(max_date)]);
        }
    }

    function addDateRangeControl() {
        dateRangeControl = L.control({ position: 'topright' });

        dateRangeControl.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info date-range');
            div.innerHTML = '<strong>Date Range</strong><div id="date-range-box" class="small">Select a range</div>';
            return div;
        };

        dateRangeControl.addTo(myMap);
    }

    function updateDateRange(startDate, endDate) {
        var dateRangeBox = document.getElementById('date-range-box');
        dateRangeBox.innerHTML = startDate.toISOString().split('T')[0] + ' to ' + endDate.toISOString().split('T')[0];
    }

    function addCityMarkers() {
        var cities = [
            { name: "Seattle", coords: [47.6062, -122.3321 + 360] },
            { name: "Portland", coords: [45.5152, -122.6784 + 360] },
            { name: "Bend", coords: [44.0582, -121.3153 + 360] },
            { name: "Axial Seamount", coords: [45.95, -130 + 360], isVolcano: true },
            { name: "Vancouver", coords: [49.2827, -123.1207 + 360] },
            { name: "Eugene", coords: [44.0521, -123.0868 + 360] }
        ];

        cities.forEach(function(city) {
            var marker = L.circleMarker(city.coords, {
                radius: 5,
                fillColor: city.isVolcano ? "#FFA500" : "#808080", // Orange for volcano, grey for cities
                color: "#000",
                weight: 1,
                opacity: 1,
                fillOpacity: 0.8
            }).addTo(myMap);

            marker.bindPopup('<b>' + city.name + '</b>');

            var label = L.marker(city.coords, {
                icon: L.divIcon({
                    className: 'city-label',
                    html: '<div style="color: #333; font-size: 11px; text-align: center; margin-top: 12px;">' + city.name + '</div>',
                    iconSize: [100, 20]
                })
            }).addTo(myMap);
        });
    }

    function printMapExtent() {
        var bounds = myMap.getBounds();
        console.log("Map extent:", bounds);
    }

    function drawFeatures(geoData) {
        var svg = d3.select('#map').select('svg')
            .attr("pointer-events", "auto");

        var g = svg.select("g");

        var transform = d3.geoTransform({ point: projectPoint });
        var path = d3.geoPath().projection(transform);

        var radius = d3.scaleLinear().domain([0, 9]).range([0, 15]);

        var featureElement = g.selectAll("path")
            .data(geoData.features)
            .enter().append("path")
            .attr("class", function(d) { return "circle selected, " + eqClass(d.properties.depth); })
            .style('stroke', 'grey')
            .style('stroke-width', 1)
            .style('fill', function(d) { return getColor(d.properties.depth); })
            .style("fill-opacity", 0.6)
            .attr("visibility", "hidden") // Hide map dots by default
            .attr("opacity", 0); // Hide map dots by default

        path.pointRadius(function(d) { return radius(d.properties.mag); });

        // Add Depth Legend
        var legend = L.control({ position: 'bottomright' });
        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info legend'),
                depths = [0, 10, 20, 30],
                labels = [];
            div.innerHTML = '<small>Earthquake Depth</small><br>';
            // loop through and generate a label with a colored square for each interval
            for (var i = 0; i < depths.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(depths[i] + 1) + '"></i> ' +
                    depths[i] + (depths[i + 1] ? '&ndash;' + depths[i + 1] + '<br>' : '+');
            }
            div.innerHTML += '<br><small>Earthquake Magnitude</small><br><div id="radius">';
            return div;
        };
        legend.addTo(myMap);

        // Add Magnitude Legend
        var legendsvg = d3.select("#radius").append("svg").attr('width', '120px').attr('height', '40px');
        var valuesToShow = [1, 3, 5, 7];
        legendsvg.selectAll("legend")
            .data(valuesToShow)
            .enter().append("circle")
            .attr("cx", function(d, i) { return i * 25 + 10; })
            .attr("cy", 15)
            .attr("r", function(d) { return radius(d); })
            .style("fill", "none")
            .attr("stroke", "black");
        legendsvg.selectAll("legend")
            .data(valuesToShow)
            .enter().append("text")
            .attr('x', function(d, i) { return i * 25 + 10; })
            .attr('y', 40)
            .text(function(d) { return d; })
            .style("font-size", 10)
            .attr('alignment-baseline', 'bottom')
            .attr('text-anchor', 'middle');

        myMap.on("moveend", update);

        update();

        function update() {
            featureElement.attr("d", path);
        }
    }

    function formatData(d) {
        d.date = d3.isoParse(d.time);
        d.latitude = +d.latitude;
        d.longitude = +d.longitude;
        d.depth = +d.depth;
        d.mag = +d.mag;
        return d;
    }

    function projectPoint(x, y) {
        var point = myMap.latLngToLayerPoint(new L.LatLng(y, x));
        this.stream.point(point.x, point.y);
    }

    function getColor(d) {
        return d > 30 ? '#00008B' : // DarkBlue (web colors)
            d > 20 ? '#2E8B57' : // SeaGreen (web colors)
            d > 10 ? '#FFA500' : // Orange (web colors)
            '#DC143C'; // Crimson (web colors)
    }

    function eqClass(d) {
        return d > 20 ? 'eqDeep' :
            d > 10 ? 'eqMid' :
            'eqShallow';
    }

    function getTime(d) {
        return d3.isoParse(d.time);
    }

    function getMagnitude(d) {
        return +d.mag;
    }

    function timeseries_chart() {
        var margin = { top: 5, right: 20, bottom: 40, left: 45 },
            width = 720 - margin.left - margin.right,
            height = 100;

        var x = d3.scaleUtc(),
            y = d3.scaleLinear(),
            x_label = "X", y_label = "Y",
            days = 30,
            brush = d3.brushX().extent([[0, 0], [width, height]]).on("brush end", _brushend),
            get_x = no_op,
            get_y = no_op;

        function timeseries(selection) {
            selection.each(function(d) {
                x.range([0, width]);
                y.range([height, 0]);

                var series = d3.select(this).append("svg").attr("id", "quake-timeseries")
                    .attr("width", width + margin.left + margin.right)
                    .attr("height", height + margin.top + margin.bottom)
                    .append("g").attr("id", "date-brush")
                    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                var x_axis = series.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + height + ")");

                var y_axis = series.append("g")
                    .attr("class", "y axis");

                x_axis.append("text")
                    .attr("class", "glabel")
                    .attr("x", width)
                    .attr("y", 30)
                    .style("text-anchor", "end")
                    .style("fill", "black")
                    .text(x_label);

                y_axis.append("text")
                    .attr("class", "glabel")
                    .attr("transform", "rotate(-90)")
                    .attr("y", -40)
                    .attr("dy", ".71em")
                    .style("text-anchor", "end")
                    .style("fill", "black")
                    .text(y_label);

                series.append("clipPath")
                    .attr("id", "clip")
                    .append("rect")
                    .attr("width", width - 1)
                    .attr("height", height - .25)
                    .attr("transform", "translate(1,0)");

                x.domain(d3.extent(d, get_x));
                x_axis.call(d3.axisBottom(x));

                y.domain([2.5, 7]);
                y_axis.call(d3.axisLeft(y).ticks(5));

                series.append("g").attr("class", "timeseries")
                    .attr("clip-path", "url(#clip)")
                    .selectAll("circle")
                    .data(d).enter()
                    .append("circle")
                    .style("stroke", "gray")
                    .style("stroke-width", 0.5)
                    .style('fill', function(d) { return getColor(d.depth); })
                    .attr("r", 2)
                    .attr("transform", function(d) {
                        return "translate(" + x(get_x(d)) + "," + y(get_y(d)) + ")";
                    });

                var min_date = d3.min(d, function(d) { return d.date; });
                var max_date = d3.max(d, function(d) { return d.date; });
                updateDateRange(min_date, max_date);

                series.append("g")
                    .attr('id', "brush_box")
                    .attr("class", "brush")
                    .call(brush)
                    .call(brush.move, [x(min_date), x(d3.timeDay.offset(min_date, days))]) // Preselect specified days
                    .selectAll("rect.selection")
                    .style("stroke", "#999")
                    .style("fill", "#157ab5");
            });
        }

        timeseries.x = function(accessor) {
            if (!arguments.length) return get_x;
            get_x = accessor;
            return timeseries;
        };

        timeseries.y = function(accessor) {
            if (!arguments.length) return get_y;
            get_y = accessor;
            return timeseries;
        };

        timeseries.xLabel = function(label) {
            if (!arguments.length) return x_label;
            x_label = label;
            return timeseries;
        };

        timeseries.yLabel = function(label) {
            if (!arguments.length) return y_label;
            y_label = label;
            return timeseries;
        };

        timeseries.days = function(n) {
            if (!arguments.length) return days;
            days = n;
            return timeseries;
        };

        var brushed = function(brush) {
            var s = d3.event.selection || x.range();
            var startDate = x.invert(s[0]);
            var endDate = x.invert(s[1]);
            updateDateRange(startDate, endDate);
            d3.selectAll(".circle").classed("selected", function(d) {
                var time = get_x(d.properties);
                return startDate <= time && time <= endDate;
            });
        };

        function _brushend() {
            brushed.call(null, brush);
        }

        function no_op() {}

        timeseries.xx = function() {
            return x;
        };

        timeseries.brush = function() {
            return brush;
        };

        return timeseries;
    }

    graph_zoom = function(days) {
        var brush_box = d3.select("#brush_box");
        var x = myChart.xx();
        var brush = myChart.brush();
        var extent = d3.brushSelection(brush_box.node()) || x.range();
        var min_date = x.invert(extent[0]);
        var max_date = d3.timeHour.offset(min_date, days * 24);
        brush_box.call(brush.move, [x(min_date), x(max_date)]);
    };

    toggle_dots = function(depth) {
        var showEarthquakes = d3.select('#' + depth).property('checked');
        var dots = d3.selectAll('.' + depth);
        if (showEarthquakes) {
            dots.attr("visibility", "visible");
            dots.attr("opacity", 1);
        } else {
            dots.attr("visibility", "hidden");
            dots.attr("opacity", 0);
        }
    };

    function addVolcanoes() {
        // Volcanoes
        var volcanoMarker = {
            radius: 4,
            fillColor: "#F5F5F5", // WhiteSmoke (web colors)
            color: "#888",
            weight: 1,
            opacity: 1,
            fillOpacity: 0.8
        };
        fetch('data/volcanoes-2025-02-28.csv')
            .then(res => res.text())
            .then(data => {
                var geoLayer = L.geoCsv(data, {
                    firstLineTitles: true,
                    fieldSeparator: ',',
                    latitudeTitle: 'Latitude',
                    longitudeTitle: 'Longitude',
                    coordsToLatLng: function(coords) {
                        var longitude = coords[0];
                        var latitude = coords[1];
                        if (longitude < 0) {
                            return L.latLng(latitude, longitude + 360);
                        } else {
                            return L.latLng(latitude, longitude);
                        }
                    },
                    pointToLayer: function(feature, latlng) {
                        return L.circleMarker(latlng, volcanoMarker);
                    },
                    onEachFeature: function(feature, layer) {
                        if (feature.properties && feature.properties.volcano_name) {
                            layer.bindPopup('<h4>' + feature.properties.volcano_name + '</h4>' +
                                '<p><b>Country</b>: ' + feature.properties.country + '<br>' +
                                '<b>Elevation</b>: ' + feature.properties.elevation_m + '<br>' +
                                '<b>Type</b>: ' + feature.properties.type + '<br>' +
                                '<b>Status</b>: ' + feature.properties.status + '</p>');
                        }
                    }
                });

                $("#volcanoToggle").on('click', function() {
                    if ($('#volcanoToggle').is(':checked')) {
                        geoLayer.addTo(myMap);
                    } else {
                        geoLayer.remove();
                    }
                });
            });
    }

});
