/* CO2 Exchange - Invention #1 Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#DAA520","#1E90FF","#a64c85","#d3596d","#e57a4f","DBA53A","#2E8B57","#808000"] 

// time,
// CE02 pCO2 Atm,CE02 pCO2 Sea,CE02 CO2 Flux,CE02 SST,CE02 Sal,CE02 Wind,CE02 Chl,CE02 CDOM,
// CP01 pCO2 Atm,CP01 pCO2 Sea,CP01 CO2 Flux,CP01 SST,CP01 Sal,CP01 Wind,CP01 Chl,CP01 CDOM,
// CP03 pCO2 Atm,CP03 pCO2 Sea,CP03 CO2 Flux,CP03 SST,CP03 Sal,CP03 Wind,CP03 Chl,CP03 CDOM

var parameters = {
  'sst':"Sea Surface Temperature (&deg;C)",
  'salinity':"Salinity",
  'wind':'Wind Speed (m/s)',
  'chl':"Chlorophyll (µg/L)",
  'cdom':"CDOM (ppb)"
};

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
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/co2_data.csv", {
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
    visibility: [0,0,0,1,0,0,0,0, 0,0,0,0,0,0,0,0, 0,0,0,0,0,0,0,0],
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });
  
  // Setup default state
  $('#chart2').hide()
  $('#chart3').hide()
  $('#div_parameter').hide()

}); //document.ready


// Stepper code adapted from 
// http://arnicas.github.io/interactive-vis-course/Week12/stepper_buttons.html

var totalStages = 3;
var stage = 1;

function changeState(clicked) {
  if (clicked == "prev") {
    handlePrev();
  }
  if (clicked == "next") {
    handleNext();
  }
  updateButtonLook(stage, totalStages);
  goto_step(stage)
  //console.log("Step: ", stage);
} // end changeState


function handlePrev(button) {
  if (stage !== 0) {
    stage -= 1;
  }
}


function handleNext(button) {
  if (stage !== totalStages) {
    stage += 1;
  }
}


function updateButtonLook(stage, totalStages) {
  if (stage == totalStages) {
    $('#prev').removeClass("disabled");
    $('#next').addClass("disabled");
    return;
  }
  if (stage == 1) {
    $('#prev').addClass("disabled");
    $('#next').removeClass("disabled");
    return;
  }
  // otherwise, enable both:
  $('#prev').removeClass("disabled");
  $('#next').removeClass("disabled");
}
 
/* Interactive Script
1. Show PCO2 Air/Water (graph 1)
2. Show Flux (graph 2)
3. Show Temp/Sal/Wind/Chl (graph 3)
*/
function goto_step(step) {
  switch(step) {
    case 1: 
      $('#chart2').hide()
      $('#chart3').hide()
      $('#btext').text("This graph shows the partial pressure of CO2 in both the Atmosphere and Ocean.  Click the next button to see the resultant CO2 flux across the air-sea interface.")
      break;
    case 2: 
      $('#chart2').show(1000)
      $('#chart3').hide()
      $('#btext').text("The CO2 Flux shows the flow of CO2 from the Ocean to the Atmosphere.  Do you notice how the sign of the flux corresponds to the CO2 measurements in the first graph?  Click the next button when you're ready.")
      break;
    case 3: 
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#div_parameter').show(1000)
      $('#btext').text("Looking at these additional datasets, do you see any relationships between these graphs and the flux measurements?")
      //Reset selection when going backwards
      break;
  }
}


function toggle_lines() {
  parameter = $('input[name=parameter]:checked').val();

  g3.setVisibility(3, parameter=='sst');
  g3.setVisibility(4, parameter=='salinity');
  g3.setVisibility(5, parameter=='wind');
  g3.setVisibility(6, parameter=='chl');
  g3.setVisibility(7, parameter=='cdom');

  if (parameter) {
    g3.updateOptions({
      ylabel: parameters[parameter],
    })
  } else {
    g3.updateOptions({
      ylabel: '',
    })
  }

} // End toggle_lines

