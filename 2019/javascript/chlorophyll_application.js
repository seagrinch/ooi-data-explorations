/* Chlorophyll - Application Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

var parameters = {
  'chlorophyll':"Chlorophyll (µg/L)",
  'do':"Dissolved Oxygen (µmol/kg)",
  'sst':"Sea Surface Temperature (&deg;C)",
  'salinity':"Salinity",
};

var colors = {
  'chlorophyll':"#008100",
  'do':"#00457C",
  'sst':"#DBA53A",
  'salinity':"#00839C",
};


// Helpful color picker https://www.w3schools.com/colors/colors_picker.asp

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart"), "data/chlorophyll.csv", {
    //title: '',
    ylabel: 'Chlorophyll (µg/L)',
    y2label: '',
    legend: 'onmouseover',
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 250,
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : [
      "#006600","#003866","#563f10","#005566",
      "#00ff00","#008cff","#d79d28","#00d5ff",
      "#99ff99","#99d1ff","#efd8a9","#99eeff"],
    strokeWidth: 1,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    visibility: [1,0,0,0,1,0,0,0],
    axes: {
      //  y: {valueRange: [0, null]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'Endurance Chlorophyll': {axis: 'y', showInRangeSelector: true},
      'Endurance DO': {axis: 'y2'},
      'Endurance Water Temp': {axis: 'y2'},
      'Endurance Salinity': {axis: 'y2'},
      'Pioneer Chlorophyll': {axis: 'y', showInRangeSelector: true},
      'Pioneer DO': {axis: 'y2'},
      'Pioneer Water Temp': {axis: 'y2'},
      'Pioneer Salinity': {axis: 'y2'},
    },
  });

}); //End document.ready


function toggle_lines() {
  parameter = $('input[name=second]:checked').val();  
  g.setVisibility(0, $('#chlorophyll').is(':checked') && $('#CE').is(':checked'));
  g.setVisibility(1, parameter=='do' && $('#CE').is(':checked'));
  g.setVisibility(2, parameter=='sst' && $('#CE').is(':checked'));
  g.setVisibility(3, parameter=='salinity' && $('#CE').is(':checked'));
  g.setVisibility(4, $('#chlorophyll').is(':checked') && $('#CP').is(':checked'));
  g.setVisibility(5, parameter=='do' && $('#CP').is(':checked'));
  g.setVisibility(6, parameter=='sst' && $('#CP').is(':checked'));
  g.setVisibility(7, parameter=='salinity' && $('#CP').is(':checked'));


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

