$(document).ready(function () {

new Dygraph(document.getElementById("chart1"), "data/productivity3a.csv", {
  title: "Fall Chlorophyll-a Concentrations in Northern Hemisphere Temperate Coastal Oceans",
  ylabel: 'Chlorophyll-a Concentration (&micro;g/L)',
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 600,
  labelsUTC : true,
  colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
  strokeWidth: 0,
  drawPoints: true,
  pointSize: 2,
  highlightCircleSize: 6,
  showRangeSelector: true,
  axes: {
    y: {valueRange: [0, 5]}
  },
  series: {
    'Coastal Endurance': {showInRangeSelector: true},
    'Coastal Pioneer': {showInRangeSelector: true},
  },
  visibility: [1,1,0,0],
});

new Dygraph(document.getElementById("chart2"), "data/productivity3a.csv", {
  title: "Fall Chlorophyll-a Concentrations in Northern Hemisphere Near Polar Open Oceans",
  ylabel: 'Chlorophyll-a Concentration (&micro;g/L)',
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 600,
  labelsUTC : true,
  colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
  strokeWidth: 0,
  drawPoints: true,
  pointSize: 2,
  highlightCircleSize: 6,
  showRangeSelector: true,
  axes: {
    y: {valueRange: [0, 5]}
  },
  series: {
    'Global Irminger Sea': {showInRangeSelector: true},
    'Global Station Papa': {showInRangeSelector: true},
  },
  visibility: [0,0,1,1],
});

new Dygraph(document.getElementById("chart3"), "data/productivity3b.csv", {
  title: "Fall Chlorophyll-a Concentrations in Southern Hemisphere Open Oceans",
  ylabel: 'Chlorophyll-a Concentration (&micro;g/L)',
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 600,
  labelsUTC : true,
  colors : ["#00C6B0","#999999"],
  strokeWidth: 0,
  drawPoints: true,
  pointSize: 2,
  highlightCircleSize: 6,
  showRangeSelector: true,
  axes: {
    y: {valueRange: [0, 5]}
  },
/*
  series: {
    'Southern Ocean (Near Polar)': {showInRangeSelector: true},
  },
*/
});

}); //document.ready
