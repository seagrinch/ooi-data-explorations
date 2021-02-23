var parameters = [
  {title:"44009 Air Pressure", units:"hPa"},
  {title:"44009 Wave Height", units:"m"},
  {title:"44009 Ocean Temperature", units:"&deg;C"},
  {title:"44009 Wind Speed", units:"m/s"},
  {title:"44065 Air Pressure", units:"hPa"},
  {title:"44065 Wave Height", units:"m"},
  {title:"44065 Ocean Temperature", units:"&deg;C"},
  {title:"44065 Wind Speed", units:"m/s"},
];

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart1"), "irene2011.csv", {
    title: "Weather Conditions During Irene (2011)",
    ylabel: '44009 Air Pressure (hPa)',
    legend: 'always',
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"],
    strokeWidth: 0,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    visibility: [1,0,0,0,0,0,0,0],
  });
  


//   document.getElementById("select1").onclick = function() { select_graph(); };

}); //document.ready


function select_graph(el) {
  console.log(el)
  g.setVisibility(0, false);
  g.setVisibility(1, false);
  g.setVisibility(2, false);
  g.setVisibility(3, false);
  g.setVisibility(4, false);
  g.setVisibility(5, false);
  g.setVisibility(6, false);
  g.setVisibility(7, false);
  g.setVisibility(parseInt(el.value), true);
  g.updateOptions({
    ylabel: parameters[el.value].title + ' (' + parameters[el.value].units + ')',
  })
}  