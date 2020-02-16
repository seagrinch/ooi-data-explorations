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

/*
var colors = {
  'salinity':"#00457C",
  'airtemp':"#DBA53A",
  'sst':"#008100",
  'rain':"#00839C",
};
*/

$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/co2_exploration.csv", {
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
    visibility: [1,1,0,0,0,0,0,0,0,0,0,0],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/co2_exploration.csv", {
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
    visibility: [0,0,1,0,0,0,0,0,0,0,0,0],
  });
  
  g3 = new Dygraph(document.getElementById("chart3"), "data/co2_exploration.csv", {
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
    visibility: [0,0,0,1,0,0,0,0,0,0,0,0],
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

var totalStages = 5;
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
3. Add bars to flux graph
4. Show Temp/Sal/Wind/Chl (graph 3)
5. Allow toggle between CE and CP
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
      g2.updateOptions({underlayCallback: null})
      $('#btext').text("The CO2 Flux shows the flow of CO2 from the Ocean to the Atmosphere.  Do you notice how the sign of the flux corresponds to the CO2 measurements in the first graph?  Click the next button when you're ready.")
      break;
    case 3: 
      $('#chart2').show(1000)
      $('#chart3').hide()
      g2.updateOptions({underlayCallback: function(canvas, area, g) {
        fill_rects(canvas, area, g)
      }})
      $('#div_parameter').hide(1000)
      $('#div_mooring').hide(1000)
      $('#btext').text("Here we've highlighted the periods of positive and negative flux, to make them clearer.  Click the next button when you're ready to take a look at some addiitonal datasets.")
      break;
    case 4: 
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      g2.updateOptions({underlayCallback: null})
      $('#div_parameter').show(1000)
      $('#div_mooring').hide(1000)
      $('#btext').text("Looking at these additional datasets, do you see any relationships between these graphs and the flux measurements?  When you're ready to look at another dataset, click the next button.")
      //Reset selection when going backwards
      $('input[name=mooring][value="CE"]').prop('checked', true); 
      toggle_lines();
      break;
    case 5: 
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#div_parameter').show(1000)
      $('#div_mooring').show(1000)
      $('#btext').text("Now you can check out the same measurements from another site in the Mid-Atlantic. How does this site compare with what you found for the Washington site?")
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
  highlight_period(new Date('2018-03-28T00:00'), new Date('2018-12-17T00:00'))
  highlight_period(new Date('2019-01-06T00:00'), new Date('2019-04-24T00:00'))
  canvas.fillStyle = "rgba(128, 128, 255, 0.3)";
  highlight_period(new Date('2018-12-17T00:00'), new Date('2019-01-06T00:00'))
}


function toggle_lines() {
  parameter = $('input[name=parameter]:checked').val();
  mooring = $('input[name=mooring]:checked').val(); 
  g1.setVisibility(0, mooring=='CE');
  g1.setVisibility(1, mooring=='CE');
  g1.setVisibility(6, mooring=='CP');
  g1.setVisibility(7, mooring=='CP');
  
  g2.setVisibility(2, mooring=='CE');
  g2.setVisibility(8, mooring=='CP');  
  
  g3.setVisibility(3, parameter=='sst' && mooring=='CE');
  g3.setVisibility(4, parameter=='salinity' && mooring=='CE');
  g3.setVisibility(5, parameter=='wind' && mooring=='CE');
  
  g3.setVisibility(9, parameter=='sst' && mooring=='CP');
  g3.setVisibility(10, parameter=='salinity' && mooring=='CP');
  g3.setVisibility(11, parameter=='wind' && mooring=='CP');
  
  if (mooring=='CE') {
    g1.updateOptions({title:'Washington Shelf Surface Mooring'});
  } else if (mooring=='CP') {
    g1.updateOptions({title:'Pioneer Inshore Surface Mooring'});    
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

