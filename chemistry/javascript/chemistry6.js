var margin = {top: 40, right: 16, bottom: 40, left: 54},
    width = 400 - margin.left - margin.right,
    height = 450 - margin.top - margin.bottom;

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.linear()
    .range([0, height]); //Flip y-axis

var color = d3.scale.linear()
    .range(colorbrewer.Dark2[8]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var svg = d3.select("#chart").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .style("font-size","11px")
    .style("font-family","Tahoma, Geneva, sans-serif");

var chart = svg.append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

chart.append("g")
    .attr("id","_xAxis")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + height + ")")
    .call(xAxis)

svg.append("text")
    .attr("class", "label")
    .attr("dy", "-.3em")
    .attr("transform", "translate(" + (width/2+margin.left) + "," + (height+margin.top+margin.bottom) + "), rotate(0)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")    
    .style("font-weight", "normal")
    .text("Salinity");

chart.append("g")
    .attr("id","_yAxis")
    .attr("class", "y axis")
    .call(yAxis)

svg.append("text")
    .attr("class", "label")
    .attr("dy", "12px")
    .attr("transform", "translate(" + (0) + "," + (height/2+margin.top) + "), rotate(-90)")
    .attr("text-anchor", "middle")
    .style("font-size", "12px")
    .style("font-weight", "normal")
    .text("Pressure (dbar)")

var title = svg.append("text")
    .attr("class", "title")
    .attr("text-anchor", "middle")
    .style("font-size", "14px")
    .style("font-weight", "normal")
    .attr("transform", "translate(" + (width/2+margin.left) + "," + (margin.top/2) + ") ")
    .text("Title");

/*
var legend = svg.selectAll(".legend")
    .data(color.domain())
  .enter().append("g")
    .attr("class", "legend")
    .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

legend.append("rect")
    .attr("x", width - 18)
    .attr("width", 18)
    .attr("height", 18)
    .style("fill", color);

legend.append("text")
    .attr("x", width - 24)
    .attr("y", 9)
    .attr("dy", ".35em")
    .style("text-anchor", "end")
    .text(function(d) { return d; });
*/

// chemistry6_CP02PMCI
// chemistry6_CP02PMCO
// chemistry6_GI02HYPM

drawGraph = function(dataset) {

  d3.csv("data/chemistry6_"+dataset+".csv", function(error, data) {
    if (error) throw error;
  
    var dateFormat = d3.time.format.utc("%Y-%m-%d %H:%M:%S");
  
    date_array=[];
  
    data.forEach(function(d) {
      d.dt = dateFormat.parse(d.date);
      d.pressure = +d.pressure;
      d.temperature = +d.temperature;
      d.salinity = +d.salinity;
      d.index = +d.index;
      date_array[d.index] = d.dt;
    });
    
    x.domain(d3.extent(data, function(d) { return d.salinity; })).nice();
    y.domain(d3.extent(data, function(d) { return d.pressure; })).nice();
  
    var date_range = d3.extent(data, function(d) { return d.dt; });
    color.domain(d3.range(date_range[0],date_range[1], (date_range[1]-date_range[0])/11 ));
  
    // Update axes
    d3.select("#_yAxis").call(yAxis);
    d3.select("#_xAxis").call(xAxis);

    // Clear all existing elements
    chart.selectAll(".dot2").remove();
    chart.selectAll(".dot").remove();
  
    // Background Context Dots
    chart.selectAll(".dot2")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot2")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x(d.salinity); })
        .attr("cy", function(d) { return y(d.pressure); })
        .style("fill", "grey")
        .style("opacity",.1)
        .attr("display","none")
  
    // Forground Data Dots
    chart.selectAll(".dot")
        .data(data)
      .enter().append("circle")
        .attr("class", "dot")
        .attr("r", 2.5)
        .attr("cx", function(d) { return x(d.salinity); })
        .attr("cy", function(d) { return y(d.pressure); })
        .style("fill", function(d) { return color(d.dt); })
  
    d3.selectAll('.axis line, .axis path')
      .style("shape-rendering","crispEdges")
      .style("fill","none")
      .style("stroke","#999")
      .style("stroke-width","1px");
    d3.selectAll('.y.axis line')
      .style("stroke-opacity",".4");
  
    $("#profile-slider")
      .slider({
        min: d3.min(data, function(d) {return d.index}),
        max: d3.max(data, function(d) {return d.index}),
        slide: function(event, ui) {
          sliderUpdate(ui.value);
        },
        value: d3.min(data, function(d) {return d.index})
      });
  
    sliderUpdate($("#profile-slider").slider("option","value"));
    showContext();  //Keep Context if selected
  
    var date_format = d3.time.format.utc("%B %e, %Y");
    $("#profile-slider-left").html(date_format(date_range[0]));
    $("#profile-slider-right").html(date_format(date_range[1]));
  
  });

}; //drawGraph

// Draw Default Graph
drawGraph('CP02PMCI') 

sliderAdd = function(){
  var slider = $("#profile-slider"),
      val = slider.slider("option","value");
  if (val != slider.slider("option","max")){
    slider.slider("value", +val + 1 );
  }
  sliderUpdate(val)
}

sliderSubtract = function(){
  var slider = $("#profile-slider"),
      val = slider.slider("option","value");
  if (val != slider.slider("option","min")){
    slider.slider("value", +val - 1 );
  }
  sliderUpdate(val)
}

sliderUpdate = function(val){
  chart.selectAll(".dot")
    .filter(function(d) {return d.index==val})
    .attr("display","inline")
  chart.selectAll(".dot")
    .filter(function(d) {return d.index!=val})
    .attr("display","none")
    
  var date_format = d3.time.format.utc("%B %e, %Y");
  title.text(date_format(date_array[val]));
  $('#show_all').prop('checked', false);
}

showAll = function(){
  if ($('#show_all').prop('checked')==true) {
    chart.selectAll(".dot")
      .attr("display","inline")
    title.text('All Profiles')    
  } else {
    sliderUpdate($("#profile-slider").slider("option","value"));
  }
}

showContext = function(){
  if ($('#show_context').prop('checked')==true) {
    chart.selectAll(".dot2")
      .attr("display","inline")
  } else {
    chart.selectAll(".dot2")
      .attr("display","none")
  }
}

updateGraph = function(dataset) {
  console.log(dataset);
  drawGraph(dataset)
}