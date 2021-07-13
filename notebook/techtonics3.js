/* 
  OOI Data Labs Notebook - Techtonics #3 - Toggle Eq by Depth and Volcanoes
  Written by Sage Lichtenwalner, 8/14/2020, Major rewrite 7/9-12/2021
  
  Originally adapted from the Techtonics and Plate Movement - Exploration Widget
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
  var myMap, myChart;
  var container = L.DomUtil.get('map');
  var zoomlevel = (container.dataset.zoom) ? container.dataset.zoom : 5;
  var mapcenter = (container.dataset.center) ? JSON.parse(container.dataset.center) : [44, -128+360]; //Wrap points around Dateline
  var selected_days =  (container.dataset.days) ? container.dataset.days : 30;
    
  d3.csv(container.dataset.source, formatData, function(error, data) {
    if (error) throw error;

    function reformat(array) {
      var data = [];
      array.map(function (d, i) {
        data.push({
          id: i,
          type: "Feature",
          geometry: {
            coordinates: [+d.longitude+360, +d.latitude], //Wrap points around Dateline
            type: "Point"
          },
          properties: {
            time: d.time,
            depth: d.depth,
            mag: d.mag,
          }
        });
      });
      return data;
    }
    var geoData = { type: "FeatureCollection", features: reformat(data) };

    addMaps()
    
    drawFeatures(geoData)

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
      maxBounds: [[-80, 0], [85, 360]], //Center around Dateline
      minZoom: 1,
      maxZoom: 8,
      //preferCanvas: true,   
      //worldCopyJump: true, 
    }).setView(mapcenter, zoomlevel);
  
    // Basemap
    var baseMap = L.tileLayer.wms('https://www.gmrt.org/services/mapserver/wms_merc?', {
      // maxZoom: 12,
      // minZoom: 2.6,
      attribution: 'Global Multi-Resolution Topography (GMRT), Version 3.9',
      layers: 'topo',
      format: 'image/png',
      transparent: true,
      crs: L.CRS.EPSG3857
    }).addTo(myMap);
  
    // Dataset boundary
    var data_bounds = [[40.0563333, -131.1226+360], [48.5676667, -124.6731667+360]];
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
    myMap.on('draw:created', function (e) {
      var type = e.layerType,
        layer = e.layer;
        drawnItems.addLayer(layer);
    });
    
/*
    // Overlay Minimap
    var osm2 = new L.tileLayer.wms('https://www.gmrt.org/services/mapserver/wms_merc?', {
      maxZoom: 13,
      minZoom: 0,
      attribution: 'Global Multi-Resolution Topography (GMRT), Version 3.2',
      layers: 'topo',
      format: 'image/png',
      transparent: true,
      crs: L.CRS.EPSG3857
    });
    var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true, zoomLevelOffset: -3}).addTo(myMap);
*/

    // Add SVG Layer for Earthquakes
    //L.svg({clickable:true}).addTo(myMap);

  }

  function drawFeatures(geoData) {
    var svg = d3.select('#map').select('svg')
      .attr("pointer-events", "auto")
      //.attr('class','leaflet-zoom-hide')
      
    var g = svg.select("g")

    var transform = d3.geoTransform({point: projectPoint});
    var path = d3.geoPath().projection(transform)

    var radius = d3.scaleLinear().domain([0,9]).range([0,15]); 

    var featureElement = g.selectAll("path")
        .data(geoData.features)
      .enter().append("path")
        //.attr("class", "circle selected, mapDots")
        .attr("class", function (d) { return "circle selected, " + eqClass(d.properties.depth) })
        .style('stroke','grey')
        .style('stroke-width', 1)
        //.attr("stroke-opacity", 0.3)
        .style('fill', function (d) { return getColor(d.properties.depth) })
        .style("fill-opacity", 0.6)
        .attr("visibility", "hidden") // Hide map dots by default
        .attr("opacity", 0) // Hide map dots by default

    path.pointRadius(function(d) {return radius(d.properties.mag)});

    // Add Depth Legend
    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
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
    var legendsvg = d3.select("#radius").append("svg").attr('width','120px').attr('height','40px');
    var valuesToShow = [1, 3, 5, 7];
    legendsvg.selectAll("legend")
        .data(valuesToShow)
      .enter().append("circle")
        .attr("cx", function (d,i) { return i*25 + 10})
        .attr("cy", 15 )
        .attr("r", function(d){ return radius(d) })
        .style("fill", "none")
        .attr("stroke", "black")
    legendsvg.selectAll("legend")
        .data(valuesToShow)
      .enter().append("text")
        .attr('x', function (d,i) { return i*25 + 10 })
        .attr('y', 40 )
        .text( function(d){ return d } )
        .style("font-size", 10)
        .attr('alignment-baseline', 'bottom')
        .attr('text-anchor','middle')
        
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

  //var getColor = d3.scaleSequential(d3.interpolateRdYlBu).domain([0,50]);
  function getColor(d) {
    return d > 30  ? '#00008B' : /* DarkBlue (web colors) */
           d > 20   ? '#2E8B57' : /* SeaGreen (web colors) */
           d > 10   ? '#FFA500' : /* Orange (web colors) */
                      '#DC143C';  /* Crimson (web colors) */
  }

  function eqClass(d) {
    return d > 20   ? 'eqDeep' : 
           d > 10   ? 'eqMid' : 
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
        brush = d3.brushX().extent([[0, 0], [width, height]]).on("brush end", _brushend)
        get_x = no_op,
        get_y = no_op;

    function timeseries(selection) {
      selection.each(function (d) {
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
            .style("fill","black")
            .text(x_label);
  
        y_axis.append("text")
            .attr("class", "glabel")
            .attr("transform", "rotate(-90)")
            .attr("y", -40)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .style("fill","black")
            .text(y_label);

        series.append("clipPath")
            .attr("id", "clip")
            .append("rect")
            .attr("width", width - 1)
            .attr("height", height - .25)
            .attr("transform", "translate(1,0)");
  
        x.domain(d3.extent(d, get_x)); //.nice();
        x_axis.call(d3.axisBottom(x));

        //y.domain(d3.extent(d, get_y)).nice();
        y.domain([2.5,7]);
        y_axis.call(d3.axisLeft(y).ticks(5));
                
        series.append("g").attr("class", "timeseries")
            .attr("clip-path", "url(#clip)")
            .selectAll("circle")
            .data(d).enter()
            .append("circle")
            .style("stroke","gray")
            .style("stroke-width", 0.5)
            //.style("stroke-opacity",.3)
            .style('fill', function (d) { return getColor(d.depth) })
            //.attr("opacity", .4)
            .attr("r", 3)
            .attr("transform", function (d) {
                return "translate(" + x(get_x(d)) + "," + y(get_y(d)) + ")";
            });

        min_date = d3.min(d,function(d) {return d.date});
        series.append("g")
          .attr('id',"brush_box")
          .attr("class", "brush")
          .call(brush)
          .call(brush.move,[x(min_date),x(d3.timeDay.offset(min_date,days))]) //Preselect specified days
          .selectAll("rect.selection")
            .style("stroke", "#999")
            .style("fill", "#157ab5");

      });
    }
  
    timeseries.x = function (accessor) {
      if (!arguments.length) return get_x;
      get_x = accessor;
      return timeseries;
    };

    timeseries.y = function (accessor) {
      if (!arguments.length) return get_y;
      get_y = accessor;
      return timeseries;
    };

    timeseries.xLabel = function (label) {
      if (!arguments.length) return x_label;
      x_label = label;
      return timeseries;
    }

    timeseries.yLabel = function (label) {
      if (!arguments.length) return y_label;
      y_label = label;
      return timeseries;
    }

    timeseries.days = function (n) {
      if (!arguments.length) return days;
      days = n;
      return timeseries;
    }

    var brushed = function(brush) {
      var s = d3.event.selection || x.range();
      d3.selectAll(".circle").classed("selected", function (d) {
        var time = get_x(d.properties);
        return x.invert(s[0]) <= time && time <= x.invert(s[1]);
      });
    }

    function _brushend() {
      brushed.call(null, brush);
    }

    function no_op() {}

    timeseries.xx = function () {
      return x;
    };
    
    timeseries.brush = function () {
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
    var max_date = d3.timeHour.offset(min_date,days*24);
    brush_box.call(brush.move,[x(min_date),x(max_date)]);  
  }
  
  toggle_dots = function(depth) {
    var showEarthquakes = d3.select('#'+depth).property('checked')
    //console.log(depth,showEarthquakes)
    var dots = d3.selectAll('.'+depth)
    if (showEarthquakes) {
      dots.attr("visibility", "visible");
      dots.attr("opacity", 1);
    } else {
      dots.attr("visibility", "hidden");
      dots.attr("opacity", 0);
    }
  }

  function addVolcanoes() {
    // Volcanoes
    var volcanoMarker = {
        radius: 4,
        fillColor: "#F5F5F5", /* WhiteSmoke (web colors) */
        color: "#888",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
    };
    fetch('data/volcanoes.csv')
      .then(res => res.text())
      .then(data => {
        var geoLayer = L.geoCsv(data, {
          firstLineTitles: true, 
          fieldSeparator: ',', 
          latitudeTitle:'Latitude', 
          longitudeTitle:'Longitude',
          coordsToLatLng: function (coords) {
            longitude = coords[0];
            latitude = coords[1];
            if (longitude < 0) {
              var latlng = L.latLng(latitude, longitude+360);
            } else {
              var latlng = L.latLng(latitude, longitude);
            }
              return latlng;
          },
          pointToLayer: function (feature, latlng) {
            return L.circleMarker(latlng, volcanoMarker);
          },
          onEachFeature: function (feature, layer) {
            if (feature.properties && feature.properties.volcano_name) {
              layer.bindPopup('<h4>'+feature.properties.volcano_name+'</h4>'+
              '<p><b>Country</b>: '+feature.properties.country+'<br>'+
              '<b>Elevation</b>: '+feature.properties.elevation_m+'<br>'+
              '<b>Type</b>: '+feature.properties.type+'<br>'+
              '<b>Status</b>: '+feature.properties.status+'</p>');
            }
          }
        })
        //myMapControl.addOverlay(geoLayer,'Volcanoes');
        
        $("#volcanoToggle").on('click', function(){
          if ($('#volcanoToggle').is(':checked')) {
            geoLayer.addTo(myMap)
          } else {
            geoLayer.remove()
          }
        });
        
        
      })
  }

});
