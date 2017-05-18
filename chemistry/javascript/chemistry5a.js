// Adapted from https://bl.ocks.org/mbostock/34f08d5e11952a80609169b7917d4172
// and http://bl.ocks.org/rajvansia/ce6903fad978d20773c41ee34bf6735c

var svg = d3.select("#chart").append("svg")
      .attr("width",800)
      .attr("height",500),
    margin1 = {top: 20, right: 390, bottom: 110, left: 40},
    margin2 = {top: 20, right: 20, bottom: 110, left: 470},
    margin3 = {top: 430, right: 20, bottom: 30, left: 40},
    width1 = +svg.attr("width") - margin1.left - margin1.right,
    width2 = +svg.attr("width") - margin2.left - margin2.right,
    width3 = +svg.attr("width") - margin3.left - margin3.right,
    height1 = +svg.attr("height") - margin1.top - margin1.bottom,
    height2 = +svg.attr("height") - margin2.top - margin2.bottom,
    height3 = +svg.attr("height") - margin3.top - margin3.bottom;

var parseDate = d3.utcParse("%Y-%m-%d %H:%M:%S");

var x1 = d3.scaleLinear().range([0, width1]),
    x2 = d3.scaleLinear().range([0, width2]),
    x3 = d3.scaleTime().range([0, width3]),
    y1 = d3.scaleLinear().range([0, height1]), //Flip y-axis
    y2 = d3.scaleLinear().range([0, height2]), //Flip y-axis
    y3 = d3.scaleLinear().range([height3, 0]),
    color = d3.scaleSequential(d3.interpolateRainbow); //Alternate: interpolateViridis

var xAxis1 = d3.axisBottom(x1),
    xAxis2 = d3.axisBottom(x2),
    xAxis3 = d3.axisBottom(x3),
    yAxis1 = d3.axisLeft(y1),
    yAxis2 = d3.axisLeft(y2);

var brush = d3.brushX()
    .extent([[0, 0], [width3, height3]])
    .on("brush end", brushed);

/*
svg.append("defs").append("clipPath")
    .attr("id", "clip")
  .append("rect")
    .attr("width", width)
    .attr("height", height);
*/

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
    .attr("dy", "2.6em")
    .attr("transform", "translate(" + (width1) + "," + (height1) + "), rotate(0)")
    .attr("text-anchor", "end")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("Salinity");
focus1.append("text")
    .attr("class", "label")
    .attr("dy", "-2em")
    .attr("transform", "translate(" + (0) + "," + (height1/2) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("Pressure (dbar)")
focus2.append("text")
    .attr("class", "label")
    .attr("dy", "2.6em")
    .attr("transform", "translate(" + (width2) + "," + (height2) + "), rotate(0)")
    .attr("text-anchor", "end")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("Salinity");
focus1.append("text")
    .attr("class", "title")
    .attr("dy", "-.4em")
    .attr("transform", "translate(" + (0) + "," + (0) + "), rotate(0)")
    .attr("text-anchor", "start")
    .style("font-size", "14px")    
    .style("font-weight", "bold")
    .text("Coastal Pioneer CP02PMUI");
focus2.append("text")
    .attr("class", "title")
    .attr("dy", "-.4em")
    .attr("transform", "translate(" + (0) + "," + (0) + "), rotate(0)")
    .attr("text-anchor", "start")
    .style("font-size", "14px")    
    .style("font-weight", "bold")
    .text("Global Irminger Sea GI02HYPM");


d3.queue()
    .defer(d3.csv, "data/chemistry5_CP02PMUI.csv", type)
    .defer(d3.csv, "data/chemistry5_GI02HYPM.csv", type)
    .await(function(error, file1, file2) {
      if (error) {
        console.error('Oh dear, something went wrong: ' + error);
      } else {
        drawGraph(file1, file2);
      }
    });

// OLD WAY
// d3.csv("data/chemistry5_CP02PMUI.csv", type, function(error, data) {
//  if (error) throw error;

drawGraph = function(data1,data2) {
  alldata = data1.concat(data2);
  x1.domain(d3.extent(data1, function(d) { return d.salinity; }));
  y1.domain(d3.extent(data1, function(d) { return d.pressure; }));
  x2.domain(d3.extent(data2, function(d) { return d.salinity; }));
  y2.domain(d3.extent(data2, function(d) { return d.pressure; }));
  x3.domain(d3.extent(alldata, function(d) { return d.date; }));
  y3.domain(d3.extent(alldata, function(d) { return d.salinity; }));
  color.domain(d3.extent(alldata, function(d) {return d.date}));

  var dots1 = focus1.append("g");
  //dots1.attr("clip-path", "url(#clip)")
  dots1.selectAll(".dot")
        .data(data1)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x1(d.salinity); })
        .attr("cy", function(d) { return y1(d.pressure); })
        .style("fill", function(d) {return color(d.date)});
  focus1.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height1 + ")")
      .call(xAxis1);
  focus1.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis1);

  var dots2 = focus2.append("g");
  //dots2.attr("clip-path", "url(#clip)")
  dots2.selectAll(".dot")
        .data(data2)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x2(d.salinity); })
        .attr("cy", function(d) { return y2(d.pressure); })
        .style("fill", function(d) {return color(d.date)});
  focus2.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height2 + ")")
      .call(xAxis2);
  focus2.append("g")
      .attr("class", "axis axis--y")
      .call(yAxis2);

  var dots3 = context.append("g");
  //dots3.attr("clip-path", "url(#clip)")
  dots3.selectAll(".dot")
        .data(data1)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x3(d.date); })
        .attr("cy", function(d) { return y3(d.salinity); })
        .style("fill", function(d) {return color(d.date)});
  context.append("g")
      .attr("class", "axis axis--x")
      .attr("transform", "translate(0," + height3 + ")")
      .call(xAxis3);

  selected_date = new Date(2015,6,1)
  //min_date = d3.min(alldata,function(d) {return d.date});
  context.append("g")
      .attr("class", "brush")
      .call(brush)
      //.call(brush.move, x.range());
      .call(brush.move,[x3(selected_date), x3(d3.timeDay.offset(selected_date,14))]) // Preselect 14 days

};

function brushed() {
  if (d3.event.sourceEvent && d3.event.sourceEvent.type === "zoom") return; // ignore brush-by-zoom
  var s = d3.event.selection || x3.range();
  focus1.selectAll(".dot")
    .attr("display","none")
  focus1.selectAll(".dot")
    .filter(function(d) {
        return (d.date > x3.invert(s[0]) && d.date < x3.invert(s[1]))
      })
    .attr("display","inline")
  focus2.selectAll(".dot")
    .attr("display","none")
  focus2.selectAll(".dot")
    .filter(function(d) {
        return (d.date > x3.invert(s[0]) && d.date < x3.invert(s[1]))
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
