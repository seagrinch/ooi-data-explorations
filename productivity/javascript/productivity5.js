g = new Dygraph(document.getElementById("chart"), "productivity/data/productivity5.csv", {
  //title: 'Fluorometric Chlorophyll A Concentration',
  // xlabel
  ylabel: 'Chlorophyll-a Concentration (µg/L)',
  // y2label
  //labels : ["Date","Endurance","Pioneer"],
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 400,
  labelsUTC : true,
  colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
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
    y: {valueRange: [0, null]}
  },
  visibility: [0,0,1],
});

// independentTicks

function toggle_visibility(el) {
  g.setVisibility(parseInt(el.id), el.checked);
}