$(document).ready(function () {

g = new Dygraph(document.getElementById("chart"), "data/productivity4.csv", {
  //title: 'Fluorometric Chlorophyll A Concentration',
  // xlabel
  ylabel: "Chlorophyll-a Concentration (&micro;g/L)",
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
  visibility: [1,1,1],
});

}); //document.ready

// independentTicks

function toggle_radio(el) {
  g.setVisibility(0, false);
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  if (el.value) {
    g.setVisibility(parseInt(el.value)-1, el.checked);
  } else {
    g.setVisibility(0, true);
    g.setVisibility(1, true);
    g.setVisibility(2, true);
  }
  // Remember, months must be specified between 0 and 11
  if (el.value==1) {
    new_range = [new Date(Date.UTC(2015,8,1)).valueOf(), new Date(Date.UTC(2015,11,1)).valueOf()];
  } else if (el.value==2) {
    new_range = [new Date(Date.UTC(2015,8,1)).valueOf(), new Date(Date.UTC(2015,11,1)).valueOf()];    
  } else if (el.value==3) {
    new_range = [new Date(Date.UTC(2015,2,1)).valueOf(), new Date(Date.UTC(2015,5,1)).valueOf()];
  } else {
    new_range = [new Date(Date.UTC(2015,2,1)).valueOf(), new Date(Date.UTC(2016,2,1)).valueOf()];
  }    
  //console.log(new_range);
  g.updateOptions({dateWindow: new_range});
}
