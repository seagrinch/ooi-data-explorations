$(document).ready(function () {

  g1 = new Dygraph(document.getElementById("chart1"), "data/IRIS-Jan-Aug.csv", {
    //title: 'Tilt Measurements',
    ylabel: 'X-Tilt (microradians)',
    y2label: 'Y-Tilt (microradians)',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsDivStyles: { 'textAlign': 'right' },
    //labelsDivWidth : 600,
    labelsUTC : true,
    colors : ["#00457C","#333","#DBA53A","#777","#008100","#bbb"], //"#00839C","#00C6B0","#999999"
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
      'MJ03D X-tilt': {axis: 'y', showInRangeSelector: true},
      'MJ03D Y-tilt': {axis: 'y2'},
      'MJ03E X-tilt': {axis: 'y'},
      'MJ03E Y-tilt': {axis: 'y2'},
      'MJ03F X-tilt': {axis: 'y'},
      'MJ03F Y-tilt': {axis: 'y2'},
    },
    visibility: [0,0,0,0,1,1],
  });

  g2 = new Dygraph(document.getElementById("chart2"), "data/NANO-depth-Jan-Aug.csv", {
    //title: 'Detided Depth',
    ylabel: 'Depth (m)',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsDivStyles: { 'textAlign': 'right' },
    //labelsDivWidth : 600,
    labelsUTC : true,
    colors : ["#00457C","#DBA53A","#008100"],
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    animatedZooms : true,
    series: {
      'MJ03D Depth': {axis: 'y1'},
      'MJ03E Depth': {axis: 'y1', showInRangeSelector: true},
      'MJ03F Depth': {axis: 'y1'},
    },
    visibility: [0,0,1],
    valueRange: [1515, 1500]
  });

  g3 = new Dygraph(document.getElementById("chart3"), "data/NANO-temp-Jan-Aug.csv", {
    //title: 'Detided Depth',
    ylabel: 'Temperature (C)',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always', //onmouseover
    labelsSeparateLines: true,
    labelsDivStyles: { 'textAlign': 'right' },
    //labelsDivWidth : 600,
    labelsUTC : true,
    colors : ["#00457C","#DBA53A","#008100"],
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    animatedZooms : true,
    series: {
      'MJ03D Temperature': {axis: 'y1'},
      'MJ03E Temperature': {axis: 'y1', showInRangeSelector: true},
      'MJ03F Temperature': {axis: 'y1'},
    },
    visibility: [0,0,1],
  });

  var sync = Dygraph.synchronize(g1, g2, g3, {
    selection: true,
    zoom: true,
    range: false
  });

}); //document.ready

function toggle_visibility(el) {
  g1.setVisibility(parseInt(el.id)*2, el.checked);
  g1.setVisibility(parseInt(el.id)*2+1, el.checked);
  g2.setVisibility(parseInt(el.id), el.checked);
  g3.setVisibility(parseInt(el.id), el.checked);
}
