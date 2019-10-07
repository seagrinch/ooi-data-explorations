$(document).ready(function () {

g = new Dygraph(document.getElementById("chart"), "data/chl_nitrate.csv", {
  //title: 'Fluorometric Chlorophyll A Concentration',
  // xlabel
  ylabel: 'Chlorophyll-a Concentration (&micro;g/L)',
  y2label: 'Nitrate Concentration (&micro;Mol/L)',
  //labels : ["Date","Endurance","Pioneer"],
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 250,
  labelsSeparateLines: true,
  labelsUTC : true,
  colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
  strokeWidth: 0.5,
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
    'Washington Chl-a': {axis: 'y', showInRangeSelector: true},
    'Washington Nitrate': {axis: 'y2'},
    'Irminger Chl-a': {axis: 'y'},
    'Irminger Nitrate': {axis: 'y2'},
  },
  visibility: [1,0,1,0],
});

}); //document.ready

function toggle_visibility(el) {
  g.setVisibility(parseInt(el.id), el.checked);
}
