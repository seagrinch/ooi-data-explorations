/* Factors Affecting Proimary Production - Invention Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

var parameters = [
  {title:"Chlorophyll (ug/L)"},
  {title:"Water Temperature (&deg;C)"},
  {title:"Salinity (psu)"},
  {title:"Nitrate (uMol/L)"},
  {title:"Irradiance (uW cm-2 nm-1)"}
];

// colors = ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#000080","#DC143C","#800000"];
var colors = ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"];


$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/production_invention.csv", {
    title: 'Global Souther Ocean Surface Mooring',
    ylabel: 'Chlorophyll (ug/L)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : false,
    visibility: [1,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/production_invention.csv", {
    ylabel: 'Seawater Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,1,0,0,0,0,0],
  });
    
  var sync = Dygraph.synchronize(g1, g2, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready


function toggle_radio(el) {
  g2.setVisibility(1, false);
  g2.setVisibility(2, false);
  g2.setVisibility(3, false);
  g2.setVisibility(4, false);
  if (el.value) {
    g2.setVisibility(parseInt(el.value), el.checked);
    g2.updateOptions({
      ylabel: parameters[el.value].title,
    })
  } else {
    g2.updateOptions({
      ylabel: '',
    })
  }
}