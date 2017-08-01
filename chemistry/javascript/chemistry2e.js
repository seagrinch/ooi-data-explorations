var parameters = [
  {title:"Salinity"},
  {title:"Air Temperature (&deg;C)"},
  {title:"Sea Surface Temperature (&deg;C)"},
  {title:"Rain Rate (mm/hr)"},
];

var colors = ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"];

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart"), "data/chemistry2e.csv", {
    //title: 'Fluorometric Chlorophyll A Concentration',
    // xlabel
    ylabel: 'Salinity',
    y2label: 'Air Temperature (C)',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always',
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 250,
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : colors,
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    //logscale : true,
    showRangeSelector: true,
    //rangeSelectorPlotFillColor : "#00839C",
    //rangeSelectorPlotStrokeColor : "#008100",
    //animatedZooms : true,
    axes: {
    //   y: {valueRange: [0, null]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'Salinity': {axis: 'y', showInRangeSelector: true},
      'Air Temperature': {axis: 'y2'},
      'Sea Surface Temperature': {axis: 'y2'},
      'Rain Rate': {axis: 'y2'},
    },
    visibility: [1,1,0,0],
  });

}); //document.ready

function toggle_visibility(el) {
  g.setVisibility(parseInt(el.id), el.checked);
}

function toggle_radio(el) {
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  g.setVisibility(3, false);
  if (el.value) {
    g.setVisibility(parseInt(el.value), el.checked);
    g.updateOptions({
      y2label: parameters[el.value].title,
    })
    var cols = document.getElementsByClassName('dygraph-y2label');
    for(i=0; i<cols.length; i++) {
      cols[i].style.color = colors[el.value];
    }
  } else {
    g.updateOptions({
      y2label: '',
    })
  }
}
