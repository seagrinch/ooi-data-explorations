var parameters = {
  'salinity':"Salinity",
  'airtemp':"Air Temperature (&deg;C)",
  'sst':"Sea Surface Temperature (&deg;C)",
  'rain':"Precipitation (mm)",
};

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart"), "data/salinity_application.csv", {
    title: 'Coastal Endurance Array - Oregon Shelf Surface Mooring',
    ylabel: 'Salinity',
    y2label: 'Air Temperature (C)',
    legend: 'always',
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 250,
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : ["#00457C","#00457C","#00457C","#00457C","#DBA53A","#DBA53A","#DBA53A","#DBA53A","#008100","#008100","#008100","#008100"],
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    visibility: [1,0,0,0,1,0,0,0,1,0,0,0],
  });

}); //End document.ready


function toggle_lines() {
  parameter = $('#parameter').val();
  g.setVisibility(0, parameter=='salinity' && $('#CE').is(':checked'));
  g.setVisibility(1, parameter=='airtemp' && $('#CE').is(':checked'));
  g.setVisibility(2, parameter=='sst' && $('#CE').is(':checked'));
  g.setVisibility(3, parameter=='rain' && $('#CE').is(':checked'));
  g.setVisibility(4, parameter=='salinity' && $('#CP').is(':checked'));
  g.setVisibility(5, parameter=='airtemp' && $('#CP').is(':checked'));
  g.setVisibility(6, parameter=='sst' && $('#CP').is(':checked'));
  g.setVisibility(7, parameter=='rain' && $('#CP').is(':checked'));
  g.setVisibility(8, parameter=='salinity' && $('#GI').is(':checked'));
  g.setVisibility(9, parameter=='airtemp' && $('#GI').is(':checked'));
  g.setVisibility(10, parameter=='sst' && $('#GI').is(':checked'));
  g.setVisibility(11, parameter=='rain' && $('#GI').is(':checked'));
  g.updateOptions({
    ylabel: parameters[parameter],
  })
} // End toggle_lines
