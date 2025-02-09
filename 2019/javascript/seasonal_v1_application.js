/* Seasonal Variability In The Mixed Layer - Application Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ['#fdef9a','#dade97', '#b8ce93', '#95bd90', '#72ac8c', '#4d9b89', '#398785', '#377280', '#345d7b', '#314776', '#2e3172', '#2a186c',
'#000000','#000000','#32CD32','#7fc4fb','#ffd86d']

// Columns
// time,Model SST,30m,40m,60m,90m,130m,180m,250m,350m,500m,750m,1000m,
// met_relwind_speed,shortwave_irradiance,Chlorophyll a,Model Wind Speed,Model Irradiance


$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/seasonal_v1.csv", {
    title: 'Irminger Sea Flanking Mooring B',
    ylabel: 'Solar Irradiance (W/m^2)',
    y2label: 'Wind Speed (m/s)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    highlightCircleSize: 6,
    animatedZooms : true,
    visibility: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1],
    series: {
      'Model Irradiance': {axis: 'y', showInRangeSelector: true},
      'Model Wind Speed': {axis: 'y2'},
    },
    axes: {
      y2: {axisLabelWidth: 60}
    },
  });
  
  g2 = new Dygraph(document.getElementById("chart2"), "data/seasonal_v1.csv", {
    ylabel: 'Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : false,
    visibility: [1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0],
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/seasonal_v1.csv", {
    ylabel: 'Chlorophyll',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    rangeSelectorHeight: 30,
    animatedZooms : true,
    visibility: [0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0],
  });

  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready


function toggle_lines() {
  
  g2.setVisibility(0, $('#surface').is(':checked'));
  g2.setVisibility(1, $('#surface').is(':checked'));
  g2.setVisibility(2, $('#surface').is(':checked'));
  g2.setVisibility(3, $('#surface').is(':checked'));

  g2.setVisibility(4, $('#mid').is(':checked'));
  g2.setVisibility(5, $('#mid').is(':checked'));
  g2.setVisibility(6, $('#mid').is(':checked'));
  g2.setVisibility(7, $('#mid').is(':checked'));

  g2.setVisibility(8, $('#deep').is(':checked'));
  g2.setVisibility(9, $('#deep').is(':checked'));
  g2.setVisibility(10, $('#deep').is(':checked'));
  g2.setVisibility(11, $('#deep').is(':checked'));
  
} // End toggle_lines

