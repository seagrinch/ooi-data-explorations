/* Ocean Acidification - Application Widgets
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#000080","#DC143C","#800000"];

//time,pH,pCO2 Air,pCO2 Seawater,Seawater Temperature,Salinity,East Winds,North Winds,Air Temperature,Surface Temperature,Surface Salinity

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/acidification.csv", {
    title: 'Oregon Shelf Surface Mooring - pH from 7m',
    ylabel: 'pH',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : false,
    series: {
      'pH': { showInRangeSelector: true}
    },
    visibility: [1,0,0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/acidification.csv", {
    ylabel: 'pCO<sub>2</sub> (µatm)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : false,
    visibility: [0,0,1,0,0,0,0,0,0,0],
  });

  g3 = new Dygraph(document.getElementById("chart3"), "data/acidification.csv", {
    title: 'Oregon Inshore Surface Mooring - CTD at 25m depth',
    ylabel: 'Seawater Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,0,1,0,0,0,0,0,0],
  });
  
  g4 = new Dygraph(document.getElementById("chart4"), "data/acidification.csv", {
    title: 'Oregon Shelf Surface Mooring',
    ylabel: 'Northward Wind Speed (m/s)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,0,0,0,0,1,0,0,0],
    underlayCallback: function(canvas, area, g) { fill_rect(canvas, area, g) },
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, g4, {
    selection: true,
    zoom: true,
    range: false
  });
  
  var fill_rect = function(canvas, area, g) {
    canvas.fillStyle = "rgba(25,25,25,.2)"; //Grey
    canvas.fillRect(area.x, 0, area.w, g.toDomYCoord(0));
  }

}); //document.ready
