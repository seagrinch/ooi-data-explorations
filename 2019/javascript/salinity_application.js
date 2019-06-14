var parameters = {
  'salinity':"Salinity",
  'airtemp':"Air Temperature (&deg;C)",
  'sst':"Sea Surface Temperature (&deg;C)",
  'rain':"Precipitation (mm)",
};

var colors = {
  'salinity':"#00457C",
  'airtemp':"#DBA53A",
  'sst':"#008100",
  'rain':"#00839C",
};

// Helpful color picker https://www.w3schools.com/colors/colors_picker.asp

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart"), "data/salinity_application.csv", {
    //title: 'Coastal Endurance Array - Oregon Shelf Surface Mooring',
    ylabel: 'Salinity',
    y2label: '',
    legend: 'onmouseover',
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 250,
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : ["#003866","#563f10","#006600","#005566",
      "#008cff","#d79d28","#00ff00","#00d5ff",
      "#99d1ff","#efd8a9","#99ff99","#99eeff"],
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    visibility: [1,0,0,0,1,0,0,0,1,0,0,0],
    axes: {
      //  y: {valueRange: [0, null]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'Endurance Salinity': {axis: 'y', showInRangeSelector: true},
      'Endurance Air Temp': {axis: 'y2'},
      'Endurance SST': {axis: 'y2'},
      'Endurance Rain': {axis: 'y2'},
      'Pioneer Salinity': {axis: 'y', showInRangeSelector: true},
      'Pioneer Air Temp': {axis: 'y2'},
      'Pioneer SST': {axis: 'y2'},
      'Pioneer Rain': {axis: 'y2'},
      'Irminger Salinity': {axis: 'y', showInRangeSelector: true},
      'Irminger Air Temp': {axis: 'y2'},
      'Irminger SST': {axis: 'y2'},
      'Irminger Rain': {axis: 'y2'},
    },
  });

}); //End document.ready


function toggle_lines() {
  parameter = $('input[name=second]:checked').val();  
  g.setVisibility(0, $('#salinity').is(':checked') && $('#CE').is(':checked'));
  g.setVisibility(1, parameter=='airtemp' && $('#CE').is(':checked'));
  g.setVisibility(2, parameter=='sst' && $('#CE').is(':checked'));
  g.setVisibility(3, parameter=='rain' && $('#CE').is(':checked'));
  g.setVisibility(4, $('#salinity').is(':checked') && $('#CP').is(':checked'));
  g.setVisibility(5, parameter=='airtemp' && $('#CP').is(':checked'));
  g.setVisibility(6, parameter=='sst' && $('#CP').is(':checked'));
  g.setVisibility(7, parameter=='rain' && $('#CP').is(':checked'));
  g.setVisibility(8, $('#salinity').is(':checked') && $('#GI').is(':checked'));
  g.setVisibility(9, parameter=='airtemp' && $('#GI').is(':checked'));
  g.setVisibility(10, parameter=='sst' && $('#GI').is(':checked'));
  g.setVisibility(11, parameter=='rain' && $('#GI').is(':checked'));

  if (parameter) {
    g.updateOptions({
      y2label: parameters[parameter],
    })
    var cols = document.getElementsByClassName('dygraph-y2label');
    for(i=0; i<cols.length; i++) {
      cols[i].style.color = colors[parameter];
    }
    cols = document.getElementsByClassName('dygraph-axis-label-y2');
    for(i=0; i<cols.length; i++) {
      cols[i].style.color = '#000';
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

} // End toggle_lines

