<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <title>Weather Conditions During Irene (2011)</title>
</head>

<body>

<div id="chart1" style="width:800px; height: 400px;"></div>
<br>
<p><strong>Select a parameter:</strong>
<select id="select1" onchange="select_graph(this)">
  <option value="4">Offshore NJ (44065) Air Pressure</option>
  <option value="5">Offshore NJ (44065) Wave Height</option>
  <option value="6">Offshore NJ (44065) Ocean Temperature</option>
  <option value="7">Offshore NJ (44065) Wind Speed</option>
  <option value="0" selected>Delaware (44009) Air Pressure</option>
  <option value="1">Delaware (44009) Wave Height</option>
  <option value="2">Delaware (44009) Ocean Temperature</option>
  <option value="3">Delaware (44009) Wind Speed</option>
</select>
</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/dygraph-2.1.0/dygraph.js"></script>
<link rel="stylesheet" href="../../js/dygraph-2.1.0/dygraph.css" />
<script src="storm1.js"></script>

</body>
</html>
