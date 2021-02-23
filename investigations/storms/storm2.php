<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <title>Weather Conditions During Sandy (2012)</title>
</head>

<body>

<div id="chart1" style="width:800px; height: 400px;"></div>
<br>
<p><strong>Select a parameter:</strong>
<select id="select1" onchange="select_graph(this)">
  <option value="8">Maine (44027) Air Pressure</option>
  <option value="9">Maine (44027) Wave Height</option>
  <option value="10">Maine (44027) Ocean Temperature</option>
  <option value="11">Maine (44027) Wind Speed</option>
  <option value="4">NY Harbor (44025) Air Pressure</option>
  <option value="5">NY Harbor (44025) Wave Height</option>
  <option value="6">NY Harbor (44025) Ocean Temperature</option>
  <option value="7">NY Harbor (44025) Wind Speed</option>
  <option value="12">Offshore NJ (44065) Air Pressure</option>
  <option value="13">Offshore NJ (44065) Wave Height</option>
  <option value="14">Offshore NJ (44065) Ocean Temperature</option>
  <option value="15">Offshore NJ (44065) Wind Speed</option>
  <option value="0" selected>Delaware (44009) Air Pressure</option>
  <option value="1">Delaware (44009) Wave Height</option>
  <option value="2">Delaware (44009) Ocean Temperature</option>
  <option value="3">Delaware (44009) Wind Speed</option>
</select>
</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/dygraph-2.1.0/dygraph.js"></script>
<link rel="stylesheet" href="../../js/dygraph-2.1.0/dygraph.css" />
<script src="storm2.js"></script>

</body>
</html>
