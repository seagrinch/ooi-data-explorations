/* Dynamic Air-Sea Interactions - Exploration Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart1"), "data/airsea.csv", {
    title: 'Coastal Pioneer Array - Central Surface Mooring',
    ylabel: 'Max Wave Height (m) ',
    y2label: 'Peak Wave Period (s)',
    labelsSeparateLines: true,
    labelsUTC : false,
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    //rangeSelectorPlotFillColor : "#00839C",
    //rangeSelectorPlotStrokeColor : "#008100",
    //animatedZooms : true,
    axes: {
    //   y: {valueRange: [0, null]},
      y2: {axisLabelWidth: 70}
    },
    series: {
      'Max Wave Height': {axis: 'y', color:'#00457C', showInRangeSelector: true},
      'Peak Wave Period': {axis: 'y2', color:'#DBA53A'},
    },
    visibility: [1,1,0,0,0,0,0],
  });

}); //document.ready
