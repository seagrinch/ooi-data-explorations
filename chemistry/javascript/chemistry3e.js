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
    x2 = d3.scaleTime().range([0, width]),
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
    .text("pH");

focus.append("text")
    .attr("class", "label")
    .attr("dy", "-2.4em")
    .attr("transform", "translate(" + (0) + "," + (height/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("Pressure (dbar)")

d3.csv("data/chemistry3_CE04OSPS.csv", type, function(error, data) {
  if (error) throw error;

  x.domain(d3.extent(data, function(d) { return d.ph; }));
  y.domain(d3.extent(data, function(d) { return d.pressure; }));
  x2.domain(d3.extent(data, function(d) { return d.date; }));
  y2.domain(d3.extent(data, function(d) { return d.ph; }));
  color.domain(d3.extent(data, function(d) {return d.date}));

  var dots = focus.append("g");
  dots.attr("clip-path", "url(#clip)")
  dots.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x(d.ph); })
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
        .attr("cy", function(d) { return y2(d.ph); })
        .style("fill", function(d) {return color(d.date)});

  context.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height2 + ")")
      .call(xAxis2);

  context.append("g")
      .attr("class", "brush")
      .call(brush)
      .call(brush.move, x.range());

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
  d.ph = +d.pH;
  d.index = +d.index;
  return d;
}