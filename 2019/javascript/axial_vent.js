/* Axial Vents Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/axial_vent.csv", {
    title: 'Axial Seamount',
    ylabel: 'Earthquakes per day',
    y2label: 'Avgerage Magnitude',
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
    visibility: [0,0,0,1,1],
    series: {
      'Eq Magnitude': {axis: 'y2'}
    }
  });
  
  g2 = new Dygraph(document.getElementById("chart2"), "data/axial_vent.csv", {
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
    visibility: [1,1,1,0,0],
  });
    
  var sync = Dygraph.synchronize(g1, g2, {
    selection: true,
    zoom: true,
    range: false
  });

}); //document.ready


