/* Ocean Acidification - Exploration Widgets
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

colors = ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#000080","#DC143C","#800000"];

//time,pH,pCO2 Air,pCO2 Seawater,Seawater Temperature,Salinity,East Winds,North Winds,Air Temperature,Surface Temperature,Surface Salinity

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/acidification_exp.csv", {
    title: 'Oregon Shelf Surface Mooring - pH from 7m',
    ylabel: 'pH',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : false,
    series: {
      'pH': { showInRangeSelector: true}
    },
    visibility: [1,0,0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/acidification_exp.csv", {
    ylabel: 'pCO<sub>2</sub> (µatm)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : false,
    visibility: [0,0,1,0,0,0,0,0,0,0],
  });

  g3 = new Dygraph(document.getElementById("chart3"), "data/acidification_exp.csv", {
    title: 'Oregon Inshore Surface Mooring',
    ylabel: 'Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,0,1,0,0,0,0,0,0],
  });
  
  g4 = new Dygraph(document.getElementById("chart4"), "data/acidification_exp.csv", {
    title: 'Oregon Shelf Surface Mooring',
    ylabel: 'Northward Wind Speed (m/s)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : colors, 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,0,0,0,0,1,0,0,0],
  });
    
  var sync = Dygraph.synchronize(g1, g2, g3, g4, {
    selection: true,
    zoom: true,
    range: false
  });
  
  // Setup default state
  $('#chart2').hide()
  $('#chart3').hide()
  $('#chart4').hide()

}); //document.ready


// Stepper code adapted from 
// http://arnicas.github.io/interactive-vis-course/Week12/stepper_buttons.html

var totalStages = 6;
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
1. pH
2. pCO2
3. Temperature
4. Winds
5. Bars on winds
6. Bars on all graphs 
*/
function goto_step(step) {
  switch(step) {
    case 1: // Just pH
      $('#chart2').hide()
      $('#chart3').hide()
      $('#chart4').hide()
      $('#btext').text("This pH data is from the subsurface (at 7m) at this location. Click next to add another dataset.")
      break;
    case 2: // Add pCO2 (2 graphs)
      $('#chart2').show(1000)
      $('#chart3').hide()
      $('#chart4').hide()
      $('#btext').html("Here is the seawater pCO<sub>2</sub> concentration at this mooring. Click the next button when you're ready to take a look at another dataset.")
      break;
    case 3: // Add Temp (3 graphs)
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#chart4').hide()
      $('#btext').text("Here is a graph of the temperature from a nearby mooring. Click next to see the wind speed.")
      break;
    case 4: // Add Winds (all 4 graphs)
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#chart4').show(1000)
      $('#btext').text("This graph shows when winds blow to the North (Northward) or South (Southward).  Do you notice any relationship between the wind direction and seawater temperature? Click the next button when you're ready.")
      break;
    case 5: // Show wind boxes on just wind graph
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#chart4').show(1000)
      g1.updateOptions({underlayCallback: null})
      g2.updateOptions({underlayCallback: null})
      g3.updateOptions({underlayCallback: null})
      g4.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      $('#btext').text("Now we've highlighted the periods of Northward and Southward winds, to make the change in winds clearer.")
      break;
    case 6: // Show wind boxes on all graphs
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#chart4').show(1000)
      g1.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      g2.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      g3.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      g4.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      $('#btext').text("Finally, we've highlighted the periods of Northward and Southward winds on all of the graphs. Take a look again at the other variables to see how they change during the periods of N or S winds. What relationships do you see?")
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
  
  //canvas.fillStyle = "rgba(128, 128, 255, 0.3)"; //Blue
  canvas.fillStyle = "rgba(225,225,225,.3)"; //White
  highlight_period(new Date('2017-05-25T00:00'), new Date('2017-05-27T11:00')) 
  highlight_period(new Date('2017-05-27T20:00'), new Date('2017-05-28T02:00')) 
  highlight_period(new Date('2017-05-28T22:00'), new Date('2017-05-30T18:00')) 
  highlight_period(new Date('2017-05-31T00:00'), new Date('2017-05-31T07:00')) 
  highlight_period(new Date('2017-06-02T20:00'), new Date('2017-06-07T04:00')) 
  highlight_period(new Date('2017-06-11T02:00'), new Date('2017-06-13T20:00')) 
  highlight_period(new Date('2017-06-17T04:00'), new Date('2017-06-17T21:00')) 
  highlight_period(new Date('2017-06-18T19:00'), new Date('2017-06-25T00:00')) 

  //canvas.fillStyle = "rgba(244, 138, 160, 0.3)"; //Red
  canvas.fillStyle = "rgba(25,25,25,.3)"; //Grey
  highlight_period(new Date('2017-05-27T11:00'), new Date('2017-05-27T20:00'))
  highlight_period(new Date('2017-05-28T02:00'), new Date('2017-05-28T22:00')) 
  highlight_period(new Date('2017-05-30T18:00'), new Date('2017-05-31T00:00')) 
  highlight_period(new Date('2017-05-31T07:00'), new Date('2017-06-02T20:00')) 
  highlight_period(new Date('2017-06-07T04:00'), new Date('2017-06-11T02:00')) 
  highlight_period(new Date('2017-06-13T20:00'), new Date('2017-06-17T04:00')) 
  highlight_period(new Date('2017-06-17T21:00'), new Date('2017-06-18T19:00')) 
  
}
