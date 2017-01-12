var parameters = [
  {id:'fluorometric_chlorophyll_a', title:"Chlorophyll-a Concentration", units:"µg/L"},
  {id:'fluorometric_cdom', title:"Colored Dissolved Organic Matter Concentration", units:"ppb"},
  {id:'flort_k_total_volume_scattering_coefficient', title:"Total Volume Scattering Coefficient", units:"1/(m*sr)"},
  {id:'flort_dj_dcl_bback_total', title:"Optical Backscatter", units:"1/m"},
  {id: 'flort_d_dcl_ctdbp_scat_seawater', title:"Total Scattering Coefficient of Pure Seawater", units:"1/m"}
];

var colors = ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"];

g = new Dygraph(document.getElementById("chart"), "data/activity1.csv", {
  //title: 'Fluorometric Chlorophyll A Concentration',
  // xlabel
  ylabel: 'Chlorophyll-a Concentration (µg/L)',
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
  },
  series: {
    'Chlorophyll-a': {axis: 'y', showInRangeSelector: true},
    'CDOM': {axis: 'y2'},
    'TVSC': {axis: 'y2'},
    'OBS': {axis: 'y2'},
    'TSCPS': {axis: 'y2'},
  },
  visibility: [1,1,0,0,0],
});

function change_var2(el) {
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  g.setVisibility(3, false);
  g.setVisibility(4, false);
  g.setVisibility(parseInt(el.value), true);
  g.updateOptions({
    y2label: parameters[el.value].title + ' (' + parameters[el.value].units + ')',
  })
  var cols = document.getElementsByClassName('dygraph-y2label');
  for(i=0; i<cols.length; i++) {
    cols[i].style.color = colors[el.value];
  }
}