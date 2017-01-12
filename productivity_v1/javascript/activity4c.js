new Dygraph(document.getElementById("chart1"), "data/activity4c1.csv", {
  title: "Fall Chlorophyll-a Concentrations in Northern Hemisphere Temperate Oceans",
  ylabel: 'Chlorophyll-a Concentration (µg/L)',
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 400,
  labelsUTC : true,
  colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
  strokeWidth: 0,
  drawPoints: true,
  pointSize: 2,
  highlightCircleSize: 6,
  axes: {
    y: {valueRange: [0, null]}
  },
  visibility: [1,1,0,0],
});

new Dygraph(document.getElementById("chart2"), "data/activity4c1.csv", {
  title: "Fall Chlorophyll-a Concentrations in Northern Hemisphere Polar Oceans",
  ylabel: 'Chlorophyll-a Concentration (µg/L)',
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 400,
  labelsUTC : true,
  colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
  strokeWidth: 0,
  drawPoints: true,
  pointSize: 2,
  highlightCircleSize: 6,
  axes: {
    y: {valueRange: [0, 8]}
  },
  visibility: [0,0,1,1],
});

new Dygraph(document.getElementById("chart3"), "data/activity4c2.csv", {
  title: "Fall Chlorophyll-a Concentrations in Southern Hemisphere Polar Oceans",
  ylabel: 'Chlorophyll-a Concentration (µg/L)',
  legend: 'always',
  labelsDivStyles: { 'textAlign': 'right' },
  labelsDivWidth : 400,
  labelsUTC : true,
  colors : ["#00C6B0","#999999"],
  strokeWidth: 0,
  drawPoints: true,
  pointSize: 2,
  highlightCircleSize: 6,
  axes: {
    y: {valueRange: [0, null]}
  },
});
