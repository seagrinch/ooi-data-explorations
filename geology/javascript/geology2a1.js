$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart2"), "data/IRIS-Apr23-27.csv", {
    //title: 'Tilt Measurements',
    ylabel: 'X-Tilt (microradians)',
    y2label: 'Y-Tilt (microradians)',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 150,
    labelsUTC : true,
    colors : ["#00457C","#7fc4fb","#DBA53A","#ffd86d","#008100","#4dce4d"], 
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    animatedZooms : true,
    axes: {
    //   y: {valueRange: [0, null]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'ID X-tilt': {axis: 'y', showInRangeSelector: true},
      'ID Y-tilt': {axis: 'y2'},
      'EC X-tilt': {axis: 'y'},
      'EC Y-tilt': {axis: 'y2'},
      'CC X-tilt': {axis: 'y'},
      'CC Y-tilt': {axis: 'y2'},
    },
    visibility: [0,0,0,0,1,1],
  });

  g2 = new Dygraph(document.getElementById("chart1"), "data/NANO-depth-Apr23-27.csv", {
    //title: 'Detided Depth',
    ylabel: 'Depth (m)',
    y2label: '',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 150,
    labelsUTC : true,
    colors : ["#00457C","#DBA53A","#008100"],
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    animatedZooms : true,
    axes: {
    //   y: {valueRange: [1500, 1520]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'ID Depth': {axis: 'y1'},
      'EC Depth': {axis: 'y1', showInRangeSelector: true},
      'CC Depth': {axis: 'y1'},
    },
    visibility: [0,0,1],
    valueRange: [1515, 1499]
  });

  var sync = Dygraph.synchronize(g1, g2, {
    selection: true,
    zoom: true,
    range: false
  });

}); //document.ready

function toggle_visibility(el) {
  g1.setVisibility(parseInt(el.id)*2, el.checked);
  g1.setVisibility(parseInt(el.id)*2+1, el.checked);
  g2.setVisibility(parseInt(el.id), el.checked);
}
