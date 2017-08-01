// Adapted from https://bl.ocks.org/mbostock/34f08d5e11952a80609169b7917d4172
// and http://bl.ocks.org/rajvansia/ce6903fad978d20773c41ee34bf6735c

var svg = d3.select("#chart").append("svg")
      .attr("width",800)
      .attr("height",400),
    margin1 = {top: 20, right: 410, bottom: 30, left: 40},
    margin2 = {top: 20, right: 20, bottom: 225, left: 430},
    margin3 = {top: 215, right: 20, bottom: 30, left: 430},
    width1 = +svg.attr("width") - margin1.left - margin1.right,
    width2 = +svg.attr("width") - margin2.left - margin2.right,
    width3 = +svg.attr("width") - margin3.left - margin3.right,
    height1 = +svg.attr("height") - margin1.top - margin1.bottom,
    height2 = +svg.attr("height") - margin2.top - margin2.bottom,
    height3 = +svg.attr("height") - margin3.top - margin3.bottom;

var parseDate = d3.utcParse("%Y-%m-%d %H:%M:%S");

var x1 = d3.scaleLinear().range([0, width1]),
    x2 = d3.scaleUtc().range([0, width2]),
    x3 = d3.scaleUtc().range([0, width3]),
    y1 = d3.scaleLinear().range([height1, 0]), //Regular y-axis
    y2 = d3.scaleLinear().range([height2, 0]),
    y3 = d3.scaleLinear().range([height3, 0]),
    color = d3.scaleSequential(d3.interpolateRainbow); //Alternate: interpolateViridis

var xAxis1 = d3.axisBottom(x1),
    xAxis2 = d3.axisBottom(x2).tickFormat(d3.timeFormat("%b")),
    xAxis3 = d3.axisBottom(x3).tickFormat(d3.timeFormat("%b")),
    yAxis1 = d3.axisLeft(y1),
    yAxis2 = d3.axisLeft(y2),
    yAxis3 = d3.axisLeft(y3);

var brush2 = d3.brushX()
    .extent([[0, 0], [width2, height2]])
    .on("brush end", brushed2);

var brush3 = d3.brushX()
    .extent([[0, 0], [width3, height3]])
    .on("brush end", brushed3);

/*
svg.append("defs").append("clipPath")
    .attr("id", "clip")
  .append("rect")
    .attr("width", width)
    .attr("height", height);
*/

var graph1 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin1.left + "," + margin1.top + ")");
var graph2 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin2.left + "," + margin2.top + ")");
var graph3 = svg.append("g")
    .attr("class", "context")
    .attr("transform", "translate(" + margin3.left + "," + margin3.top + ")");

graph1.append("text")
    .attr("class", "label")
    .attr("dy", "2.3em")
    .attr("transform", "translate(" + (width1) + "," + (height1) + "), rotate(0)")
    .attr("text-anchor", "end")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("pH");
graph1.append("text")
    .attr("class", "label")
    .attr("dy", "-2.5em")
    .attr("transform", "translate(" + (0) + "," + (height1/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("pCO2")
graph2.append("text")
    .attr("class", "label")
    .attr("dy", "-2.5em")
    .attr("transform", "translate(" + (0) + "," + (height2/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("pH");
graph3.append("text")
    .attr("class", "label")
    .attr("dy", "-2.5em")
    .attr("transform", "translate(" + (0) + "," + (height3/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("pCO2");


d3.csv("data/chemistry4_CE02SHSM.csv", type, function(error, data) {
  if (error) throw error;

  x1.domain(d3.extent(data, function(d) { return d.ph; }));
  y1.domain(d3.extent(data, function(d) { return d.pco2; }));
  x2.domain(d3.extent(data, function(d) { return d.date; }));
  y2.domain(d3.extent(data, function(d) { return d.ph; }));
  x3.domain(d3.extent(data, function(d) { return d.date; }));
  y3.domain(d3.extent(data, function(d) { return d.pco2; }));
  color.domain(d3.extent(data, function(d) {return d.date}));

  var dots1 = graph1.append("g");
  //dots1.attr("clip-path", "url(#clip)")
  dots1.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x1(d.ph); })
        .attr("cy", function(d) { return y1(d.pco2); })
        .style("fill", function(d) {return color(d.date)});
  graph1.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height1 + ")")
      .call(xAxis1);
  graph1.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis1);

  var dots2 = graph2.append("g");
  //dots2.attr("clip-path", "url(#clip)")
  dots2.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x2(d.date); })
        .attr("cy", function(d) { return y2(d.ph); })
        .style("fill", function(d) {return color(d.date)});
  graph2.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height2 + ")")
      .call(xAxis2);
  graph2.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis2);

  var dots3 = graph3.append("g");
  //dots3.attr("clip-path", "url(#clip)")
  dots3.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x3(d.date); })
        .attr("cy", function(d) { return y3(d.pco2); })
        .style("fill", function(d) {return color(d.date)});
  graph3.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height3 + ")")
      .call(xAxis3);
  graph3.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis3);

  graph2.append("g")
      .attr("class", "brush2")
      .call(brush2)
      //.call(brush2.move, x2.range()); //Default to all time
      .selectAll("rect.selection")
        .style("stroke", "#999")
        .style("fill", "#157ab5")
/*
  graph3.append("g")
      .attr("class", "brush3")
      .call(brush3)
      //.call(brush3.move, x3.range()); //Default to all time
*/
});

function brushed2() {
  if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
  var s = d3.event.selection || x2.range();
  graph1.selectAll(".dot")
    .attr("display","none")
  graph1.selectAll(".dot")
    .filter(function(d) {
        return (d.date > x3.invert(s[0]) && d.date < x3.invert(s[1]))
      })
    .attr("display","inline");
  //d3.select(".brush3").call(brush3.move,s);
}

function brushed3() {
  if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
  var s = d3.event.selection || x3.range();
  graph1.selectAll(".dot")
    .attr("display","none")
  graph1.selectAll(".dot")
    .filter(function(d) {
        return (d.date > x3.invert(s[0]) && d.date < x3.invert(s[1]))
      })
    .attr("display","inline");
  //d3.select(".brush2").call(brush2.move,s);
}

function type(d) {
  d.date = parseDate(d.date);
  d.pco2 = +d['pCO2'];
  d.ph = +d['pH'];
  return d;
}
