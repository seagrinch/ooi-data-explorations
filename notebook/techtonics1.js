/* 
  Techtonics and Plate Movement - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
  
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
*/

var mainscript = (function () {
  var container = L.DomUtil.get('map');
  var zoomlevel = (container.dataset.zoom) ? container.dataset.zoom : 5;
  var mapcenter = (container.dataset.center) ? JSON.parse(container.dataset.center) : [44, -128]; 
  var selected_days =  (container.dataset.days) ? container.dataset.days : 30;

  // Basemap
  var myMap = L.map(container).setView(mapcenter, zoomlevel);
  var baseMap = L.tileLayer.wms('https://maps.oceanobservatories.org/mapserv?map=/public/mgg/web/gmrt.marine-geo.org/htdocs/services/map/wms_merc.map&', {
    // maxZoom: 12,
    // minZoom: 2.6,
    attribution: 'Global Multi-Resolution Topography (GMRT), Version 3.2',
    layers: 'topo',
    format: 'image/png',
    transparent: true,
    // bounceAtZoomLimits: true,
    // crs: L.CRS.EPSG4326,
    crs: L.CRS.EPSG3857
  }).addTo(myMap);
  
  // Overlay Minimap
  var osm2 = new L.tileLayer.wms('https://maps.oceanobservatories.org/mapserv?map=/public/mgg/web/gmrt.marine-geo.org/htdocs/services/map/wms_merc.map&', {
    maxZoom: 13,
    minZoom: 0,
    attribution: 'Global Multi-Resolution Topography (GMRT), Version 3.2',
    layers: 'topo',
    format: 'image/png',
    transparent: true,
    // bounceAtZoomLimits: true,
    // crs: L.CRS.EPSG4326,
    crs: L.CRS.EPSG3857
  });
  var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true, zoomLevelOffset: -3}).addTo(myMap);

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

  // Dataset boundary
  var data_bounds = (function(dataset) {  
    switch(dataset) {
      case 'data/usgs_gordo.csv':
        return [[40.188, -127.423], [43.3113, -124.5978333]]; // Gordo
      case 'data/usgs_blanco.csv':
        return [[41.7515, -131.1226], [45.2948333, -125.7963333]]; // Blanco
      default:
        return [[40.0563333, -131.1226], [48.5676667, -124.6731667]]; // Full dataset
    }
  })(container.dataset.source);

  var data_rect = L.rectangle(data_bounds, {
    color: 'grey', 
    weight: 2,
    fill: false
  }).addTo(myMap);
  
  // Container for earthquake locations
  var svg = d3.select(myMap.getPanes().overlayPane).append("svg").style('overflow','visible');
  var layer = svg.append("g").attr("class", "leaflet-zoom-hide");
  
  // Hide map dots by default
  svg.attr("visibility", "hidden");

  d3.csv(container.dataset.source, type, function(error, data) {
  //d3.json("data/us-states.json", function(error, geoData) {
    if (error) throw error;
    
    function reformat(array) {
      var data = [];
      array.map(function (d, i) {
        data.push({
          id: i,
          type: "Feature",
          geometry: {
            coordinates: [+d.longitude, +d.latitude],
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

    function projectPoint(x, y) {
      var point = myMap.latLngToLayerPoint(new L.LatLng(y, x));
      this.stream.point(point.x, point.y);
    }
    
    var transform = d3.geoTransform({point: projectPoint});
    var path = d3.geoPath().projection(transform);

    //var extent = d3.extent(geoData.features, function (d) { return d.properties.depth; });
    var color = d3.scaleSequential(d3.interpolateRdYlBu)
    color.domain([0,50]);
			
    var features = layer.selectAll("path")
        .data(geoData.features)
      .enter().append("path")
        .attr("class","circle selected");

    // Reposition the SVG to cover the features.
    function reset() {

      var bounds = path.bounds(geoData),
          topLeft = bounds[0],
          bottomRight = bounds[1];

      svg.attr("width", bottomRight[0] - topLeft[0])
        .attr("height", bottomRight[1] - topLeft[1])
        .style("left", topLeft[0] + "px")
        .style("top", topLeft[1] + "px");
  
      layer.attr("transform", "translate(" + -topLeft[0] + "," + -topLeft[1] + ")");

      //  path.pointRadius(13)
      var mscale = Math.sqrt(Math.pow(bottomRight[0] - topLeft[0], 2) + Math.pow(bottomRight[1] - topLeft[1], 2)) / 350/6;
      path.pointRadius(function(d) {return get_radius(d.properties) * Math.pow(mscale,1/2)});
      
      features.attr("d", path)
        .style('fill', function (d) { return color(d.properties.depth) })
        .style("fill-opacity", 0.6)
        //.style('stroke', function (d) { return color(d.properties.depth) })
        .style('stroke','grey')
        .style('stroke-width', 1);
    }
    
    myMap.on("zoom", reset);
    reset();

    var chart = timeseries_chart()
      .x(get_time).xLabel("Earthquake origin time")
      .y(get_magnitude).yLabel("Earthquake Magnitude")
      .days(selected_days);
      
    this.chart = chart; // Make this global
  
    d3.select("#map2").datum(data).call(chart);
  
  });

  function get_time(d) {
    return d3.isoParse(d.time);
  }

  function get_magnitude(d) {
    return +d.mag;
  }
  
  function get_radius(d) {
    return d.mag * d.mag;
  }

/*
  function circle_style(circles) {
    if (!(extent && scale)) {
      extent = d3.extent(circles.data(), function (d) { return d.depth; });
      scale = d3.scaleSequential(d3.interpolateRainbow).domain(extent);
    }
    circles.attr('opacity', 0.4)
        .attr('stroke', "red") //scheme[classes - 1]
        .attr('stroke-width', 1)
        .attr('fill', function (d) {
            return "green"; //scheme[(scale(d.properties.depth) * 10).toFixed()];
        });

    circles.on('click', function (d, i) {
        L.DomEvent.stopPropagation(d3.event);

        var t = '<h3><%- id %></h3>' +
                '<ul>' +
                '<li>Magnitude: <%- mag %></li>' +
                '<li>Depth: <%- depth %>km</li>' +
                '</ul>';

        var data = {
                id: d.id,
                mag: d.properties.magnitude,
                depth: d.properties.depth
            };

        L.popup()
            .setLatLng([d.geometry.coordinates[1], d.geometry.coordinates[0]])
            .setContent(_.template(t, data))
            .openOn(map);

    });
  }  
*/

  function timeseries_chart() {
    var margin = { top: 5, right: 20, bottom: 40, left: 45 },
        width = 720 - margin.left - margin.right,
        height = 100;

    var x = d3.scaleUtc(),
        y = d3.scaleLinear(),
        color = d3.scaleSequential(d3.interpolateRdYlBu),
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
        
        //color.domain(d3.extent(d, function (d) { return d.depth; }));
        color.domain([0,50]);
        
        series.append("g").attr("class", "timeseries")
            .attr("clip-path", "url(#clip)")
            .selectAll("circle")
            .data(d).enter()
            .append("circle")
            .style("stroke","gray")
            .style("stroke-width", 0.5)
            //.style("stroke-opacity",.3)
            .style('fill', function (d) { return color(d.depth) })
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
        var time = get_time(d.properties);
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

  //var parseDate = d3.utcParse("%Y-%m-%dT%H:%M:%SZ");

  function type(d) {
    d.date = d3.isoParse(d.time);
    d.latitude = +d.latitude;
    d.longitude = +d.longitude;
    d.depth = +d.depth;
    d.mag = +d.mag;
    return d;
  }

  graph_zoom = function(days) {
    var brush_box = d3.select("#brush_box");
    var x = chart.xx();
    var brush = chart.brush();
    var extent = d3.brushSelection(brush_box.node()) || x.range();
    var min_date = x.invert(extent[0]);
    var max_date = d3.timeHour.offset(min_date,days*24);
    brush_box.call(brush.move,[x(min_date),x(max_date)]);  
  }
  
  return {
    toggle_dots: function(el) {
      if (el.checked) {
        console.log('checked')
        svg.attr("visibility", "visible");
      } else {
        console.log('unchecked')
        svg.attr("visibility", "hidden");
      }
    }
  }
    
}());
