g = new Dygraph(document.getElementById("chart"), "data/chemistry1a.csv", {
  //title: 'Fluorometric Chlorophyll A Concentration',
  // xlabel
  ylabel: 'Salinity',
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
  //axes: {
  //  y: {valueRange: [0, null]}
  //},
});

function date_button(season) {
  // Remember, months must be specified between 0 and 11
  if (season=='spring') {
    new_range = [new Date(2015,2,1).valueOf(), new Date(2015,5,1).valueOf()];
  } else if (season=="summer") {
    new_range = [new Date(2015,5,1).valueOf(), new Date(2015,8,1).valueOf()];    
  } else if (season=="fall") {
    new_range = [new Date(2015,8,1).valueOf(), new Date(2015,11,1).valueOf()];
  } else if (season=="winter") {
    new_range = [new Date(2015,11,1).valueOf(), new Date(2016,2,1).valueOf()];
  } else {
    new_range = [new Date(2015,5,1).valueOf(), new Date(2016,5,1).valueOf()];
  }
  console.log(new_range);
  g.updateOptions({dateWindow: new_range});
}

function toggle_radio(el) {
  g.setVisibility(0, false);
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  g.setVisibility(3, false);
  g.setVisibility(4, false);
  g.setVisibility(5, false);
  // Remember, months must be specified between 0 and 11
  if (el.value==1) {
    g.setVisibility(0, true);
    g.setVisibility(1, true);
  } else if (el.value==2) {
    g.setVisibility(2, true);
    g.setVisibility(3, true);
  } else if (el.value==3) {
    g.setVisibility(4, true);
    g.setVisibility(5, true);
  } else {
    g.setVisibility(0, true);
    g.setVisibility(1, true);
    g.setVisibility(2, true);
    g.setVisibility(3, true);
    g.setVisibility(4, true);
    g.setVisibility(5, true);
  }    
}