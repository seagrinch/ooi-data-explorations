<?php 
  $lesson_title = 'Seismic Features at a Seamount';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Tectonics & Seamounts</a></li>
  <li><a href="activity4.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use earthquake data at Axial Seamount to look if there are patterns over 3 months in spring 2015.</p>
<ul>
  <li>Make a prediction about what kind of patterns in earthquake magnitude, depth, and location you may observe over time at an active seamount.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Use earthquake data from Axial Seamount in April 2015 to determine when the diking-eruptive event occurred.</p>
<ul>
  <li>Make a prediction about what kind of patterns in earthquake magnitude and location you may observe at the time of a diking-eruptive event.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time at the Axial Seamount.</li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->

<!-- Leaflet -->
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
<p>Automatically select: 
<?php if ($level=='exploration'): ?>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(7)">1 Week</button>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(30)">1 Month</button>
<?php endif; ?>
<?php if ($level=='application'): ?>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(1/12)">1 Hour</button>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(1/4)">6 Hours</button>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(1)">1 Day</button>
<?php endif; ?>
</p>

<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "https://d3js.org/d3-scale-chromatic.v1.min.js";
  $scripts[] = "javascript/geology4.js";
?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see all of the earthquake data from March 1-7, 2015 around the Axial Seamount. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the amount of data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with only data from March 1-7, 2015 highlighted). </li>
  <li>Zooming in and out of the map to see more or less of the area of the Axial Seamount where earthquakes occurred.
As a note, the color denotes earthquake magnitude, with dark purple representing lower magnitude and pink representing higher magnitude.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to see all of the earthquake data from 6 hours on April 23, 2015 (00:00-06:00 UTC). You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Zooming in and out of the map to see more or less of the area of the ocean the earthquakes occurred.</li>
</ul>
<p>Note, the color denotes earthquake magnitude, with dark purple representing lower magnitude and pink representing higher magnitude.</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what geographic area are you able to observe earthquake data in this map? </li>
      <li>What is the range of earthquake size (magnitude) in these data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in earthquake location over this time period at Axial Seamount in reference to bathymetric features? </li>
      <li>Where did you see these changes or patterns?</li>
      <li>What changes or patterns did you observe in earthquake magnitude over this time period at Axial Seamount?</li>
      <li>What changes or patterns did you observe in the relative number of earthquakes that occurred during a week over these 3 months at Axial Seamount?</li>
      <li>What questions do you still have about what we can learn about plate boundaries from earthquake data over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what geographic area are you able to observe earthquake data in this map? </li>
      <li>What is the range of earthquake magnitudes in these data?</li>
      <li>When do you see the largest earthquakes along this time series across the diking-eruptive event?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>During what time frame did the diking-eruptive event occur?</li>
      <li>What evidence do you have of a relationship between earthquake magnitude and timing during the diking-eruptive event at the Axial Seamount? </li>
      <li>How does this relationship support what you previously knew about seismic activity at seamounts?</li>
      <li>What questions do you still have about seismic activity at seamounts during eruption events?</li>
    </ul>
  </div>
</div>

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
  <li>To learn more about this diking-eruptive event, see Wilcock, W., M. Tolstoy, F. Waldhauser, C. Garcia1, Y. Joe Tan, D. Bohnenstiehl, J. Caplan-Auerbach, R. Dziak, A. Arnulf, and M. Mann. (2016) Seismic constraints on caldera dynamics from the 2015 Axial Seamount eruption. Science. 354(6318): 1395-1399. DOI: 10.1126/science.aah5563</li>
</ul>



<?php if ($level=='exploration'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo4e" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo4a" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


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
        <p class="list-group-item-text">Use earthquake data at Axial Seamount to look if there are patterns over 3 months in spring 2015.</p>
      </a>
      <a href="activity4.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Use earthquake data from Axial Seamount in April 2015 to determine when the diking-eruptive event occurred.</p>
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
