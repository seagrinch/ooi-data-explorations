<?php 
  $lesson_title = 'Earthquakes';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Geology</a></li>
  <li><a href="activity1.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application','test1','test2'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>Question</p>
<?php elseif ($level=='application'): ?>
<p>Question</p>
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
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/usgs_earthquakes.csv" data-zoom="5"></div>

<?php elseif ($level=='application'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/usgs_blanco.csv" data-zoom="6"></div>

<?php elseif ($level=='test1'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/Blanco_May16_July16_2015.csv" data-zoom="5"></div>

<?php elseif ($level=='test2'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/Blanco_2013_2017.csv" data-zoom="5"></div>

<?php endif; ?>

<div id="map2"></div>
<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "javascript/geology1.js";
?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Objective.</p>
<p><strong>Data Tip:</strong> Tip.</p>

<?php elseif ($level=='application'): ?>
<p>Objective.</p>
<p><strong>Data Tip:</strong> Tip.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>
<ol>
  <li></li>
</ol>

<?php elseif ($level=='application'): ?>
<ol>
  <li></li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>



<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore ???</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Question?</p>
      </a>
      <a href="activity1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Question?</p>
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
