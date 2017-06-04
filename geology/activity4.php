<?php 
  $lesson_title = 'Seismic Features at a Seamount';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Tectonics & Seamounts</a></li>
  <li><a href="activity4.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the June 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What observations can we make about earthquakes at a seamount over time?</p>
<?php elseif ($level=='application'): ?>
<p>When did the diking-eruptive event occur at the Axial Seamount?</p>
<?php endif; ?>


<!-- DATA CHART -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css"
   integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ=="
   crossorigin=""/>   
<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"
   integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg=="
   crossorigin=""></script>

<style type="text/css">
  .circle { visibility: hidden; }
  .circle.selected { visibility: visible; }
  .axis path, .axis line {
    fill: none;
    stroke: #000;
    shape-rendering: crispEdges;
  }
</style>

<?php if ($level=='exploration'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/axial_earthquakes_downsampled.csv" data-zoom="11" data-center="[45.9549, -130.0089]" data-days="7"></div>

<?php elseif ($level=='application'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/axial_earthquakes_april.csv" data-zoom="11" data-center="[45.9549, -130.0089]" data-days="0.25"></div>

<?php endif; ?>

<div id="map2"></div>
<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "javascript/geology4.js";
?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Explore earthquake magnitude and depth data at the Axial Seamount over 3 months to see what kinds of patterns, if any, you can observe at the seamount.</p>
<p><strong>Data Tip:</strong> You are looking at 1 week of data to start (March 1-7, 2015). Select another time period (by dragging the gray box at the bottom) to explore the data in ways that interest you. Adjust the size of the gray box to look at the data over different time scales. Zoom in and out of the map to vary see more or less of the spatial scale..</p>

<?php elseif ($level=='application'): ?>
<p>Interpret the earthquake magnitude and depth data at the Axial Seamount over 3 days to investigate when a diking-eruptive event occurred.</p>
<p><strong>Data Tip:</strong> You are looking at 6 hours of data to start (April 23, 2015 from 0:00-6:00 UTC). Select another time period (by dragging the gray box at the bottom) to explore the data in ways to see changes in the location and timing of earthquakes. Adjust the size of the gray box to look at the data over different time scales. Zoom in and out of the map to vary see more or less of the spatial area.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>
<ol>
  <li>What did you find interesting in the earthquake data at the Axial Seamount over 3 months in 2015?</li>
  <li>What kinds of patterns did you observe in:
  <ul>
    <li>how many earthquakes per day occurred over time? or</li>
    <li>how big the earthquakes were over time? or</li>
    <li>where the earthquakes occurred over space? </li>
  </ul></li>
  <li>What is your evidence that an unusual event occurred at the seamount during these 3 months?</li>
  <li>What questions do you still have about earthquakes at a seamount?</li>
</ol>

<?php elseif ($level=='application'): ?>
<ol>
  <li>What evidence do you have of a relationship between earthquake magnitude and location during the diking-eruptive event at the Axial Seamount?</li>
  <li>How does this relationship support what you previously knew about seismic activity at seamounts?</li>
  <li>During what time frame did the diking-eruptive event occur?</li>
  <li>What questions do you still have about seismic activity at seamounts?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/geology4.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/geology4.json');
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
<p>Data in this activity is from:</p>
<ul>
  <li>Data are from: Wilcock, W., Waldhauser, F., & Tolstoy, M. (2016). Catalogs of earthquake recorded on Axial Seamount from January, 2015 through November, 2015 (investigators William Wilcock, Maya Tolstoy, Felix Waldhauser). (Version 1) [Data set]. Integrated Earth Data Applications (IEDA). <a href="https://doi.org/10.1594/ieda/323843">https://doi.org/10.1594/ieda/323843</a></li>
  <li>Earthquake catalog(s) data are publicly available in the Marine Geoscience Data System: <a href="http://www.marine-geo.org/tools/search/Files.php?data_set_uid=23843">http://www.marine-geo.org/tools/search/Files.php?data_set_uid=23843</a></li>
</ul>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Help students understand features of seamounts by working with earthquake data at the Axial Seamount, North Pacific Ocean.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity4.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What observations can we make about earthquakes at a seamount over time?</p>
      </a>
      <a href="activity4.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">When did the diking-eruptive event occur at the Axial Seamount?</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_EA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
