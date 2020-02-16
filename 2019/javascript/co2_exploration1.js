/* CO2 Exchange - Exploration #1 Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#DAA520","#1E90FF","#a64c85","#d3596d","#e57a4f","DBA53A","#2E8B57","#808000"]

// time,
// CE02 pCO2 Atm,CE02 pCO2 Sea,CE02 CO2 Flux,CE02 SST,CE02 Sal,CE02 Wind,CE02 Chl,CE02 CDOM,
// CP01 pCO2 Atm,CP01 pCO2 Sea,CP01 CO2 Flux,CP01 SST,CP01 Sal,CP01 Wind,CP01 Chl,CP01 CDOM,
// CP03 pCO2 Atm,CP03 pCO2 Sea,CP03 CO2 Flux,CP03 SST,CP03 Sal,CP03 Wind,CP03 Chl,CP03 CDOM

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/co2_data.csv", {
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
    visibility: [1,1,0,0,0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/co2_data.csv", {
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
    visibility: [0,0,1,0,0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0],
  });
    
  var sync = Dygraph.synchronize(g1, g2, {
    selection: true,
    zoom: true,
    range: false
  });
  
}); //document.ready
