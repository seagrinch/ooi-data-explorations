<?php 
  $lesson_title = 'Thermohaline Circulation ';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="thermohaline.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>How does the atmosphere influence the ocean to drive large-scale vertical circulation (ocean conveyor)?</p>
<ol>
  <li>Make a prediction about how the SST(using 30 m depth as a proxy for the surface) responds to seasonal changes in wind forcing.</li>
  <li>Make a prediction about how the ocean surface water density changes in response to changes in the wind forcing.</li>
  <li>Make a prediction about how the water  temperature changes at various depths over the seasonal cycle.</li>
  <li>Make a prediction about how the surface water moves in response to changes in its density.</li>
  <li>Explore the data below to see what you can observe.</li>
</ol>

<?php endif; ?>


<!-- DATA CHART -->
<?php if ($level=='exploration'): ?>
<div id="chart1" style="width:800px; height: 210px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-4">
    <p class="text-right">Specify CTD depths to plot:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="30m" onclick="toggle_lines()" checked> 
      30m</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="90m" onclick="toggle_lines()" > 
      90m</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="350m" onclick="toggle_lines()" > 
      350m</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="1000m" onclick="toggle_lines()" > 
      1000m</label> 
  </div>
</div>
<div class="row">
  <div class="col-xs-4">
    <p class="text-right">Show:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="radio" name="density" value="den" onclick="toggle_lines()" > 
      Density</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="radio" name="density" value="pden" onclick="toggle_lines()" checked> 
      Potential Density</label> 
  </div>
</div>

<link rel="stylesheet" href="../js/dygraph-2.1.0/dygraph.css" />
<style type="text/css">
.dygraph-legend {
  left: 544px !important;
}
.dygraph-label.dygraph-ylabel {
  margin-top: -14px;
}

</style>
<?php 
  $scripts[] = "../js/dygraph-2.1.0/dygraph.js";
  $scripts[] = "../js/dygraph-2.1.0/synchronizer.js";
  $scripts[] = "javascript/thermohaline.js";
?>  

<p class="text-right"><a href="data/thermohaline.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the full dataset of wind speed, seawater temperature, and seawater density for the POR of 2014-09-21 to 2018-06-17 from the Irminger Sea Flanking Mooring B and ECMWF reanalysis grid point. You can interact with the data by:</p>
<ul>
  <li>Turning on and off the various layers of temperature, density, and speed. If a reference layer is needed, I suggest the ECMWF wind speed OR the 30m temperature.</li>
  <li>Zoom in and out of the data to highlight particular sections of the seasonal cycle.  Site loads with all data highlighted, change highlighted width with zoom. </li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic and atmospheric variables are displayed in the graphs?  What are the units associated with each variable?</li>
      <li>What time period does the graphs cover?
        <ul>
          <li>What is the starting date?</li>
          <li>What is the ending date?</li>
          <li>How many complete years of data are represented?</li>
        </ul></li>
      <li>What graph type is this?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in the surface temperature graph?</li>
      <li>Does this change correlate with the surface wind speed data?</li>
      <li>What is the relationship between ocean water temperature and ocean water density?</li>
      <li>Is the seasonal change in ocean water temperature the same magnitude (size) at each level?</li>
      <li>What happens to the water density as you move down through the water column?</li>
      <li>What does the seasonal change in surface density imply about the initiation of the thermohaline circulation at the Irminger Sea area?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<p>TBD</p>


<h3>Dataset Information</h3>
<p>The data for this activity was obtained from the following <a href="https://oceanobservatories.org/instrument-class/ctd/">CTDs</a> on the <a href="https://oceanobservatories.org/site/GI03FLMB/">Irminger Sea Flanking Mooring B</a>:</p>
<ul>
  <li>30m - <a href="https://ooinet.oceanobservatories.org/plot/#GI03FLMB-RIM01-02-CTDMOG060">GI03FLMB-RIM01-02-CTDMOG060</a></li>
  <li>90m - <a href="https://ooinet.oceanobservatories.org/plot/#GI03FLMB-RIM01-02-CTDMOG063">GI03FLMB-RIM01-02-CTDMOG063</a></li>
  <li>350m - <a href="https://ooinet.oceanobservatories.org/plot/#GI03FLMB-RIM01-02-CTDMOG067">GI03FLMB-RIM01-02-CTDMOG067</a></li>
  <li>1000m - <a href="https://ooinet.oceanobservatories.org/plot/#GI03FLMB-RIM01-02-CTDMOH070">GI03FLMB-RIM01-02-CTDMOH070</a></li>
</ul>

<p>Recovered datasets were downloaded from the OOI data portal, and then daily (mean) averages of temperature and density were calculated and merged together into a single file.  Potential temperature and potential density were calculated using the seawater toolbox.  Because the meteorological data from the Irminger Surface Mooring is rather sparse, wind speed data was obtained from the ECMWF reanalysis at the closest grid points (between 59-61&deg;N and 40-38&deg;W).</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/June2019/DL_June_Thermohaline_v1.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>The Thermohaline Circulation (conveyor belt) and NADW Formation in the Irminger Sea</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="thermohaline.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore ocean and atmospheric processes that produce the cold, dense seawater in the Irminger Sea which drives the conveyor belt of the thermohaline circulation.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="thermohaline_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Dixon, R., Beaird, N., &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
