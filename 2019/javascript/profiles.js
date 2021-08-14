/* Ocean Profiles Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy
  Based on the Density Lab #3 from the 2020 Lab Notebook collection
  Revised 8/13/2021

  References:
  https://www.d3-graph-gallery.com/graph/line_filter.html
*/


// Setup initial SVG
var svg = d3.select("#chart").append("svg")
      .attr("width",800)
      .attr("height",500);

// Specify coordinates for each graph
var margin1 = {top: 20, right: 540, bottom: 40, left: 40},
    margin2 = {top: 20, right: 280, bottom: 40, left: 300},
    margin3 = {top: 260, right: 20, bottom: 40, left: 580},
    width1 = +svg.attr("width") - margin1.left - margin1.right,
    width2 = +svg.attr("width") - margin2.left - margin2.right,
    width3 = +svg.attr("width") - margin3.left - margin3.right,
    height1 = +svg.attr("height") - margin1.top - margin1.bottom,
    height2 = +svg.attr("height") - margin2.top - margin2.bottom,
    height3 = +svg.attr("height") - margin3.top - margin3.bottom;

var graph1 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin1.left + "," + margin1.top + ")");
var graph2 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin2.left + "," + margin2.top + ")");
var graph3 = svg.append("g")
    .attr("class", "focus")
    .attr("transform", "translate(" + margin3.left + "," + margin3.top + ")");

svg.append("defs").append("clipPath")
    .attr("id", "clip")
  .append("rect")
    .attr("width", width1)
    .attr("height", height1);

// Add the grey background that makes ggplot2 famous
graph1.append("rect")
    .attr("x",0)
    .attr("y",0)
    .attr("height", height1)
    .attr("width", width1)
    .style("fill", "#EBEBEB")
graph2.append("rect")
    .attr("x",0)
    .attr("y",0)
    .attr("height", height2)
    .attr("width", width2)
    .style("fill", "#EBEBEB")
graph3.append("rect")
    .attr("x",0)
    .attr("y",0)
    .attr("height", height3)
    .attr("width", width3)
    .style("fill", "#EBEBEB")

function parseData(d){
  d.pressure_bin = +d.pressure_bin;
  d.seawater_temperature = +d.seawater_temperature;
  d.practical_salinity = +d.practical_salinity;
  d.dissolved_oxygen = +d.dissolved_oxygen;
  d.chlorophyll_a = +d.chlorophyll_a;
  d.pco2_seawater = +d.pco2_seawater;
  return d;
}

//Read the data
d3.csv("data/rs03axps_profiles.csv", parseData, function(data) {
  
  // Setup selector options
  var varNames = [{'id':'seawater_temperature','title':'Seawater Temperature','label':'Temperature (C)'},
                  {'id':'practical_salinity','title':'Practical Salinity','label':'Salinity (psu)'},
                  {'id':'dissolved_oxygen','title':'Dissolved Oxygen','label':'DO (µmol/kg)'},
                  {'id':'chlorophyll_a','title':'Chlorophyll a','label':'Chlorophyll (µg/L)'}];
                  // Removed due to data quality {'id':'pco2_seawater','title':'pCO2','label':'pCO2 (µatm)'}
  var monthNames = ["January","February","March","April","May","June","July","August","September","October","November","December"];

  // Add options to the buttons
  d3.select("#selectVar1")
    .selectAll('myOptions')
   	.data(varNames)
    .enter()
  	.append('option')
    .text(function (d) { return d.title; })
    .attr("value", function (d) { return d.id; })
  d3.select("#selectVar2")
    .selectAll('myOptions')
   	.data(varNames)
    .enter()
  	.append('option')
    .text(function (d) { return d.title; })
    .attr("value", function (d) { return d.id; })
  d3.select("#selectMonth")
    .selectAll('myOptions')
   	.data(monthNames)
    .enter()
  	.append('option')
    .text(function (d,i) { return d; })
    .attr("value", function (d,i) { return i+1; })

  // Initialize the axes
  var x1 = d3.scaleLinear().range([ 0, width1 ])
  var x2 = d3.scaleLinear().range([ 0, width2 ])
  var x3 = d3.scaleLinear().range([ 0, width3 ])
  var y = d3.scaleLinear().range([ 0, height1 ]) // Flip axis
  var y3 = d3.scaleLinear().range([ height3, 0 ]) // Regular axis

  var xAxis1 = d3.axisBottom().scale(x1).ticks(5)
  var xAxis2 = d3.axisBottom().scale(x2).ticks(5)
  var xAxis3 = d3.axisBottom().scale(x3).ticks(4,'f')
  var yAxis = d3.axisLeft().scale(y).ticks(7)
  var yAxis3 = d3.axisLeft().scale(y3).ticks(7)

  graph1.append("g")
    .attr("transform", "translate(0," + height1 + ")")
    .attr("class","myXaxis1")
  graph2.append("g")
    .attr("transform", "translate(0," + height2 + ")")
    .attr("class","myXaxis2")
  graph3.append("g")
    .attr("transform", "translate(0," + height3 + ")")
    .attr("class","myXaxis3")
  graph1.append("g")
    .attr("class","myYaxis1")
  graph2.append("g")
    .attr("class","myYaxis2")
  graph3.append("g")
    .attr("class","myYaxis3")

  // Add labels
  xLabel1 = graph1.append("text")
      .attr("text-anchor", "middle")
      .attr("font-size", "14px")
      .attr("x", width1/2)
      .attr("y", height1 + 32)
      .text("Label 1");
  xLabel2 = graph2.append("text")
      .attr("text-anchor", "middle")
      .attr("font-size", "14px")
      .attr("x", width2/2)
      .attr("y", height2 + 32)
      .text("Label 2");
  xLabel3 = graph3.append("text")
      .attr("text-anchor", "middle")
      .attr("font-size", "14px")
      .attr("x", width3/2)
      .attr("y", height3 + 32)
      .text("Label 3");
  yLabel = graph1.append("text")
      .attr("text-anchor", "end")
      .attr("font-size", "14px")
      .attr("transform", "rotate(-90)")
      .attr("y", -27)
      .attr("x", 0)
      .text("Depth (m)")
  yLabel3 = graph3.append("text")
      .attr("text-anchor", "end")
      .attr("font-size", "14px")
      .attr("transform", "rotate(-90)")
      .attr("y", -34)
      .attr("x", 0)
      .text("Label Y3")
  title1 = graph1.append("text")
      .attr("text-anchor", "middle")
      .attr("font-weight", "bold")
      .attr("font-size", "16px")
      .attr("x", width1)
      .attr("y", -8)
      .text("Title");
  title3 = graph3.append("text")
      .attr("text-anchor", "middle")
      .attr("font-weight", "bold")
      .attr("font-size", "14px")
      .attr("x", width3/2)
      .attr("y", -8)
      .text("Variable Comparison");

  // Initialize lines
  var line1 = graph1.append('g')
    //.attr("clip-path", "url(#clip)")
    .append("path")
    .attr("class", "line")
    .attr("fill", "none")
    .attr("stroke", "#00008B") /* DarkBlue (web colors) */
    .attr("stroke-width", 3)
  var line2 = graph2.append('g')
    //.attr("clip-path", "url(#clip)")
    .append("path")
    .attr("class", "line")
    .attr("fill", "none")
    .attr("stroke", "#00008B") /* DarkBlue (web colors) */
    .attr("stroke-width", 3)
  var line3 = graph3.append('g')
    //.attr("clip-path", "url(#clip)")
    .append("path")
    .attr("class", "line")
    .attr("fill", "none")
    .attr("stroke", "#00008B") /* DarkBlue (web colors) */
    .attr("stroke-width", 3)

  // This allows to find the closest index of the mouse
  var bisect = d3.bisector(function(d) { return d.pressure_bin; }).left;
  
  // Specify decimal format
  var f = d3.format(".2f");

  // Create the circle that travels along the curve of chart
  var focus1 = graph1
    .append('g')
    .append('circle')
      .style("fill", "#48D1CC") /* MediumTurquoise (web colors) */
      .attr("stroke", "black")
      .attr("stroke-width", 1)
      .attr('r', 6)
      .style("opacity", 0)
  var focus2 = graph2
    .append('g')
    .append('circle')
      .style("fill", "#48D1CC") /* MediumTurquoise (web colors) */
      .attr("stroke", "black")
      .attr("stroke-width", 1)
      .attr('r', 6)
      .style("opacity", 0)
  var focus3 = graph3
    .append('g')
    .append('circle')
      .style("fill", "#48D1CC") /* MediumTurquoise (web colors) */
      .attr("stroke", "black")
      .attr("stroke-width", 1)
      .attr('r', 6)
      .style("opacity", 0)

  // Create the text that travels along the curve of chart
  var focusText1 = graph1
    .append('g')
    .append('text')
      .style("opacity", 0)
      .attr("text-anchor", "end")
      .attr("alignment-baseline", "middle")
      .attr("x", 200).attr("y", height1-10)
  var focusText2 = graph2
    .append('g')
    .append('text')
      .style("opacity", 0)
      .attr("text-anchor", "left")
      .attr("alignment-baseline", "middle")
      .attr("x", 10).attr("y", height1-10)
  var focusText3 = graph3
    .append('g')
    .append('text')
      .style("opacity", 0)
      .attr("text-anchor", "left")
      .attr("alignment-baseline", "middle")
      .attr("x", 10).attr("y", height3-10)

  // Create a rect on top of the svg area: this rectangle recovers mouse position
  var g1 = graph1
    .append('rect')
    .style("fill", "none")
    .style("pointer-events", "all")
    .attr('width', width1)
    .attr('height', height1)
  var g2 = graph2
    .append('rect')
    .style("fill", "none")
    .style("pointer-events", "all")
    .attr('width', width2)
    .attr('height', height2)
  var g3 = graph3
    .append('rect')
    .style("fill", "none")
    .style("pointer-events", "all")
    .attr('width', width3)
    .attr('height', height3)

  // Function to update graph with specified options
  function updageGraph(var1,var2,month) {

    label1 = varNames.find(el => el.id==var1).label;
    label2 = varNames.find(el => el.id==var2).label;
    xLabel1.text(label1);
    xLabel2.text(label2);
    xLabel3.text(label1);
    yLabel3.text(label2);
    
    var dataSelected = data.filter(function(d){return (d.month==month) })

    // To auto-scale, used dataSelected.  Otherwise use data.
    x1.domain(d3.extent(data, function(d) { return d[var1] }) ).nice();
    graph1.selectAll(".myXaxis1").transition().call(xAxis1);
    x2.domain(d3.extent(data, function(d) { return d[var2] }) ).nice();
    graph2.selectAll(".myXaxis2").transition().call(xAxis2);
    x3.domain(d3.extent(data, function(d) { return d[var1] }) ).nice();
    graph3.selectAll(".myXaxis3").transition().call(xAxis3);
    
    y.domain([0, d3.max(data, function(d) { return d.pressure_bin }) ]);    
    graph1.selectAll(".myYaxis1").transition().call(yAxis);
    graph2.selectAll(".myYaxis2").transition().call(yAxis);

    y3.domain(d3.extent(data, function(d) { return d[var2] })).nice();
    graph3.selectAll(".myYaxis3").transition().call(yAxis3);

    // Update the lines
    line1
      .datum(dataSelected)
      .transition()
      .attr("d", d3.line()
        .x(function(d) { return x1(d[var1]) })
        .y(function(d) { return y(d.pressure_bin) })
      )
    line2
      .datum(dataSelected)
      .transition()
      .attr("d", d3.line()
        .x(function(d) { return x2(d[var2]) })
        .y(function(d) { return y(d.pressure_bin) })
      )
    line3
      .datum(dataSelected)
      .transition()
      .attr("d", d3.line()
        .x(function(d) { return x3(d[var1]) })
        .y(function(d) { return y3(d[var2]) })
      )
      
    title1.text('Axial Base Shallow Profiler - ' + monthNames[+month-1])
  
    g1
      .on('mouseover', mouseover)
      .on('mousemove', mousemove)
      .on('mouseout', mouseout);
    g2
      .on('mouseover', mouseover)
      .on('mousemove', mousemove)
      .on('mouseout', mouseout);
/*
    g3
      .on('mouseover', mouseover)
      .on('mousemove', mousemove)
      .on('mouseout', mouseout);
*/

    // What happens when the mouse move -> show the annotations at the right positions.
    function mouseover() {
      focus1.style("opacity", 1)
      focusText1.style("opacity",1)
      focus2.style("opacity", 1)
      focusText2.style("opacity",1)
      focus3.style("opacity", 1)
      focusText3.style("opacity",1)
    }
  
    function mousemove() {
      // recover coordinate we need
      var y0 = y.invert(d3.mouse(this)[1]);
      var i = bisect(dataSelected, y0);
      dataPoint = dataSelected[i]
      focus1
        .attr("cx", x1(dataPoint[var1]) )
        .attr("cy", y(dataPoint.pressure_bin) )
      focusText1
        .html(label1 + ": " + f(dataPoint[var1]))
        //.attr("x", x1(dataPoint.seawater_temperature) + 15 )
        //.attr("y", y(dataPoint.pressure_bin) )
      focus2
        .attr("cx", x2(dataPoint[var2]) )
        .attr("cy", y(dataPoint.pressure_bin) )
      focusText2
        .html(label2 + ": " + f(dataPoint[var2]))
      focus3
        .attr("cx", x3(dataPoint[var1]) )
        .attr("cy", y3(dataPoint[var2]) )
      focusText3
        .html(f(dataPoint[var1]) + ', ' + f(dataPoint[var2]) +' @ ' + dataPoint.pressure_bin + 'm')
      }
  
    function mouseout() {
      focus1.style("opacity", 0)
      focusText1.style("opacity", 0)
      focus2.style("opacity", 0)
      focusText2.style("opacity", 0)
      focus3.style("opacity", 0)
      focusText3.style("opacity", 0)
    }

  }

  // Initialize Graphs
  updageGraph('seawater_temperature','dissolved_oxygen',1)
  d3.select('#selectVar1').property('value', 'seawater_temperature');  // Set default
  d3.select('#selectVar2').property('value', 'dissolved_oxygen');  // Set default
  
  // Add pull-down watchers
  d3.select("#selectVar1").on("change", function(d) {
    var var1 = d3.select("#selectVar1").property("value")
    var var2 = d3.select("#selectVar2").property("value")
    var month = d3.select("#selectMonth").property("value")
    console.log(var1,var2,month)
    updageGraph(var1,var2,month)    
  })
  d3.select("#selectVar2").on("change", function(d) {
    var var1 = d3.select("#selectVar1").property("value")
    var var2 = d3.select("#selectVar2").property("value")
    var month = d3.select("#selectMonth").property("value")
    console.log(var1,var2,month)
    updageGraph(var1,var2,month)    
  })
  d3.select("#selectMonth").on("change", function(d) {
    var var1 = d3.select("#selectVar1").property("value")
    var var2 = d3.select("#selectVar2").property("value")
    var month = d3.select("#selectMonth").property("value")
    console.log(var1,var2,month)
    updageGraph(var1,var2,month)    
  })

})

