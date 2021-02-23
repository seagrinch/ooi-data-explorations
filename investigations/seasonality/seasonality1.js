var parameters = [
  {title:"41112 Water Temperature", units:"&deg;C"},
  {title:"44033 Water Temperature", units:"&deg;C"},
  {title:"44065 Water Temperature", units:"&deg;C"},
];

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart1"), "seasonality1.csv", {
    title: "Water Temperatures along the East Coast",
    ylabel: 'Water Temperature (&deg;C)',
    legend: 'always',
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
    strokeWidth: 2,
    drawPoints: false,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    visibility: [1,0,0],
  });

}); //document.ready


function toggle_line(el) {
  g.setVisibility(parseInt(el.value), el.checked);
}
