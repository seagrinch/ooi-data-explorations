/*
This code was adapted from the following references
http://bl.ocks.org/tnightingale/4718717
https://bost.ocks.org/mike/leaflet/
http://bl.ocks.org/sumbera/10463358
https://bl.ocks.org/rgdonohue/51c43bb749689e696b8a

Todo:
 - Add default selection
 - Fix timeseries labels
 - Add circle size legend
 - Add plate boundaries
 - Add date range label
 - Add tooltips
 - Add scale bar
 - Add North Arrow?
 - Color by depth? (add legend) - Implemented coloring 6/2, legend still needed
 - Fix hiding during zoom
 - Try using Canvas to improve rendering
*/

(function () {
  var container = L.DomUtil.get('map');
  var zoomlevel = (container.dataset.zoom) ? container.dataset.zoom : 5;
  var mapcenter = (container.dataset.center) ? JSON.parse(container.dataset.center) : [44, -128];  
  var selected_days =  (container.dataset.days) ? container.dataset.days : 30;

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
  
  var svg = d3.select(myMap.getPanes().overlayPane).append("svg").style('overflow','visible');
  var layer = svg.append("g").attr("class", "leaflet-zoom-hide");

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

    var extent = d3.extent(geoData.features, function (d) { return d.properties.depth; });
    var color = d3.scaleSequential(d3.interpolateRainbow) //interpolateInferno
    color.domain(extent);
			
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
        .style("fill-opacity", 0.6)
        //.style('stroke', function (d) { return color(d.properties.depth) })
        .style('stroke','grey')
        .style('stroke-width', 1)
        .style('fill', function (d) { return color(d.properties.depth) });
    }
    
    myMap.on("zoom", reset);
    reset();

    var chart = timeseries_chart()
      .x(get_time).xLabel("Earthquake origin time")
      .y(get_magnitude).yLabel("Magnitude")
      .days(selected_days);
  
      d3.select("#map2").datum(data).call(chart);

  });

  function get_time(d) {
    return d3.isoParse(d.time);
  }

  function get_magnitude(d) {
    return +d.mag;
  }
  
  function get_radius(d) {
    var mag = d.mag+1; //Add 1 so 0 values shows up
    return mag * mag;
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
        color = d3.scaleSequential(d3.interpolateRainbow), //interpolateInferno
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
            .attr("class", "label")
            .attr("x", width)
            .attr("y", 30)
            .style("text-anchor", "end")
            .text(x_label);
  
        y_axis.append("text")
            .attr("class", "label")
            .attr("transform", "rotate(-90)")
            .attr("y", -40)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text(y_label);

        series.append("clipPath")
            .attr("id", "clip")
            .append("rect")
            .attr("width", width - 1)
            .attr("height", height - .25)
            .attr("transform", "translate(1,0)");
  
        x.domain(d3.extent(d, get_x)); //.nice();
        x_axis.call(d3.axisBottom(x));

        y.domain(d3.extent(d, get_y)).nice();
        y_axis.call(d3.axisLeft(y).ticks(5));
        
        color.domain(d3.extent(d, function (d) { return d.depth; }));

        series.append("g").attr("class", "timeseries")
            .attr("clip-path", "url(#clip)")
            .selectAll("circle")
            .data(d).enter()
            .append("circle")
            //.style("stroke", "rgb(129, 15, 124)") //color[color.length - 2]
            .style("stroke","gray")
            .style("stroke-width", 0.5)
            //.style("fill", "rgb(77, 0, 75)") //color[color.length - 1]
            .style('fill', function (d) { return color(d.depth) })
            //.attr("opacity", .4)
            .attr("r", 3)
            .attr("transform", function (d) {
                return "translate(" + x(get_x(d)) + "," + y(get_y(d)) + ")";
            });

        series.append("g")
                .attr("class", "brush")
                .call(brush)
                .selectAll("rect")
                .attr("height", height)
                .style("stroke-width", 1)
                //.style("stroke", "red") //color[color.length - 1]
                //.style("fill", "green") //color[2]
                .attr("opacity", 0.4);

        min_date = d3.min(d,function(d) {return d.date});
        console.log(min_date,x(min_date));
        d3.select(".brush")
            //.call(brush.move, x.range());
            .call(brush.move,[x(min_date),x(d3.timeHour.offset(min_date,days*24))]);

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

}());
