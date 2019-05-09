$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart"), "data/salinity_ce02.csv", {
    title: 'Coastal Endurance Array - Oregon Shelf Surface Mooring',
    ylabel: 'Salinity',
    //legend: 'always', //onmouseover
    labelsSeparateLines: false,
    labelsDivStyles: { 'textAlign': 'right' },
    labelsDivWidth : 250,
    labelsUTC : true,
    colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: true,
    rangeSelectorHeight: 30,
    animatedZooms : true,
    series: {
      'Salinity': { showInRangeSelector: true}
    },
    visibility: [1,0,0,0],
  });

}); //document.ready
