/* Thermohaline Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#ffd86d","#DBA53A","#7fc4fb","#00457C",
"#ffd86d","#DBA53A","#7fc4fb","#00457C",
"#ffd86d","#DBA53A","#7fc4fb","#00457C",
"#800000","#800000"]; //"#000080","#DC143C"

// time, temp_30m,temp_90m,temp_350m,temp_1000m, 
// density_30m,density_90m,density_350m,density_1000m, 
// potential_density_30m,potential_density_90m,potential_density_350m,potential_density_1000m, 
// wind_speed,air_temp


$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/thermohaline.csv", {
    title: 'Irminger Sea Flanking Mooring B',
    ylabel: 'Temperature (°C)',
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
      'Dissolved Oxygen': { showInRangeSelector: true}
    },
    visibility: [1,0,0,0,0,0,0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/thermohaline.csv", {
    ylabel: 'Potential Density (kg/m^3)',
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
    visibility: [0,0,0,0,0,0,0,0,1,0,0,0,0,0],
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/thermohaline.csv", {
    title: 'ECMWF Model Winds',
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
    visibility: [0,0,0,0,0,0,0,0,0,0,0,0,1,0],
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready


function toggle_lines() {
  
  g1.setVisibility(0, $('#30m').is(':checked'));
  g1.setVisibility(1, $('#90m').is(':checked'));
  g1.setVisibility(2, $('#350m').is(':checked'));
  g1.setVisibility(3, $('#1000m').is(':checked'));
  
  density = $('input[name=density]:checked').val();
  if (density=='den') {
    g2.setVisibility({8:0,9:0,10:0,11:0});
    g2.setVisibility(4, $('#30m').is(':checked'));
    g2.setVisibility(5, $('#90m').is(':checked'));
    g2.setVisibility(6, $('#350m').is(':checked'));
    g2.setVisibility(7, $('#1000m').is(':checked'));
    g2.updateOptions({
      ylabel: 'Density (kg/m^3)',
    })
  } else {
    g2.setVisibility({4:0,5:0,6:0,7:0});
    g2.setVisibility(8, $('#30m').is(':checked'));
    g2.setVisibility(9, $('#90m').is(':checked'));
    g2.setVisibility(10, $('#350m').is(':checked'));
    g2.setVisibility(11, $('#1000m').is(':checked'));    
    g2.updateOptions({
      ylabel: 'Potential Density (kg/m^3)',
    })
  }

} // End toggle_lines

function toggle_air(el) {
  g1.setVisibility(13, $('#air').is(':checked'));
} // End toggle_air
