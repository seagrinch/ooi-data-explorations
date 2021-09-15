// Adapted from https://bl.ocks.org/mbostock/34f08d5e11952a80609169b7917d4172
// and http://bl.ocks.org/rajvansia/ce6903fad978d20773c41ee34bf6735c

var svg = d3.select("#chart").append("svg")
      .attr("width",800)
      .attr("height",500),
    margin1 = {top: 20, right: 410, bottom: 110, left: 40},
    margin2 = {top: 20, right: 20, bottom: 110, left: 430},
    margin3 = {top: 430, right: 20, bottom: 30, left: 40},
    width1 = +svg.attr("width") - margin1.left - margin1.right,
    width2 = +svg.attr("width") - margin2.left - margin2.right,
    width3 = +svg.attr("width") - margin3.left - margin3.right,
    height1 = +svg.attr("height") - margin1.top - margin1.bottom,
    height2 = +svg.attr("height") - margin2.top - margin2.bottom,
    height3 = +svg.attr("height") - margin3.top - margin3.bottom;

var parseDate = d3.utcParse("%Y-%m-%dT%H:%M:%SZ");

var x1 = d3.scaleLinear().range([0, width1]),
    x2 = d3.scaleLinear().range([0, width2]),
    x3 = d3.scaleUtc().range([0, width3]),
    y1 = d3.scaleLinear().range([0, height1]), //Flip y-axis
    y2 = d3.scaleLinear().range([0, height2]), //Flip y-axis
    y3 = d3.scaleLinear().range([height3, 0]), //Regular y-axis
    color = d3.scaleSequential(d3.interpolateRainbow); //Alternate: interpolateViridis

var xAxis1 = d3.axisBottom(x1),
    xAxis2 = d3.axisBottom(x2),
    xAxis3 = d3.axisBottom(x3),
    yAxis1 = d3.axisLeft(y1),
    yAxis2 = d3.axisLeft(y2),
    yAxis3 = d3.axisLeft(y3);

var brush = d3.brushX()
    .extent([[0, 0], [width3, height3]])
    .on("brush end", brushed);

svg.append("defs").append("clipPath")
    .attr("id", "clip")
  .append("rect")
    .attr("width", width1)
    .attr("height", height1);

svg.append("defs").append("clipPath3")
    .attr("id", "clip3")
  .append("rect")
    .attr("width", width3)
    .attr("height", height3);

var focus1 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin1.left + "," + margin1.top + ")");
var focus2 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin2.left + "," + margin2.top + ")");
var context = svg.append("g")
    .attr("class", "context")
    .attr("transform", "translate(" + margin3.left + "," + margin3.top + ")");

focus1.append("text")
    .attr("class", "label")
    .attr("dy", "2.5em")
    .attr("transform", "translate(" + (width1) + "," + (height1) + "), rotate(0)")
    .attr("text-anchor", "end")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("pH");
focus1.append("text")
    .attr("class", "label")
    .attr("dy", "-2.5em")
    .attr("transform", "translate(" + (0) + "," + (height1/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("Depth (m)")
focus1.append("text")
    .attr("class", "title")
    .attr("dy", "-.4em")
    .attr("transform", "translate(" + (0) + "," + (0) + "), rotate(0)")
    .attr("text-anchor", "start")
    .style("font-size", "14px")    
    .style("font-weight", "bold")
    .text("Oregon Offshore");
focus2.append("text")
    .attr("class", "label")
    .attr("dy", "2.5em")
    .attr("transform", "translate(" + (width1) + "," + (height1) + "), rotate(0)")
    .attr("text-anchor", "end")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("pH");
focus2.append("text")
    .attr("class", "label")
    .attr("dy", "-2.5em")
    .attr("transform", "translate(" + (0) + "," + (height1/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("Depth (m)")
focus2.append("text")
    .attr("class", "title")
    .attr("dy", "-.4em")
    .attr("transform", "translate(" + (0) + "," + (0) + "), rotate(0)")
    .attr("text-anchor", "start")
    .style("font-size", "14px")    
    .style("font-weight", "bold")
    .text("Oregon Slope Base");

d3.csv("data/chemistry3_2021.csv", type, function(error, data) {
  if (error) throw error;

  //x1.domain(d3.extent(data, function(d) { return d.ph; }));
  //y1.domain(d3.extent(data, function(d) { return d.depth; })).nice();
  x1.domain([7.5,8.5]);
  y1.domain([0,200]);
  //x2.domain(d3.extent(data, function(d) { return d.ph; }));
  //y2.domain(d3.extent(data, function(d) { return d.depth; })).nice();
  x2.domain([7.5,8.5]);
  y2.domain([0,200]);
  x3.domain(d3.extent(data, function(d) { return d.date; })).nice();
  y3.domain(d3.extent(data, function(d) { return d.ph; }));
  color.domain(d3.extent(data, function(d) {return d.date}));

  var dots1 = focus1.append("g");
  dots1.attr("clip-path", "url(#clip)")
  dots1.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .filter(function(d) { return d.site =='CE04OSPS' })
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x1(d.ph); })
        .attr("cy", function(d) { return y1(d.depth); })
        .style("fill", function(d) {return color(d.date)});

  var dots2 = focus2.append("g");
  dots2.attr("clip-path", "url(#clip)")
  dots2.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .filter(function(d) { return d.site =='RS01SBPS' })
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x1(d.ph); })
        .attr("cy", function(d) { return y1(d.depth); })
        .style("fill", function(d) {return color(d.date)});

  var dots3 = context.append("g");
  dots3.attr("clip-path", "url(#clip3)")
  dots3.selectAll(".dot2")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot2")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x3(d.date); })
        .attr("cy", function(d) { return y3(d.ph); })
        .style("fill", function(d) {return color(d.date)});

  focus1.append("g")
      .attr("id","xAxis1")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height1 + ")")
      .call(xAxis1)
  focus1.append("g")
      .attr("id","yAxis1")
      .attr("class", "axis axis--y")
      .call(yAxis1)
  focus2.append("g")
      .attr("id","xAxis2")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height2 + ")")
      .call(xAxis2)
  focus2.append("g")
      .attr("id","yAxis2")
      .attr("class", "axis axis--y")
      .call(yAxis2)
  context.append("g")
      .attr("id","xAxis3")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height3 + ")")
      .call(xAxis3)

  min_date = d3.min(data,function(d) {return d.date});
  context.append("g")
      .attr('id',"brush_box")
      .attr("class", "brush")
      .call(brush)
      //.call(brush.move, x.range());
      .call(brush.move,[x3(min_date),x3(d3.timeDay.offset(min_date,30))]) // Preselect first 30 days
      .selectAll("rect.selection")
        .style("stroke", "#999")
        .style("fill", "#157ab5")
});

function brushed() {
  if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
  var s = d3.event.selection || x3.range();
  svg.selectAll(".dot")
    .attr("display","none")
  svg.selectAll(".dot")
    .filter(function(d) {
        return (d.date > x3.invert(s[0]) && d.date < x3.invert(s[1]))
      })
    .attr("display","inline")
}

function type(d) {
  d.date = parseDate(d.time);
  d.depth = +d.depth;
  d.ph = +d.ph_seawater;
  d.site = d.site;
  return d;
}

function graph_zoom(days) {
  var brush_box = d3.select("#brush_box");
  var extent = d3.brushSelection(brush_box.node()) || x3.range();
  var min_date = x3.invert(extent[0]);
  var max_date = d3.timeHour.offset(min_date,days*24);
  brush_box.call(brush.move,[x3(min_date),x3(max_date)]);  
}
