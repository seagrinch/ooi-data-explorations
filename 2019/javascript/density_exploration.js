/* Drivers of Density - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

//Columns
// 0-3 GP Salinity,GP Temperature,GP Pressure,GP Density,
// 4-7 CE06 Salinity,CE06 Temperature,CE06 Pressure,CE06 Density,
// 8-11 CP04 Salinity,CP04 Temperature,CP04 Pressure,CP04 Density,
// 12-15 GI Salinity,GI Temperature,GI Pressure,GI Density,
// 16-27 GP DenCS,GP DenCT,GP DenCTS,CE06 DenCS,CE06 DenCT,CE06 DenCTS,CP04 DenCS,CP04 DenCT,CP04 DenCTS,GI DenCS,GI DenCT,GI DenCTS,
// 28-35 GP MeanS,GP MeanT,CE06 MeanS,CE06 MeanT,CP04 MeanS,CP04 MeanT,GI MeanS,GI MeanT,

colors = ['#3c3c3c','#3c3c3c','#000000','#3c3c3c',
'#3c3c3c','#3c3c3c','#000000','#3c3c3c',
'#3c3c3c','#3c3c3c','#000000','#3c3c3c',
'#3c3c3c','#3c3c3c','#000000','#3c3c3c',
'#4169E1','#B22222','#9932CC','#4169E1','#B22222','#9932CC','#4169E1','#B22222','#9932CC','#4169E1','#B22222','#9932CC',
'#4169E1','#B22222','#4169E1','#B22222','#4169E1','#B22222','#4169E1','#B22222']

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/density2.csv", {
    //title: 'Irminger Sea Flanking Mooring B',
    ylabel: 'Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    showRangeSelector: false,
    highlightCircleSize: 6,
    animatedZooms : true,
    visibility: [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/density2.csv", {
    ylabel: 'Salinity (psu)',
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
    visibility: [1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0],
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/density2.csv", {
    ylabel: 'Density (kg/m^3)',
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
    visibility: [0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0],
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready


function toggle_lines() {
  g1.setVisibility(29, $('#constantT').is(':checked'));
  g2.setVisibility(28, $('#constantS').is(':checked'));
  // Both Constant T and S checked
  g3.setVisibility(18, $('#constantT').is(':checked') && $('#constantS').is(':checked'));
  // Only Constant T checked
  g3.setVisibility(17, $('#constantT').is(':checked') && !$('#constantS').is(':checked'));
  // Only Constant S checked
  g3.setVisibility(16, !$('#constantT').is(':checked') && $('#constantS').is(':checked'));
} // End toggle_lines
