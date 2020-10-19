/* Seasonal Variability In The Mixed Layer - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ['#fdef9a','#dade97', '#b8ce93', '#95bd90', '#72ac8c', '#4d9b89', '#398785', '#377280', '#345d7b', '#314776', '#2e3172', '#2a186c',
'#7fc4fb','#ffd86d',
'#dddddd', '#c8c8c8', '#b3b3b3', '#9f9f9f', '#8b8b8b', '#787878', '#656565', '#535353', '#414141', '#313131', '#212121', '#111111',
'#999','#999',
'#dd0000','#0000dd','#32CD32']

// Datafile Columns
// time,GI Model SST,GI 30m,GI 40m,GI 60m,GI 90m,GI 130m,GI 180m,GI 250m,GI 350m,GI 500m,GI 750m,GI 1000m,
// GI Model Wind Speed,GI Model Irradiance,
// GP Model SST,GP 30m,GP 40m,GP 60m,GP 90m,GP 130m,GP 180m,GP 250m,GP 350m,GP 500m,GP 750m,GP 1000m,
// GP Model Wind Speed,GP Model Irradiance,
// GI MLD,GP MLD,GI chl

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/seasonal.csv", {
    title: 'Irminger Sea Flanking Mooring B',
    ylabel: 'Solar Irradiance (W/m^2)',
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
    visibility: [0,0,0,0,0,0,0,0,0,0,0,0, 0,1, 0,0,0,0,0,0,0,0,0,0,0,0, 0,0, 0,0,0],
    axes: {
      x: {axisLabelFormatter:function(){return ''}}
    }
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/seasonal.csv", {
    ylabel: 'Wind Speed (m/s)',
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
    visibility: [0,0,0,0,0,0,0,0,0,0,0,0, 1,0, 0,0,0,0,0,0,0,0,0,0,0,0, 0,0, 0,0,0],
    axes: {
      x: {axisLabelFormatter:function(){return ''}}
    }
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/seasonal.csv", {
    ylabel: 'Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsUTC : false,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : false,
    visibility: [1,1,1,1,0,0,0,0,0,0,0,0, 0,0, 0,0,0,0,0,0,0,0,0,0,0,0, 0,0, 0,0,0],
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready


function toggle_lines() {
  
  g3.setVisibility(0, $('#surface').is(':checked'));
  g3.setVisibility(1, $('#surface').is(':checked'));
  g3.setVisibility(2, $('#surface').is(':checked'));
  g3.setVisibility(3, $('#surface').is(':checked'));

  g3.setVisibility(4, $('#mid').is(':checked'));
  g3.setVisibility(5, $('#mid').is(':checked'));
  g3.setVisibility(6, $('#mid').is(':checked'));
  g3.setVisibility(7, $('#mid').is(':checked'));

  g3.setVisibility(8, $('#deep').is(':checked'));
  g3.setVisibility(9, $('#deep').is(':checked'));
  g3.setVisibility(10, $('#deep').is(':checked'));
  g3.setVisibility(11, $('#deep').is(':checked'));
  
} // End toggle_lines

