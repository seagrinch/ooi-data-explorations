// Adapted from https://bl.ocks.org/mbostock/34f08d5e11952a80609169b7917d4172
// and http://bl.ocks.org/rajvansia/ce6903fad978d20773c41ee34bf6735c

var svg = d3.select("#chart").append("svg")
      .attr("width",800)
      .attr("height",500),
    margin = {top: 20, right: 20, bottom: 110, left: 40},
    margin2 = {top: 430, right: 20, bottom: 30, left: 40},
    width = +svg.attr("width") - margin.left - margin.right,
    height = +svg.attr("height") - margin.top - margin.bottom,
    height2 = +svg.attr("height") - margin2.top - margin2.bottom;

var parseDate = d3.utcParse("%Y-%m-%d %H:%M:%S");

var x = d3.scaleLinear().range([0, width]),
    x2 = d3.scaleUtc().range([0, width]),
    y = d3.scaleLinear().range([0, height]), //Flip y-axis
    y2 = d3.scaleLinear().range([height2, 0]),
    color = d3.scaleSequential(d3.interpolateRainbow); //interpolateViridis

var xAxis = d3.axisBottom(x),
    xAxis2 = d3.axisBottom(x2),
    yAxis = d3.axisLeft(y);

var brush = d3.brushX()
    .extent([[0, 0], [width, height2]])
    .on("brush end", brushed);

svg.append("defs").append("clipPath")
    .attr("id", "clip")
  .append("rect")
    .attr("width", width)
    .attr("height", height);

var focus = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var context = svg.append("g")
    .attr("class", "context")
    .attr("transform", "translate(" + margin2.left + "," + margin2.top + ")");

focus.append("text")
    .attr("class", "label")
    .attr("dy", "2.6em")
    .attr("transform", "translate(" + (width) + "," + (height) + "), rotate(0)")
    .attr("text-anchor", "end")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("Salinity");

focus.append("text")
    .attr("class", "label")
    .attr("dy", "-2em")
    .attr("transform", "translate(" + (0) + "," + (height/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("Depth (m)")

d3.csv("data/chemistry5_CP02PMUI.csv", type, function(error, data) {
  if (error) throw error;

  x.domain(d3.extent(data, function(d) { return d.salinity; }));
  //y.domain(d3.extent(data, function(d) { return d.pressure; }));
  y.domain([0,75]);
  x2.domain(d3.extent(data, function(d) { return d.date; }));
  y2.domain(d3.extent(data, function(d) { return d.salinity; }));
  color.domain(d3.extent(data, function(d) {return d.date}));

  var dots = focus.append("g");
  dots.attr("clip-path", "url(#clip)")
  dots.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x(d.salinity); })
        .attr("cy", function(d) { return y(d.pressure); })
        .style("fill", function(d) {return color(d.date)});
        
  focus.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  focus.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis);

  var dots2 = context.append("g");
  dots2.attr("clip-path", "url(#clip)")
  dots2.selectAll(".dot2")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot2")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x2(d.date); })
        .attr("cy", function(d) { return y2(d.salinity); })
        .style("fill", function(d) {return color(d.date)});

  context.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height2 + ")")
      .call(xAxis2);

  min_date = d3.min(data,function(d) {return d.date});
  
  context.append("g")
      .attr('id','brush_box')
      .attr("class", "brush")
      .call(brush)
      //.call(brush.move, x.range());
      .call(brush.move,[x2(min_date),x2(d3.timeDay.offset(min_date,30))]) // Preselect first 30 days
      .selectAll("rect.selection")
        .style("stroke", "#999")
        .style("fill", "#157ab5")

});

function brushed() {
  if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
  var s = d3.event.selection || x2.range();
  focus.selectAll(".dot")
    .attr("display","none")
  focus.selectAll(".dot")
    .filter(function(d) {
        return (d.date > x2.invert(s[0]) && d.date < x2.invert(s[1]))
      })
    .attr("display","inline")
}

function type(d) {
  d.date = parseDate(d.date);
  d.pressure = +d.pressure;
  d.temperature = +d.temperature;
  d.salinity = +d.salinity;
  d.index = +d.index;
  return d;
}

function graph_zoom(days) {
  var brush_box = d3.select("#brush_box");
  var extent = d3.brushSelection(brush_box.node()) || x2.range();
  var min_date = x2.invert(extent[0]);
  var max_date = d3.timeHour.offset(min_date,days*24);
  brush_box.call(brush.move,[x2(min_date),x2(max_date)]);  
}
