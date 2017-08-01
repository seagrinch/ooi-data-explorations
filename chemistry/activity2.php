<?php 
  $lesson_title = 'Processes that Change Salinity';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Properties of Seawater</a></li>
  <li><a href="activity2.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the May 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge</h3>
<?php if ($level=='exploration'): ?>
<p>Make a prediction about how as salinity in the surface ocean changes, what changes in other aspects of the ocean and/or atmosphere you could observe.</p>
<?php elseif ($level=='application'): ?>
<p>Does salinity change over time in the surface ocean? Why?</p>
<?php endif; ?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Explore data from the water and atmospheric conditions above the surface ocean across different time periods from the northern Pacific Ocean (Coastal Endurance Array) to see what you can observe.</p>

<?php elseif ($level=='application'): ?>
<p>Explore data from the water and atmospheric conditions above the surface ocean during different weather events from the northern Pacific Ocean (Coastal Endurance Array) to observe patterns in processes that impact surface salinity values.</p>

<?php endif; ?>


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include Salinity?</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
      Salinity</label>
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)" checked> 
      Air Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)" > 
      Sea Surface Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)" > 
      Rain Rate</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(this)" > 
      None</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chemistry2e.js";
?>  
<p class="text-right"><a href="data/chemistry2e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>
<p class="text-right"><a href="data/chemistry2a.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the full dataset of salinity and air temperature data from the Oregon Shelf Surface Buoy in the Coastal Endurance Array. You can interact with the data by:</p>
<ul>
  <li>Turning on and off different oceanic or atmospheric variables to compare their data to the salinity data.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Turn on and off different oceanic or atmospheric variables to compare them to the salinity data. Select another time period to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you look at in these graphs?</li>
      <li>Across what time periods are you able to observe oceanic or atmospheric variables in these graphs? </li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe at the surface in other variables as salinity changes over this time period off of Oregon? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about what drives changes in salinity at the ocean surface over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<ol>
  <li>What did you find from the data about the influence of precipitation on surface ocean salinity over time?</li>
  <li>What did you find from the data about the influence of evaporation on surface ocean salinity over time?</li>
  <li>What can you conclude overall about processes that affect surface ocean over time?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/chemistry2e.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/chemistry2a.json');
  }
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h4>Dataset Information</h4>

<?php if ($level=='exploration'): ?>

<p>The data for this activity was obtained from the following meteorological instrument:</p>
<ul>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE02SHSM/">Oregon Shelf Surface Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-SBD11-06-METBKA000/telemetered_metbk-a-dcl-instrument">CE02SHSM-SBD11-06-METBKA000</a>)</li>
</ul>
<p class="text-center"><a href="data/chemistry2e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<p>The above datasets were downloaded from the OOI data portal, and then down-sampled to hourly intervals.  The data presented are from the raw record, that is, they are instantaneous measurements that have not been averaged because that would smooth out the variability in the dataset.</p>

<?php elseif ($level=='application'): ?>

<p>Data for this activity were adapted from the following instruments:</p>

<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore seawater characteristics of processes that are correlated with changes in salinity over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>This activity has the following variations:</p>
    <div class="list-group">
      <a href="activity2.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Make a prediction about how as salinity in the surface ocean changes, what changes in other aspects of the ocean and/or atmosphere you could observe.</p>
      </a>
<!--
      <a href="activity2.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Does salinity change over time in the surface ocean? Why?</p>
      </a>
-->
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
