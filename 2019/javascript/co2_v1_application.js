/* CO2 Exchange - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#00457C","#664a8c","#a64c85","#d3596d","#e57a4f","DBA53A"]

var parameters = {
  'sst':"Sea Surface Temperature (&deg;C)",
  'salinity':"Salinity",
  'wind':'Wind Speed (m/s)',
  'chl':"Chlorophyll (?)",
};

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/co2_application.csv", {
    title: 'Washington Shelf Surface Mooring',
    ylabel: 'pCO2 (µatm)',
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
    series: {
      'Dissolved Oxygen': { showInRangeSelector: true}
    },
    visibility: [1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/co2_application.csv", {
    ylabel: 'CO2 Flux from Ocean (mmol m-2 s-1)',
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
    visibility: [0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
  });
    
  var sync = Dygraph.synchronize(g1, g2, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready


function toggle_lines() {
  mooring = $('input[name=mooring]:checked').val(); 

  g1.setVisibility(0, mooring=='CE');
  g1.setVisibility(1, mooring=='CE');
  g1.setVisibility(6, mooring=='CP');
  g1.setVisibility(7, mooring=='CP');
  g1.setVisibility(12, mooring=='mystery');
  g1.setVisibility(13, mooring=='mystery');
  
  g2.setVisibility(2, mooring=='CE');
  g2.setVisibility(8, mooring=='CP');  
  g2.setVisibility(14, mooring=='mystery');
    
  if (mooring=='CE') {
    g1.updateOptions({title:'Washington Shelf Surface Mooring'});
  } else if (mooring=='CP') {
    g1.updateOptions({title:'Pioneer Inshore Surface Mooring'});
  } else if (mooring=='mystery') {
    g1.updateOptions({title:'Mystery Site'});
  }

} // End toggle_lines

