<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>
<head>
  <title>Water Temperatures Off the Coast of FL, NJ & ME</title>
</head>

<body>

<div id="chart1" style="width:800px; height: 400px;"></div>
<br>
<p><strong>Select stations:</strong>
  <label style="font-weight: normal;"><input type="checkbox" id="site" value='0' onclick="toggle_line(this)" checked> Florida (41112)</label>
  <label style="font-weight: normal;"><input type="checkbox" id="site" value='2' onclick="toggle_line(this)" > New Jersey (44065)</label>
  <label style="font-weight: normal;"><input type="checkbox" id="site" value='1' onclick="toggle_line(this)" > Maine (44033)</label>
</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/dygraph-2.1.0/dygraph.js"></script>
<link rel="stylesheet" href="../../js/dygraph-2.1.0/dygraph.css" />
<script src="seasonality1.js"></script>

</body>
</html>
