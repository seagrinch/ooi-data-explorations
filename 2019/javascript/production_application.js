/* Factors Affecting Proimary Production - Application Widget
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/

var colors = ["#00457C","#DBA53A","#008100","#00839C","#00C6B0"];

$(document).ready(function () {
  $.ajax({
    url: "data/production_application.csv",
  })
  .done(function(data) {
    var isDrawing = false;
    var lastDrawRow = null, lastDrawValue = null;
    var tool = 'pencil';
    var valueRange = [0, 30];
  
    function setPoint(event, g, context, scol) {
      var graphPos = Dygraph.findPos(g.graphDiv);
      var canvasx = Dygraph.pageX(event) - graphPos.x;
      var canvasy = Dygraph.pageY(event) - graphPos.y;
      var xy = g.toDataCoords(canvasx, canvasy);
      var x = xy[0], value = xy[1];
      var rows = g.numRows();
      var closest_row = -1;
      var smallest_diff = -1;
      // TODO(danvk): binary search
      for (var row = 0; row < rows; row++) {
        var date = g.getValue(row, 0);  // millis
        var diff = Math.abs(date - x);
        if (smallest_diff < 0 || diff < smallest_diff) {
          smallest_diff = diff;
          closest_row = row;
        }
      }
  
      if (closest_row != -1) {
        if (lastDrawRow === null) {
          lastDrawRow = closest_row;
          lastDrawValue = value;
        }
        var coeff = (value - lastDrawValue) / (closest_row - lastDrawRow);
        if (closest_row == lastDrawRow) coeff = 0.0;
        var minRow = Math.min(lastDrawRow, closest_row);
        var maxRow = Math.max(lastDrawRow, closest_row);
        for (var row = minRow; row <= maxRow; row++) {
          if (tool == 'pencil') {
            var val = lastDrawValue + coeff * (row - lastDrawRow);
            val = Math.max(valueRange[0], Math.min(val, valueRange[1]));
            if(data[row][0] < new Date("12/1/2018 00:00").getTime()) {
              data[row][scol] = val; //Column for Predicted value
            }
            if (val === null || value === undefined || isNaN(val)) {
              console.log(val);
            }
          } else if (tool == 'eraser') {
            data[row][9] = null;
          }
        }
        lastDrawRow = closest_row;
        lastDrawValue = value;
        g.updateOptions({ file: data });
        g.setSelection(closest_row);  // prevents the dot from being finnicky.
      }
    }
  
    function finishDraw() {
      isDrawing = false;
      lastDrawRow = null;
      lastDrawValue = null;
    }
  
    function toArray(data) {
      var lines = data.split("\n");
      var arry = [];
      for (var idx = 0; idx < lines.length; idx++) {
        var line = lines[idx];
        // Oftentimes there's a blank line at the end. Ignore it.
        if (line.length == 0) {
          continue;
        }
        var row = line.split(",");
        // Special processing for every row except the header.
        if (idx > 0) {
          //row[0] = new Date(row[0]).getTime(); // Turn the string date into a Date.
          row[0] = moment(row[0]).toDate();
          for (var rowIdx = 1; rowIdx < row.length; rowIdx++) {
            // Turn "123" into 123.
            row[rowIdx] = parseFloat(row[rowIdx]);
          }     
        }     
        arry.push(row);
      }     
      return arry;
    }

    // Add a Prediction column to the data array
    var arry = toArray(data);
    var firstRow = arry[0];
    var data = arry.slice(1); //Remove first element (labels)
    saved_data = $.extend(true,[],data); //Save array so it can be reset later
    
    g1 = new Dygraph(document.getElementById("chart1"), data, {
      labels: firstRow,
      title: 'Global Souther Ocean Surface Mooring',
      ylabel: 'Chlorophyll (ug/L)',
      labelsSeparateLines: true,
      labelsUTC : false,
      strokeWidth: 2,
      drawPoints: true,
      pointSize: 2,
      highlightCircleSize: 6,
      showRangeSelector: true,
      rangeSelectorHeight: 30,
      animatedZooms : false,
      series: {
        'Chlorophyll': {axis: 'y', color:'#00457C', showInRangeSelector: true},
      },
      visibility: [1,0,0,0,0,0,0],
    }); //Dygraph1
      
    g2 = new Dygraph(document.getElementById("chart2"), data, { 
      labels: firstRow,
      ylabel: 'Irradiance (uW cm-2 nm-1)',
      labelsSeparateLines: true,
      labelsUTC : false,
      strokeWidth: 2,
      drawPoints: true,
      pointSize: 2,
      highlightCircleSize: 6,
      showRangeSelector: false,
      animatedZooms : true,
      series: {
        'Irradiance': {axis: 'y', color:'#FFD700'}, /* Gold (web colors) */
        'Irradiance2': {axis: 'y', color:'#FFFF00'}, /* Yellow (web colors) */
        'Prediction1': {axis: 'y1', strokeWidth:4, drawPoints:false, pointSize:0, color:"#DC143C"}, /* Crimson (web colors) */
      },
      visibility: [0,1,0,1,0,0,0],
      valueRange: valueRange,
      interactionModel: {
        mousedown: function (event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mousedown(event, g, context);
          } else {
            // prevents mouse drags from selecting page text.
            if (event.preventDefault) {
              event.preventDefault();  // Firefox, Chrome, etc.
            } else {
              event.returnValue = false;  // IE
              event.cancelBubble = true;
            }
            isDrawing = true;
            setPoint(event, g, context, 4);
          }
        },
        mousemove: function (event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mousemove(event, g, context);
          } else {
            if (!isDrawing) return;
            setPoint(event, g, context, 4);
          }
        },
        mouseup: function(event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mouseup(event, g, context);
          } else {
            finishDraw();
          }
        },
        mouseout: function(event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mouseout(event, g, context);
          }
        },
        dblclick: function(event, g, context) {
          Dygraph.defaultInteractionModel.dblclick(event, g, context);
        },
      },
    }); //Dygraph2
    
    g3 = new Dygraph(document.getElementById("chart3"), data, { 
      labels: firstRow,
      ylabel: 'Nitrate (uMol/L)',
      labelsSeparateLines: true,
      labelsUTC : false,
      strokeWidth: 2,
      drawPoints: true,
      pointSize: 2,
      highlightCircleSize: 6,
      showRangeSelector: false,
      animatedZooms : true,
      series: {
        'Nitrate': {axis: 'y', color:'#008080'}, /* Teal (web colors) */
        'Nitrate2': {axis: 'y', color:'#00CED1'}, /* DarkTurquoise (web colors) */
        'Prediction2': {axis: 'y1', strokeWidth:4, drawPoints:false, pointSize:0, color:"#DC143C"}, /* Crimson (web colors) */
      },
      visibility: [0,0,0,0,1,0,1],
      valueRange: valueRange,
      interactionModel: {
        mousedown: function (event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mousedown(event, g, context);
          } else {
            // prevents mouse drags from selecting page text.
            if (event.preventDefault) {
              event.preventDefault();  // Firefox, Chrome, etc.
            } else {
              event.returnValue = false;  // IE
              event.cancelBubble = true;
            }
            isDrawing = true;
            setPoint(event, g, context, 7);
          }
        },
        mousemove: function (event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mousemove(event, g, context);
          } else {
            if (!isDrawing) return;
            setPoint(event, g, context, 7);
          }
        },
        mouseup: function(event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mouseup(event, g, context);
          } else {
            finishDraw();
          }
        },
        mouseout: function(event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mouseout(event, g, context);
          }
        },
        dblclick: function(event, g, context) {
          Dygraph.defaultInteractionModel.dblclick(event, g, context);
        },
      },
    }); //Dygraph3
        
    var sync = Dygraph.synchronize(g1, g2, g3, {
      selection: true,
      zoom: true,
      range: false
    });
  
    window.onmouseup = finishDraw;
    
  }); //done
  
}); //document.ready


/* References for the drawing tool
  http://dygraphs.com/gallery/#g/drawing
  http://blog.dygraphs.com/2012/04/how-to-download-and-parse-data-for.html
*/

function show_obs2(el) {
  if (el.checked) {
    $('#confirmModal2').modal('show')    
  } else {
    g2.setVisibility(2, el.checked);  
  }
}

function modal_confirm2() {
  $('#confirmModal2').modal('hide')    
  g2.setVisibility(2, true);
}

function modal_cancel() {
  $('#confirmModal2').modal('hide')    
  g2.setVisibility(2, false);
  $('#showObs2').attr('checked',false);
}

function show_obs3(el) {
  if (el.checked) {
    $('#confirmModal3').modal('show')    
  } else {
    g3.setVisibility(5, el.checked);  
  }
}

function modal_confirm3() {
  $('#confirmModal3').modal('hide')    
  g3.setVisibility(5, true);
}

function modal_cancel3() {
  $('#confirmModal3').modal('hide')    
  g3.setVisibility(5, false);
  $('#showObs3').attr('checked',false);
}

function clear_prediction2() {
  g2.updateOptions({ file: saved_data });
}

function clear_prediction3() {
  g3.updateOptions({ file: saved_data });
}
