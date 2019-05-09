$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/anoxia2017.csv", {
    title: 'hi there',
    ylabel: 'Dissolved Oxygen (mg/L)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 350,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : true,
    series: {
      'Dissolved Oxygen': { showInRangeSelector: true}
    },
    visibility: [1,0,0,0],
  });


/*
Highlight Region
underlayCallback: function(canvas, area, g) {
  var bottom_left = g.toDomCoords(highlight_start, -20);
  var top_right = g.toDomCoords(highlight_end, +20);

  var left = bottom_left[0];
  var right = top_right[0];

  canvas.fillStyle = "rgba(255, 255, 102, 1.0)";
  canvas.fillRect(left, area.y, right - left, area.h);
}
http://dygraphs.com/gallery/#g/highlighted-weekends
*/

  g2 = new Dygraph(document.getElementById("chart2"), "data/anoxia2017.csv", {
    ylabel: 'Seawater Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 350,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,1,0,0],
  });
  
    g3 = new Dygraph(document.getElementById("chart3"), "data/anoxia2017.csv", {
    ylabel: 'Northward Wind Speed (m/s)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 350,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,1,0],
  });
  


  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });

}); //document.ready

function toggle_visibility(el) {
  g1.setVisibility(parseInt(el.id)*2, el.checked);
  g1.setVisibility(parseInt(el.id)*2+1, el.checked);
  g2.setVisibility(parseInt(el.id), el.checked);
}
