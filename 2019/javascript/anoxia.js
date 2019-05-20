$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/anoxia2017.csv", {
    title: 'Oregon Inshore Surface Mooring - 25m',
    ylabel: 'Dissolved Oxygen (mg/L)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 350,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : true,
    series: {
      'Dissolved Oxygen': { showInRangeSelector: true}
    },
    visibility: [1,0,0,0],
  });


/*
Highlight Region
underlayCallback: function(canvas, area, g) {
  var bottom_left = g.toDomCoords(highlight_start, -20);
  var top_right = g.toDomCoords(highlight_end, +20);

  var left = bottom_left[0];
  var right = top_right[0];

  canvas.fillStyle = "rgba(255, 255, 102, 1.0)";
  canvas.fillRect(left, area.y, right - left, area.h);
}
http://dygraphs.com/gallery/#g/highlighted-weekends
*/

  g2 = new Dygraph(document.getElementById("chart2"), "data/anoxia2017.csv", {
    ylabel: 'Seawater Temperature (°C)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 350,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,1,0,0],
  });
  
    g3 = new Dygraph(document.getElementById("chart3"), "data/anoxia2017.csv", {
    title: 'Oregon Shelf Surface Mooring',
    ylabel: 'Northward Wind Speed (m/s)',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 350,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    visibility: [0,0,1,0],
    underlayCallback: function(canvas, area, g) {
      canvas.fillStyle = "rgba(255, 255, 102, 1.0)";
      function highlight_period(x_start, x_end) {
        var canvas_left_x = g3.toDomXCoord(x_start);
        var canvas_right_x = g3.toDomXCoord(x_end);
        var canvas_width = canvas_right_x - canvas_left_x;
        canvas.fillRect(canvas_left_x, area.y, canvas_width, area.h);
      }
    }
  });
  
  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });

  $('#chart2').hide()
  $('#chart3').hide()

}); //document.ready

/*
function toggle_visibility(el) {
  g1.setVisibility(parseInt(el.id)*2, el.checked);
  g1.setVisibility(parseInt(el.id)*2+1, el.checked);
  g2.setVisibility(parseInt(el.id), el.checked);
}
*/


            
function goto_step(step) {
  switch(step) {
    case 0:
      $('#chart2').hide()
      $('#chart3').hide()
      $('#btext').text('When you\'re ready to add a new dataset, click the Next button.')
      break;
    case 1:
      $('#chart2').show(1000)
      $('#chart3').hide()
      $('#btext').text('Next, we\'ll add wind speeds.')
      break;
    case 2:
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#btext').text('Do you notice any correlations during periods of N or S winds?')
      break;
    case 3:
      $('#chart2').show(1000)
      $('#chart3').show(1000)
      $('#btext').text('Notice what happens to the over variables during the periods of N or S winds.')
      break;
  }
}

// Code adapted from http://arnicas.github.io/interactive-vis-course/Week12/stepper_buttons.html

var totalStages = 3;
var stage = 0;

function changeState(clicked) {
  console.log("clicked", stage);
  //var clicked = d3.select(this).attr("id");
  //var buttonClicked = this;
  if (clicked == "prev") {
    handlePrev();
  }
  if (clicked == "next") {
    handleNext();
  }
  updateButtonLook(stage, totalStages);
  //showText(stage);
  //handleChart(stage);
  goto_step(stage)
  console.log(stage);
} // end changeState


function updateButtonLook(stage, totalStages) {
  if (stage == totalStages) {
    $('#prev').removeClass("disabled");
    $('#next').addClass("disabled");
    return;
  }
  if (stage == 0) {
    $('#prev').addClass("disabled");
    $('#next').removeClass("disabled");
    return;
  }
  // otherwise, enable both:
  $('#prev').removeClass("disabled");
  $('#next').removeClass("disabled");
  //d3.selectAll("a.button").classed("disabled", null);
}

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

//d3.selectAll(".button").on("click", changeState);

function showText(stage) {
  d3.selectAll("#text p").classed("hidden", true);
  d3.select("p#stage" + stage).classed("hidden", null);
}

var chart;

function handleChart(stage) {

  // the chart is on stage 1 and 2.
  // this turns into a mess pretty fast, in order to handle backwards presses.
  // it's better to call functions, and maybe do a switch statement.
  // this could definitely be better.

  if (stage == 0 || stage == 3) {
    d3.select("svg").remove(); // if it doesn't exist, no problem.
    chart = null; // reset to null
  }
  if (!chart && stage == 1) {
    // make the chart; no circle yet.
    chart = d3.select("#chart").append("svg").attr("width", 300).attr("height",300);
  }
  if (chart && stage == 1) {
    chart.select("circle").remove(); // if it's not there, no problem.
  }
  if (chart && stage == 2) {
    chart.append("circle").attr("cx", 20).attr("cy", 50).attr("r", 20);
  }
  if (!chart && stage == 2) {
    // no chart, must be going in reverse, have to make it first.
    chart = d3.select("#chart").append("svg").attr("width", 300).attr("height",300);
    chart.append("circle").attr("cx", 20).attr("cy", 50).attr("r", 20);
  }

}

