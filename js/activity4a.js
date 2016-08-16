g = new Dygraph(document.getElementById("chart"), "data/activity4a.csv", {
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
});

function date_button(season) {
  // Remember, months must be specified between 0 and 11
  if (season=='spring') {
    new_range = [new Date(2015,2,15).valueOf(), new Date(2015,5,15).valueOf()];
  } else if (season=="summer") {
    new_range = [new Date(2015,5,15).valueOf(), new Date(2015,8,15).valueOf()];    
  } else if (season=="fall") {
    new_range = [new Date(2015,8,15).valueOf(), new Date(2015,11,15).valueOf()];
  } else {
    new_range = [new Date(2015,11,15).valueOf(), new Date(2016,2,15).valueOf()];
  }
  console.log(new_range);
  g.updateOptions({dateWindow: new_range});
}
