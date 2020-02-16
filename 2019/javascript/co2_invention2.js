/* CO2 Exchange - Invention #2 Widget
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
  $('#div_mooring').hide()

}); //document.ready


// Stepper code adapted from 
// http://arnicas.github.io/interactive-vis-course/Week12/stepper_buttons.html

var totalStages = 4;
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
4. Allow toggle between CE and CP
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
      $('#div_mooring').hide(1000)
      $('#btext').text("Looking at these additional datasets, do you see any relationships between these graphs and the flux measurements?  When you're ready to look at another dataset, click the next button.")
      break;
    case 4: 
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#div_parameter').show(1000)
      $('#div_mooring').show(1000)
      $('#btext').text("Now you can check out the same measurements from another site in the Mid-Atlantic. How does this site compare with what you found for the Washington site?")
      break;
  }
}


function toggle_lines() {
  parameter = $('input[name=parameter]:checked').val();
  mooring = $('input[name=mooring]:checked').val();

  g1.setVisibility(0, mooring=='CE03');
  g1.setVisibility(1, mooring=='CE03');
  g2.setVisibility(2, mooring=='CE03');
  g3.setVisibility(3, parameter=='sst' && mooring=='CE03');
  g3.setVisibility(4, parameter=='salinity' && mooring=='CE03');
  g3.setVisibility(5, parameter=='wind' && mooring=='CE03');
  g3.setVisibility(6, parameter=='chl' && mooring=='CE03');
  g3.setVisibility(7, parameter=='cdom' && mooring=='CE03');

  g1.setVisibility(8, mooring=='CP01');
  g1.setVisibility(9, mooring=='CP01');
  g2.setVisibility(10, mooring=='CP01');  
  g3.setVisibility(11, parameter=='sst' && mooring=='CP01');
  g3.setVisibility(12, parameter=='salinity' && mooring=='CP01');
  g3.setVisibility(13, parameter=='wind' && mooring=='CP01');
  g3.setVisibility(14, parameter=='chl' && mooring=='CP01');
  g3.setVisibility(15, parameter=='cdom' && mooring=='CP01');

  g1.setVisibility(16, mooring=='mystery');
  g1.setVisibility(17, mooring=='mystery');  
  g2.setVisibility(18, mooring=='mystery');
  g3.setVisibility(19, parameter=='sst' && mooring=='mystery');
  g3.setVisibility(20, parameter=='salinity' && mooring=='mystery');
  g3.setVisibility(21, parameter=='wind' && mooring=='mystery');
  g3.setVisibility(22, parameter=='chl' && mooring=='mystery');
  g3.setVisibility(23, parameter=='cdom' && mooring=='mystery');
  
  if (mooring=='CE02') {
    g1.updateOptions({title:'Washington Shelf Surface Mooring'});
  } else if (mooring=='CP01') {
    g1.updateOptions({title:'Pioneer Central Profiler'});
  } else if (mooring=='mystery') {
    g1.updateOptions({title:'Mystery Site'});
  }

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

