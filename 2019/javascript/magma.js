/* Magma Movement - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/magma_botpt.csv", {
    title: 'Axial Seamount Central Caldera',
    ylabel: 'Pressure (psi)',
    y2label: 'Depth (m)',
    labelsSeparateLines: true,
    labelsUTC : true,
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    //rangeSelectorHeight: 30,
    animatedZooms : false,
    axes: {
      y: {valueRange: [2260,2250]},
      y2: {valueRange: [1514,1507.5], axisLabelWidth: 70}
    },
    series: {
      'Pressure (psi)': {axis: 'y', color:'#00457C', showInRangeSelector: true},
      'Depth (m)': {axis: 'y2', color:'#DBA53A'},
    },
    visibility: [1,1,0],
  });

  var interp2 = function(a,b,c,d,y) {
    return (y-c)*(b-a)/(d-c) + a;
  }

  var customPoint = function(g, series, ctx, cx, cy, color, radius, idx) {
    var y = g2.getValue(idx, 3);
    var pointColor = y>1 ? 'green' : 'blue';
    var pointSize = interp2(.1,4,0,3,y)
    //ctx.save();
    //ctx.fillStyle = pointColor;
    ctx.beginPath();
    ctx.arc(cx, cy, pointSize, 2*Math.PI, false);
    ctx.closePath();
    ctx.fill();
  }

  g2 = new Dygraph(document.getElementById("chart2"), "data/magma_earthquakes.csv", {
    ylabel: 'Earthquake Depth (km)',
    labelsSeparateLines: true,
    labelsUTC : true,
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 1.5,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,1,0],
    color: '#f26f43',
    //series: {
    //  'mag': {axis: 'y', color:'#DBA53A'},
    //  'depth': {axis: 'y2', color:'#00457C'},
    //},
    //drawPointCallback: circle,
  });

  g3 = new Dygraph(document.getElementById("chart3"), "data/magma_earthquakes.csv", {
    ylabel: 'Earthquake Magnitude',
    labelsSeparateLines: true,
    labelsUTC : true,
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 1.5,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,0,1],
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });

}); //End document.ready


function toggle_lines(el) {
  g1.setVisibility(el.id, el.checked);  
}

function graph_range(season) {
  // Remember, months must be specified between 0 and 11
  if (season=='eruption') {
    new_range = [new Date(Date.UTC(2015,3,20)).valueOf(), new Date(Date.UTC(2015,3,28)).valueOf()];
  } else {
    new_range = [new Date(Date.UTC(2015,2,15)).valueOf(), new Date(Date.UTC(2015,4,24)).valueOf()];
  }
  //console.log(new_range);
  g1.updateOptions({dateWindow: new_range});
}

