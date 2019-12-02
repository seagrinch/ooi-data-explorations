/* Dynamic Air-Sea Interactions - Applicaiton #1
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/airsea.csv", {
    title: 'Coastal Pioneer Array - Central Surface Mooring',
    ylabel: 'Max Wave Height (m) ',
    y2label: 'Peak Wave Period (s)',
    labelsSeparateLines: true,
    labelsUTC : false,
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    axes: {
      y2: {axisLabelWidth: 70}
    },
    animatedZooms : false,
    series: {
      'Max Wave Height': {axis: 'y', color:'#00457C', showInRangeSelector: true},
      'Peak Wave Period': {axis: 'y2', color:'#DBA53A'},
    },
    visibility: [1,1,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/airsea.csv", {
    ylabel: 'Wind Speed (m/s)',
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : ['#008100'], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,1,0,0,0,0],
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/airsea.csv", {
    ylabel: 'Current Speed (m/s)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : false,
    colors : ['#00839C'], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,0,1,0,0,0],
  });
    
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });
  
  // Setup default state
  $('#chart2').hide()
  $('#chart3').hide()

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
1. Waves
2. Winds
3. Currents
*/
function goto_step(step) {
  switch(step) {
    case 1: // Waves
      $('#chart2').hide()
      $('#chart3').hide()
      $('#btext').text("Click the Next button to add wind speed data to the visualization.")
      break;
    case 2: // Winds
      $('#chart2').show(1000)
      $('#chart3').hide()
      $('#btext').text("Click the Next button to add current speed data to the visualization.")
      break;
    case 3: // Show all 3 graphs
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#btext').text("Now consider the questions below before moving on to the Application stage of this activity.")
      break;
  }
}
