/* Anoxic Events Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#000080","#DC143C","#800000"];

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/anoxia2017b.csv", {
    title: 'Oregon Inshore Surface Mooring - 25m',
    ylabel: 'Dissolved Oxygen (mg/L)',
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
    visibility: [1,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/anoxia2017b.csv", {
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
    visibility: [0,1,0,0,0,0,0],
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/anoxia2017b.csv", {
    title: 'Oregon Shelf Surface Mooring',
    ylabel: 'Northward Wind Speed (m/s)',
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
    visibility: [0,0,1,0,0,0,0],
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

var totalStages = 7;
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
1. DO
2. Show 2 mg/L
3. Temperature
4. Winds
5. N/S Winds as Red/Blue
6. Bars on winds, line back to black?
7. Bars on all graphs 
*/
function goto_step(step) {
  switch(step) {
    case 1: // Just DO
      g1.setVisibility(6, false)
      $('#chart2').hide()
      $('#chart3').hide()
      g3.setVisibility(2,true)
      g3.setVisibility(4,false)
      g3.setVisibility(5,false)
      $('#btext').text("Hypoxia occurs when DO values decrease below 2mg/L.  Click the next button to show this threshold.")
      break;
    case 2: // DO with 2mg/L line
      g1.setVisibility(6, true)
      $('#chart2').hide()
      $('#chart3').hide()
      g3.setVisibility(2,true)
      g3.setVisibility(4,false)
      g3.setVisibility(5,false)
      $('#btext').text("Let's take a look at another dataset.  Click the next button when you're ready.")
      break;
    case 3: // DO and temp
      g1.setVisibility(6, true)
      $('#chart2').show(1000)
      $('#chart3').hide()
      g3.setVisibility(2,true)
      g3.setVisibility(4,false)
      g3.setVisibility(5,false)
      $('#btext').text("Here is the seawater temperature. Next, we'll add the wind speeds from a nearby buoy.")
      break;
    case 4: // Show all 3 graphs
      g1.setVisibility(6, true)
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      g3.setVisibility(2,true)
      g3.setVisibility(4,false)
      g3.setVisibility(5,false)
      $('#btext').text("Do you notice any correlations with DO and temperature during periods of North (N) or South (S) winds? Click the next button when you're ready")
      break;
    case 5: // Show N/S winds
      g1.setVisibility(6, true)
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      g3.setVisibility(2,false)
      g3.setVisibility(4,true)
      g3.setVisibility(5,true)
      g1.updateOptions({underlayCallback: null})
      g2.updateOptions({underlayCallback: null})
      g3.updateOptions({underlayCallback: null})
      $('#btext').text("Here we've highlighted the periods of N winds in red and S winds in blue.  Take a look again at the other to see how they correspond during periods of N or S winds.")
      break;
    case 6: // Show wind boxes on just wind graph
      g1.setVisibility(6, true)
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      g3.setVisibility(2,false)
      g3.setVisibility(4,true)
      g3.setVisibility(5,true)
      g1.updateOptions({underlayCallback: null})
      g2.updateOptions({underlayCallback: null})
      g3.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      $('#btext').text("Lets graph the wind data a bit differently. Instead of coloring the N and S winds, let's highlight the different time periods.")
      break;
    case 7: // Show wind boxes on all graphs
      g1.setVisibility(6, true)
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      g3.setVisibility(2,false)
      g3.setVisibility(4,true)
      g3.setVisibility(5,true)
      g1.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      g2.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      g3.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      $('#btext').text("Now we've highligghted the periods of N and S winds on all of the graphs. What happens to the over variables during the periods of N or S winds?")
      break;
  }
}

var fill_rects = function(canvas, area, g) {
  function highlight_period(x_start, x_end) {
    var canvas_left_x = g.toDomXCoord(x_start);
    var canvas_right_x = g.toDomXCoord(x_end);
    var canvas_width = canvas_right_x - canvas_left_x;
    canvas.fillRect(canvas_left_x, area.y, canvas_width, area.h);
  }
  canvas.fillStyle = "rgba(244, 138, 160, 0.3)";
  highlight_period(new Date('2017-05-25T04:00'), new Date('2017-05-27T15:00'))
  highlight_period(new Date('2017-05-28T00:00'), new Date('2017-05-28T06:00'))
  highlight_period(new Date('2017-05-29T03:00'), new Date('2017-05-30T22:00'))
  highlight_period(new Date('2017-05-31T04:00'), new Date('2017-05-31T11:00'))
  highlight_period(new Date('2017-06-03T01:00'), new Date('2017-06-07T08:00'))
  highlight_period(new Date('2017-06-11T06:00'), new Date('2017-06-13T10:00'))
  highlight_period(new Date('2017-06-17T09:00'), new Date('2017-06-17T19:00'))
  highlight_period(new Date('2017-06-18T23:00'), new Date('2017-06-25T03:00'))
  canvas.fillStyle = "rgba(128, 128, 255, 0.3)";
  highlight_period(new Date('2017-05-27T15:00'), new Date('2017-05-28T00:00'))
  highlight_period(new Date('2017-05-28T06:00'), new Date('2017-05-29T03:00'))
  highlight_period(new Date('2017-05-30T22:00'), new Date('2017-05-31T04:00'))
  highlight_period(new Date('2017-05-31T11:00'), new Date('2017-06-03T01:00'))
  highlight_period(new Date('2017-06-07T08:00'), new Date('2017-06-11T06:00'))
  highlight_period(new Date('2017-06-13T10:00'), new Date('2017-06-17T09:00'))
  highlight_period(new Date('2017-06-17T19:00'), new Date('2017-06-18T23:00'))
}
