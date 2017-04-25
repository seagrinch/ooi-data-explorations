var parameters = [
  {id:'fluorometric_chlorophyll_a', title:"Chlorophyll-a Concentration", units:"&micro;g/L"},
  {id:'fluorometric_cdom', title:"Colored Dissolved Organic Matter Concentration", units:"ppb"},
  {id:'flort_dj_dcl_bback_total', title:"Optical Backscatter", units:"1/m"},
  {id: 'temp', title:"Temperature", units:"&deg;C"},
  {id: 'temp', title:"Salinity", units:"ppt"}
];

var colors = ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"];

$(document).ready(function () {

g = new Dygraph(document.getElementById("chart"), "data/productivity1.csv", {
  //title: 'Fluorometric Chlorophyll A Concentration',
  // xlabel
  ylabel: 'Chlorophyll-a Concentration (&micro;g/L)',
  y2label: 'CDOM Concentration (ppb)',
  //labels : ["Date","Endurance","Pioneer"],
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 600,
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
    y: {valueRange: [0, null]},
    y2: {axisLabelWidth: 70}
  },
  series: {
    'Chlorophyll-a': {axis: 'y', showInRangeSelector: true},
    'CDOM': {axis: 'y2'},
    'OBS': {axis: 'y2'},
    'Temperature': {axis: 'y2'},
    'Salinity': {axis: 'y2'},
  },
  visibility: [1,1,0,0,0],
});

}); //document.ready

function toggle_visibility(el) {
  g.setVisibility(parseInt(el.id), el.checked);
}

function toggle_radio(el) {
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  g.setVisibility(3, false);
  g.setVisibility(4, false);
  if (el.value) {
    g.setVisibility(parseInt(el.value), el.checked);
    g.updateOptions({
      y2label: parameters[el.value].title + ' (' + parameters[el.value].units + ')',
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
