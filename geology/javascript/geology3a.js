$(document).ready(function () {
  $.ajax({
    url: "data/geology3a.csv",
  })
  .done(function(data) {
    var isDrawing = false;
    var lastDrawRow = null, lastDrawValue = null;
    var tool = 'pencil';
    var valueRange = [0, 4.5];
  
    function setPoint(event, g, context) {
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
            if(data[row][0] > new Date("12/5/2016").getTime()) {
              data[row][3] = val; //Column 3 for Predicted value
            }
            if (val === null || value === undefined || isNaN(val)) {
              console.log(val);
            }
          } else if (tool == 'eraser') {
            data[row][3] = null;
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
          row[0] = new Date(row[0]); // Turn the string date into a Date.
          for (var rowIdx = 1; rowIdx < row.length; rowIdx++) {
            // Turn "123" into 123.
            row[rowIdx] = parseFloat(row[rowIdx]);
          }     
        }     
        arry.push(row);
      }     
      return arry;
    }

    var arry = toArray(data);
    var firstRow = arry[0];
    var data = arry.slice(1); //Remove first element (labels)
    firstRow.push('Prediction');
    for (var idx = 0; idx < data.length; idx++) {
      var row = data[idx];
      row.push(null);
    }
    saved_data = $.extend(true,[],data); //Save array so it can be reset later

    g = new Dygraph(document.getElementById("chart"), data, { 
      title: 'Long-term inflation/deflation record in Axial caldera',
      ylabel: 'Change in seafloor elevation (meters)',
      labels: ["Date","Offset Depth (m)","Threshold","Prediction"],
      legend: 'always',
      labelsDivStyles: { 'textAlign': 'right' },
      labelsDivWidth : 400,
      labelsUTC : true,
      colors : ["#00457C","#00839C","#008100","#DBA53A","#00C6B0"],
      highlightCircleSize: 6,
      showRangeSelector: true,
      //rangeSelectorPlotFillColor : "#00839C",
      //rangeSelectorPlotStrokeColor : "#008100",
      series: {
        'Offset Depth (m)': {
          strokeWidth: 0,
          drawPoints: true,
          pointSize: 1.5,
          showInRangeSelector: true,
          color: "#00457C",
        },
        'Threshold': {
          strokeWidth: 2,
          //strokePattern: [50,50],
          drawPoints: false,
          pointSize: 0,
          color: "#008100",
        },
        'Prediction': {
          strokeWidth: 4,
          drawPoints: false,
          pointSize: 0,
          color: "#DBA53A",
        },
      },
      visibility: [1,0,1],
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
            setPoint(event, g, context);
          }
        },
        mousemove: function (event, g, context) {
          if (tool == 'zoom') {
            Dygraph.defaultInteractionModel.mousemove(event, g, context);
          } else {
            if (!isDrawing) return;
            setPoint(event, g, context);
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
/*
        mousewheel: function(event, g, context) {
          var normal = event.detail ? event.detail * -1 : event.wheelDelta / 40;
          var percentage = normal / 50;
          var axis = g.xAxisRange();
          var xOffset = g.toDomCoords(axis[0], null)[0];
          var x = event.offsetX - xOffset;
          var w = g.toDomCoords(axis[1], null)[0] - xOffset;
          var xPct = w === 0 ? 0 : (x / w);
      
          var delta = axis[1] - axis[0];
          var increment = delta * percentage;
          var foo = [increment * xPct, increment * (1 - xPct)];
          var dateWindow = [ axis[0] + foo[0], axis[1] - foo[1] ];
      
          g.updateOptions({
            dateWindow: dateWindow
          });
          event.preventDefault();
        }
*/
      },
    }); //Dygraph
    window.onmouseup = finishDraw;
    
  }); //done
  
}); //document.ready

function toggle_visibility(el) {
  console.log(el);
  g.setVisibility(parseInt(el.id), el.checked);
}

function prediction_reset() {
  g.updateOptions({ file: saved_data });
}

/* References
  http://blog.dygraphs.com/2012/04/how-to-download-and-parse-data-for.html
  http://dygraphs.com/gallery/#g/drawing
*/
