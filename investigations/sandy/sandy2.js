var parameters = [
  {title:"8518750 Water Level", units:"m"},
  {title:"8531680 Water Level", units:"m"},
  {title:"8534720 Water Level", units:"m"},
  {title:"8570283 Water Level", units:"m"},
  {title:"8518750 Prediction", units:"m"},
  {title:"8531680 Prediction", units:"m"},
  {title:"8534720 Prediction", units:"m"},
  {title:"8570283 Prediction", units:"m"},
];

$(document).ready(function () {

  g = new Dygraph(document.getElementById("chart1"), "sandy2.csv", {
    title: "Water Levels During Sandy (2012)",
    ylabel: 'Water Level (m)',
    legend: 'always',
    labelsSeparateLines: true,
    labelsUTC : true,
    colors : ["#00457C","#00457C","#00457C","#00457C", "#DBA53A","#DBA53A","#DBA53A","#DBA53A"],
    strokeWidth: 2,
    drawPoints: true,
    pointSize: 2,
    highlightCircleSize: 6,
    showRangeSelector: false,
    visibility: [1,0,0,0,0,0,0,0],
  });

}); //document.ready


function update_graph() {
  site = $('#site').val();
  //console.log(site)
  
  g.setVisibility(0, site=='8518750' && $('#water_level').is(':checked'));
  g.setVisibility(1, site=='8531680' && $('#water_level').is(':checked'));
  g.setVisibility(2, site=='8534720' && $('#water_level').is(':checked'));
  g.setVisibility(3, site=='8570283' && $('#water_level').is(':checked'));

  g.setVisibility(4, site=='8518750' && $('#prediction').is(':checked'));
  g.setVisibility(5, site=='8531680' && $('#prediction').is(':checked'));
  g.setVisibility(6, site=='8534720' && $('#prediction').is(':checked'));
  g.setVisibility(7, site=='8570283' && $('#prediction').is(':checked'));
}  