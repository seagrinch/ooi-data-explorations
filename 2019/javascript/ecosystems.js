/* Ecosystems Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers University
  Revised 8/20/2021
*/

// Setup initial SVG
var svg = d3.select("#chart").append("svg")
      .attr("width",800)
      .attr("height",500);

// Specify coordinates for each graph
var margin1 = {top: 50, right: 540, bottom: 10, left: 40},
    margin2 = {top: 50, right: 280, bottom: 10, left: 300},
    margin3 = {top: 50, right: 20, bottom: 10, left: 560},
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
  d.depth = +d.depth;
  d.seawater_temperature = +d.seawater_temperature;
  d.practical_salinity = +d.practical_salinity;
  d.dissolved_oxygen = +d.dissolved_oxygen;
  d.par = +d.par;
  d.chl = +d.chl;
  return d;
}

//Read the data
d3.csv("data/ecosystem_profiles.csv", parseData, function(data) {

  // Setup selector options
  var varNames = [{'id':'seawater_temperature','title':'Seawater Temperature','label':'Temperature (C)'},
                  {'id':'practical_salinity','title':'Practical Salinity','label':'Salinity (psu)'},
                  {'id':'dissolved_oxygen','title':'Dissolved Oxygen','label':'DO (µmol/kg)'},
                  {'id':'chl','title':'Chlorophyll a','label':'Chlorophyll (µg/L)'},
                  {'id':'par','title':'PAR','label':'PAR (µmol photons m-2 s-1)'}];
  var depthNames = [{'id':1, 'title':'Shallow (0-50m)'},
                    {'id':2, 'title':'Middle (50-200m)'},
                    {'id':3, 'title':'Full Profiles'}];

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
  d3.select("#selectVar3")
    .selectAll('myOptions')
   	.data(varNames)
    .enter()
  	.append('option')
    .text(function (d) { return d.title; })
    .attr("value", function (d) { return d.id; })
  d3.select("#selectDepth")
    .selectAll('myOptions')
   	.data(depthNames)
    .enter()
  	.append('option')
    .text(function (d) { return d.title; })
    .attr("value", function (d) { return d.id; })

  // Reformat dataset
  var dataNest = d3.nest()
        .key(function(d) {return d.site;})
        .entries(data);
  var dataKeys = dataNest.map(function(d){ return d.key })
  var color = d3.scaleOrdinal()
    .domain(dataKeys)
    .range(["#4e79a7","#edc949","#e15759"])

  // Initialize the axes
  var x1 = d3.scaleLinear().range([ 0, width1 ])
  var x2 = d3.scaleLinear().range([ 0, width2 ])
  var x3 = d3.scaleLinear().range([ 0, width3 ])
  var y = d3.scaleLinear().range([ 0, height1 ]) // Flip axis

  var xAxis1 = d3.axisBottom().scale(x1).ticks(5)
  var xAxis2 = d3.axisBottom().scale(x2).ticks(5)
  var xAxis3 = d3.axisBottom().scale(x3).ticks(4,'f')
  var yAxis = d3.axisLeft().scale(y).ticks(7,'f')
  var xAxis1t = d3.axisTop().scale(x1).ticks(5)
  var xAxis2t = d3.axisTop().scale(x2).ticks(5)
  var xAxis3t = d3.axisTop().scale(x3).ticks(4,'f')

/*
  graph1.append("g")
    .attr("transform", "translate(0," + height1 + ")")
    .attr("class","xAxis1")
  graph2.append("g")
    .attr("transform", "translate(0," + height2 + ")")
    .attr("class","xAxis2")
  graph3.append("g")
    .attr("transform", "translate(0," + height3 + ")")
    .attr("class","xAxis3")
*/
    
  graph1.append("g")
    .attr("class","yAxis1")
  graph2.append("g")
    .attr("class","yAxis2")
  graph3.append("g")
    .attr("class","yAxis3")

  graph1.append("g")
    .attr("transform", "translate(0,0)")
    .attr("class","xAxis1t")
  graph2.append("g")
    .attr("transform", "translate(0,0)")
    .attr("class","xAxis2t")
  graph3.append("g")
    .attr("transform", "translate(0,0)")
    .attr("class","xAxis3t")

  // Add labels
  xLabel1 = graph1.append("text")
      .attr("text-anchor", "middle")
      .attr("font-size", "14px")
      .attr("x", width1/2)
      .attr("y", -25)
      .text("Label1");
  xLabel2 = graph2.append("text")
      .attr("text-anchor", "middle")
      .attr("font-size", "14px")
      .attr("x", width2/2)
      .attr("y", -25)
      .text("Label2");
  xLabel3 = graph3.append("text")
      .attr("text-anchor", "middle")
      .attr("font-size", "14px")
      .attr("x", width2/2)
      .attr("y", -25)
      .text("Label3");
  yLabel = graph1.append("text")
      .attr("text-anchor", "end")
      .attr("font-size", "14px")
      .attr("transform", "rotate(-90)")
      .attr("y", -30)
      .attr("x", 0)
      .text("Depth (m)")
/*
  title = graph2.append("text")
      .attr("text-anchor", "middle")
      .attr("font-weight", "bold")
      .attr("font-size", "16px")
      .attr("x", width1/2)
      .attr("y", -25)
      .text("Ecosystem Profiles");
*/

  // Create a tooltip div
  var Tooltip = d3.select("#chart")
    .append("div")
      .style("opacity", 0)
      .attr("class", "tooltip")
      .style("background-color", "white")
      .style("border", "solid")
      .style("border-width", "2px")
      .style("border-radius", "5px")
      .style("padding", "5px")
      .style("position", "absolute")
      .style("display", "block")
    
  // Tooltip mouseover functions
  var mouseover = function(d) {
    Tooltip.style("opacity", 1)
  }
  var mousemove = function(d,mousevar) {
    // console.log(mousevar)
    Tooltip
      .html('Depth: ' + d.depth + '<br>Value: ' + d[mousevar])
      .style("left", (event.pageX) + 10 + "px")
      .style("top",(event.pageY) + "px")
      //.style("left", legendX + 20 + "px")
      //.style("top","350px")
      //.style("left", (d3.mouse(this)[0]+70) + "px")
      //.style("top", (d3.mouse(this)[1]) + "px")
  }
  var mouseleave = function(d) {
    Tooltip.style("opacity", 0)
  }

  // Function to update graph with specified options
  function updateGraph() {
    
    var var1 = d3.select("#selectVar1").property("value")
    label1 = varNames.find(el => el.id==var1).label;
    xLabel1.text(label1);
    var var2 = d3.select("#selectVar2").property("value")
    label2 = varNames.find(el => el.id==var2).label;
    xLabel2.text(label2);
    var var3 = d3.select("#selectVar3").property("value")
    label3 = varNames.find(el => el.id==var3).label;
    xLabel3.text(label3);
    
    var choices = [];
    d3.selectAll(".siteBox").each(function(d){
      cb = d3.select(this);
      if(cb.property("checked")){
        choices.push(cb.property("value"));
      }
    });
    dataSelected = data.filter(function(d,i){return choices.includes(d.site) });
    dataNestSelected = dataNest.filter(function(d,i){return choices.includes(d.key) });
        
    var t = d3.transition().duration(1000)
    
    x1.domain(d3.extent(dataSelected, function(d) { return d[var1] }) ).nice();
    //x1.domain([0,27])
    graph1.selectAll(".xAxis1").transition(t).call(xAxis1);
    graph1.selectAll(".xAxis1t").transition(t).call(xAxis1t);

    x2.domain(d3.extent(dataSelected, function(d) { return d[var2] }) ).nice();
    //x2.domain([34.5,36.7])
    graph2.selectAll(".xAxis2").transition(t).call(xAxis2);
    graph2.selectAll(".xAxis2t").transition(t).call(xAxis2t);

    x3.domain(d3.extent(dataSelected, function(d) { return d[var3] }) ).nice();
    //x3.domain([1023.8,1028])
    graph3.selectAll(".xAxis3").transition(t).call(xAxis3);
    graph3.selectAll(".xAxis3t").transition(t).call(xAxis3t);

    var selectedDepth = d3.select("#selectDepth").property("value");
    // console.log(selectedDepth)
    if (selectedDepth==='2') {
      y.domain([50,200]);
    } else if (selectedDepth==='3') {
      y.domain([0, d3.max(dataSelected, function(d) { return d.depth }) ]);
    } else {
      y.domain([0,50]);
    }
    graph1.selectAll(".yAxis1").transition(t).call(yAxis);
    graph2.selectAll(".yAxis2").transition(t).call(yAxis);
    graph3.selectAll(".yAxis3").transition(t).call(yAxis);

    // Update the lines
    function updateLine(graph,xvar,yvar,mousevar) {
      var lines = graph.selectAll(".line")
        .data(dataNestSelected, function (d) {
          return d.key;
        })
      lines.transition(t)
          .attr("fill", "none")
          .attr("stroke", function(d){ return color(d.key) })
          .attr("stroke-width", 3)
          .attr("d", function(d) {
            return d3.line()
              .x(xvar)
              .y(yvar)
              (d.values)
          })
      lines.enter()
        .append("path")
          .attr('class','line')
          .attr("fill", "none")
          .attr("stroke", function(d){ return color(d.key) })
          .attr("stroke-width", 3)
          .attr("clip-path", "url(#clip)") // Add Clip-path
          .attr("d", function(d) {
            return d3.line()
              .x(xvar)
              .y(yvar)
              (d.values)
          })
      lines.exit().remove();

      // Remove all dots first to fix bug where mouseover doesn't update on existing dots
      graph.selectAll('.dot').remove();

      // Add dots for tooltips
      var dots = graph.selectAll('.dot')
        .data(dataSelected);
      dots.transition(t)
        .attr("cx", xvar )
        .attr("cy", yvar )
      dots.enter()
        .append("circle")
        .attr('class','dot')
        .attr("cx", xvar )
        .attr("cy", yvar )
        .attr("r", 6)
        .style("stroke", "black")
        .style("stroke-width", 1)
        .style("fill", "#48D1CC") /* MediumTurquoise (web colors) */
        .attr('opacity',0) //Hide the dots, except on hover!
        .on("mouseover", mouseover)
        .on("mousemove", function (d) { return mousemove(d, mousevar)})
        .on("mouseleave", mouseleave)
        .attr("clip-path", "url(#clip)") // Add Clip-path
      dots.exit().remove()

    }
    
    // Redraw lines
    updateLine(graph1, function(d) { return x1(d[var1])}, function(d) { return y(d.depth)}, var1)
    updateLine(graph2, function(d) { return x2(d[var2])}, function(d) { return y(d.depth)}, var2)
    updateLine(graph3, function(d) { return x3(d[var3])}, function(d) { return y(d.depth)}, var3)
         
  }
  
  // Set default form fields
  d3.select('#selectVar1').property('value', 'par');
  d3.select('#selectVar2').property('value', 'chl');
  d3.select('#selectVar3').property('value', 'dissolved_oxygen');
  d3.select('#selectDepth').property('value', 1);

  // Initialize graph
  updateGraph()

  // Add pull-down watchers
  d3.selectAll(".siteBox").on("change",updateGraph);
  d3.select("#selectVar1").on("change", updateGraph);
  d3.select("#selectVar2").on("change", updateGraph);
  d3.select("#selectVar3").on("change", updateGraph);
  d3.select("#selectDepth").on("change", updateGraph);
  
})
