/* Dynamic Air-Sea Interactions - Applicaiton #1
  OOI Data Labs 2019
  Written by Sage Lichtenwalner, Rutgers Univeristy 
*/
$(document).ready(function () {
  $.ajax({
    url: "data/airsea_app.csv",
  })
  .done(function(data) {
    var isDrawing = false;
    var lastDrawRow = null, lastDrawValue = null;
    var tool = 'pencil';
    var valueRange = [0, 2];
  
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
            if(data[row][0] > new Date("1/3/2018 23:00").getTime()) {
              data[row][9] = val; //Column 9 for Predicted value
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
    firstRow.push('Prediction');
    var data = arry.slice(1); //Remove first element (labels)
    for (var idx = 0; idx < data.length; idx++) {
      var row = data[idx];
      row.push(null); //Add empty column at end
    }
    saved_data = $.extend(true,[],data); //Save array so it can be reset later
    
    g1 = new Dygraph(document.getElementById("chart1"), data, {
      labels: firstRow,
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
      rangeSelectorHeight: 30,
      animatedZooms : false,
      axes: {
        y2: {axisLabelWidth: 70}
      },
      series: {
        'Max Wave Height': {axis: 'y', color:'#00457C', showInRangeSelector: true},
        'Peak Wave Period': {axis: 'y2', color:'#DBA53A'},
      },
      visibility: [1,1,0,0,0,0,0,0,0],
    }); //Dygraph1
  
    g2 = new Dygraph(document.getElementById("chart2"), data, {
      labels: firstRow,
      ylabel: 'Wind Speed (m/s)',
      y2label: 'Current Speed (m/s)',
      labelsSeparateLines: true,
      labelsUTC : false,
      strokeWidth: 2,
      drawPoints: true,
      pointSize: 2,
      highlightCircleSize: 6,
      showRangeSelector: false,
      animatedZooms : true,
      axes: {
        y2: {axisLabelWidth: 70}
      },
      series: {
        'Wind Speed': {axis: 'y', color:'#008100'},
        'Current Speed': {axis: 'y2', color:'#00839C'},
      },
      visibility: [0,0,1,1,0,0,0,0,0],
    }); //Dygraph2

    g3 = new Dygraph(document.getElementById("chart3"), data, {
      labels: firstRow,
      ylabel: 'Baro. Pres. (mbar)',
      labelsSeparateLines: true,
      labelsUTC : false,
      strokeWidth: 2,
      drawPoints: true,
      pointSize: 2,
      highlightCircleSize: 6,
      showRangeSelector: false,
      animatedZooms : true,
      series: {
        'Barometric Pressure': {axis: 'y', color:'#000080'}
      },
      visibility: [0,0,0,0,1,0,0,0,0],
    }); //Dygraph3

    g = new Dygraph(document.getElementById("chart4"), data, { 
      labels: firstRow,
      ylabel: 'Rain (mm)',
      labelsSeparateLines: true,
      labelsUTC : false,
      strokeWidth: 2,
      drawPoints: true,
      pointSize: 2,
      highlightCircleSize: 6,
      showRangeSelector: false,
      animatedZooms : true,
      series: {
        'Rain': {axis: 'y', color:'#b3b3ff'},
        'Rain2': {axis: 'y', color:'#DC143C'}, //3333ff
        'Prediction': {axis: 'y1', strokeWidth:4, drawPoints:false, pointSize:0, color:"#DC143C"},
      },
      visibility: [0,0,0,0,0,0,1,0,1],
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
        
    var sync = Dygraph.synchronize(g1, g2, g3, g, {
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

function toggle_visibility(el) {
  //console.log(el);
  g.setVisibility(parseInt(el.id), el.checked);
}

function show_obs(el) {
  if (el.checked) {
    $('#confirmModal').modal('show')    
  } else {
    g.setVisibility(7, el.checked);  
  }
}

function modal_confirm() {
  $('#confirmModal').modal('hide')    
  g.setVisibility(7, true);
}

function modal_cancel() {
  $('#confirmModal').modal('hide')    
  g.setVisibility(7, false);
  $('#showObs').attr('checked',false);
}

function clear_prediction() {
  g.updateOptions({ file: saved_data });
}
