<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <title>Irene Storm Data</title>
</head>

<body>

<div id="chart1" style="width:800px; height: 400px;"></div>
<br>
<select id="select1" onchange="select_graph(this)">
  <option value="0">44009 Air Pressure</option>
  <option value="1">44009 Wave Height</option>
  <option value="2">44009 Ocean Temperature</option>
  <option value="3">44009 Wind Speed</option>
  <option value="4">44065 Air Pressure</option>
  <option value="5">44065 Wave Height</option>
  <option value="6">44065 Ocean Temperature</option>
  <option value="7">44065 Wind Speed</option>
</select>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../js/dygraph-combined-dev.js"></script>
<script src="storm1.js"></script>

</body>
</html>
