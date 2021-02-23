<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <title>Water Levels During Hurricane Sandy</title>
</head>

<body>

<div id="chart1" style="width:800px; height: 400px;"></div>
<br>
<p><strong>Select a station:</strong>
<select id="site" onchange="update_graph()">
  <option value="8518750" selected>NYC Battery (8518750)</option>
  <option value="8531680">Sandy Hook (8531680)</option>
  <option value="8534720">Atlantic City (8534720)</option>
  <option value="8570283">Maryland (8570283)</option>
</select>
</p>

<p><strong>Select parameters:</strong>
  <label style="font-weight: normal;"><input type="checkbox" id="water_level" onclick="update_graph()" checked> Water Level</label>
  <label style="font-weight: normal;"><input type="checkbox" id="prediction" onclick="update_graph()" > Prediction</label>
</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/dygraph-2.1.0/dygraph.js"></script>
<link rel="stylesheet" href="../../js/dygraph-2.1.0/dygraph.css" />
<script src="sandy2.js"></script>

</body>
</html>
