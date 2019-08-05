/* Chlorophyll - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

var parameters = [
  {title:"Chlorophyll (µg/L)"},
  {title:"Dissolved Oxygen (µmol/kg)"},
  {title:"Sea Surface Temperature (&deg;C)"},
  {title:"Salinity"},
];

var colors = ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"];

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart"), "data/chlorophyll.csv", {
    title: 'Coastal Endurance Array - Oregon Offshore Surface Mooring',
    // xlabel
    ylabel: 'Chlorophyll (µg/L)',
    y2label: '',
    //labels : ["Date","Endurance","Pioneer"],
    legend: 'always',
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 250,
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : colors,
    strokeWidth: 1,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    //logscale : true,
    showRangeSelector: true,
    //rangeSelectorPlotFillColor : "#00839C",
    //rangeSelectorPlotStrokeColor : "#008100",
    //animatedZooms : true,
    axes: {
    //   y: {valueRange: [0, null]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'Endurance Chlorophyll': {axis: 'y', showInRangeSelector: true},
      'Endurance DO': {axis: 'y2'},
      'Endurance Water Temp': {axis: 'y2'},
      'Endurance Salinity': {axis: 'y2'},
    },
    visibility: [1,0,0,0,0,0,0,0],
  });

}); //document.ready

function toggle_chl(el) {
  g.setVisibility(0, el.checked);
}

function toggle_radio(el) {
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  g.setVisibility(3, false);
  if (el.value) {
    g.setVisibility(parseInt(el.value), el.checked);
    g.updateOptions({
      y2label: parameters[el.value].title,
    })
    var cols = document.getElementsByClassName('dygraph-y2label');
    for(i=0; i<cols.length; i++) {
      cols[i].style.color = colors[el.value];
    }
  } else {
    g.updateOptions({
      y2label: '',
    })
    cols = document.getElementsByClassName('dygraph-axis-label-y2');
    for(i=0; i<cols.length; i++) {
      cols[i].style.color = '#fff';
    }
  }
}
