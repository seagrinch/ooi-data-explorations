var margin = {top: 40, right: 16, bottom: 40, left: 54},
    chart_width = 300,
    width = chart_width - margin.left - margin.right,
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
    .attr("width", (width + margin.left + margin.right) * 3)
    .attr("height", height + margin.top + margin.bottom)
    .style("font-size","11px")
    .style("font-family","Tahoma, Geneva, sans-serif");

var div = d3.select("body").append("div")	
    .attr("class", "tooltip")				
    .style("opacity", 0);

var titles = {
  'CP02PMCI': 'Temperate Inshore Shelf',
  'CP02PMCO': 'Temperate Offshore Shelf',
  'GI02HYPM': 'Polar Deep Basin'
};

d3.csv("data/chemistry6.csv", function(error, data) {
  if (error) throw error;

  var dateFormat = d3.time.format.utc("%Y-%m-%d %H:%M:%S");
  var formatTime = d3.time.format("%e %B");

  date_array=[];

  data.forEach(function(d) {
    d.dt = dateFormat.parse(d.date);
    d.pressure = +d.pressure;
    d.temperature = +d.temperature;
    d.salinity = +d.salinity;
    d.index = +d.index;
    date_array[d.index] = d.dt;
    d.site = d.site;
  });

  var date_range = d3.extent(data, function(d) { return d.dt; });
  color.domain(d3.range(date_range[0],date_range[1], (date_range[1]-date_range[0])/11 ));

  nested = d3.nest()
    .key(function (d) { return d.site; })
    .entries(data);
 
  var jj=0;
  nested.forEach(function(d) {

    var chart = svg.append("g")
        .attr("transform", "translate(" + (chart_width*jj+margin.left) + "," + margin.top + ")");
    
    chart.append("g")
        .attr("id","_xAxis"+jj)
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
    
    chart.append("text")
        .attr("class", "label")
        .attr("dy", "-.3em")
        .attr("transform", "translate(" + (width/2) + "," + (height+margin.bottom) + "), rotate(0)")
        .attr("text-anchor", "middle")
        .style("font-size", "12px")    
        .style("font-weight", "normal")
        .text("Salinity");
    
    chart.append("g")
        .attr("id","_yAxis"+jj)
        .attr("class", "y axis")
        .call(yAxis)
    
    chart.append("text")
        .attr("class", "label")
        .attr("dy", "-3.4em")
        .attr("transform", "translate(0," + (height/2) + "), rotate(-90)")
        .attr("text-anchor", "middle")
        .style("font-size", "12px")
        .style("font-weight", "normal")
        .text("Depth (m)");
        
    var title = chart.append("text")
        .attr("class", "title")
        .attr("text-anchor", "middle")
        .style("font-size", "14px")
        .style("font-weight", "normal")
        .attr("transform", "translate(" + (width/2) + "," + (-margin.top/2) + ") ")
        .text(titles[d.key]);

  //x.domain(d3.extent(d.values, function(d) { return d.salinity; })).nice();
  //y.domain(d3.extent(d.values, function(d) { return d.pressure; })).nice();
  if (jj===2) {
    x.domain([34.84, 35]);    
    y.domain([0,2800]);
  } else {
    x.domain([33,36.5]);
    y.domain([0,130]);
  }

  // Update axes
  d3.select("#_yAxis"+jj).call(yAxis);
  d3.select("#_xAxis"+jj).call(xAxis);

  // Forground Data Dots
  chart.selectAll(".dot")
      .data(d.values)
    .enter().append("circle")
      .attr("class", "dot dot"+jj)
      .attr("r", 2.5)
      .attr("cx", function(d) { return x(d.salinity); })
      .attr("cy", function(d) { return y(d.pressure); })
      .style("fill", function(d) { return color(d.dt); })
      .on("mouseover", function(d) {		
        div.transition()		
          .duration(200)		
          .style("opacity", .9);		
        div.html("Pressure: "  + d.pressure + "<br/>Salinity: "  + d.salinity)	
          .style("left", (d3.event.pageX) + "px")		
          .style("top", (d3.event.pageY - 28) + "px");	
      })					
      .on("mouseout", function(d) {		
        div.transition()		
          .duration(500)		
          .style("opacity", 0);	
      });

  d3.selectAll('.axis line, .axis path')
    .style("shape-rendering","crispEdges")
    .style("fill","none")
    .style("stroke","#999")
    .style("stroke-width","1px");
  d3.selectAll('.y.axis line')
    .style("stroke-opacity",".4");

    jj++;

  }); //end forEach()

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

  var date_format = d3.time.format.utc("%B %e, %Y");
  $("#profile-slider-left").html(date_format(date_range[0]));
  $("#profile-slider-right").html(date_format(date_range[1]));

}); //end csv()

sliderAdd = function(){
  var slider = $("#profile-slider"),
      val = slider.slider("option","value");
  if (val != slider.slider("option","max")){
    slider.slider("value", +val + 1 );
  }
  sliderUpdate($("#profile-slider").slider("option","value"));
}

sliderSubtract = function(){
  var slider = $("#profile-slider"),
      val = slider.slider("option","value");
  if (val != slider.slider("option","min")){
    slider.slider("value", +val - 1 );
  }
  sliderUpdate($("#profile-slider").slider("option","value"));
}

sliderUpdate = function(val){
  if ($('#show_context').prop('checked')==true) {
    svg.selectAll(".dot")
      .filter(function(d) {return d.index!=val})
      .attr("display","inline")
      .style("fill", "grey")
      .style("opacity",.1)
  } else {
    svg.selectAll(".dot")
      .filter(function(d) {return d.index!=val})
      .attr("display","none")
  }    
  svg.selectAll(".dot")
    .filter(function(d) {return d.index==val})
    .attr("display","inline")
    .style("fill", function(d) { return color(d.dt); })
    .style("opacity",1)
  var date_format = d3.time.format.utc("%B %e, %Y");
  $('#chart-date').text(date_format(date_array[val]));
}

showContext = function(){
  sliderUpdate($("#profile-slider").slider("option","value"));
}

function match_salinity(el) {
  if (el.checked) {
    x.domain([33,36.5]);
    svg.select("#_xAxis0").call(xAxis);
    svg.select("#_xAxis1").call(xAxis);
    svg.select("#_xAxis2").call(xAxis);
    svg.selectAll(".dot0").attr("cx", function(d) { return x(d.salinity); });
    svg.selectAll(".dot1").attr("cx", function(d) { return x(d.salinity); });
    svg.selectAll(".dot2").attr("cx", function(d) { return x(d.salinity); });
  } else {
    x.domain([33,36.5]);
    svg.select("#_xAxis0").call(xAxis);
    svg.select("#_xAxis1").call(xAxis);
    svg.selectAll(".dot0").attr("cx", function(d) { return x(d.salinity); });
    svg.selectAll(".dot1").attr("cx", function(d) { return x(d.salinity); });
    x.domain([34.84, 35]);
    svg.select("#_xAxis2").call(xAxis);
    svg.selectAll(".dot2").attr("cx", function(d) { return x(d.salinity); });
  }
}

function match_depth(el) {
  if (el.checked) {
    y.domain([0,2800]);
    svg.select("#_yAxis0").call(yAxis);
    svg.select("#_yAxis1").call(yAxis);
    svg.select("#_yAxis2").call(yAxis);
    svg.selectAll(".dot0").attr("cy", function(d) { return y(d.pressure); });
    svg.selectAll(".dot1").attr("cy", function(d) { return y(d.pressure); });
    svg.selectAll(".dot2").attr("cy", function(d) { return y(d.pressure); });
  } else {
    y.domain([0,130]);
    svg.select("#_yAxis0").call(yAxis);
    svg.select("#_yAxis1").call(yAxis);
    svg.selectAll(".dot0").attr("cy", function(d) { return y(d.pressure); });
    svg.selectAll(".dot1").attr("cy", function(d) { return y(d.pressure); });
    y.domain([0,2800]);
    svg.select("#_yAxis2").call(yAxis);
    svg.selectAll(".dot2").attr("cy", function(d) { return y(d.pressure); });
  }
}
