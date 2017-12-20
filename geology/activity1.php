<?php 
  $lesson_title = 'Plate Boundary Features';
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
  <li><a href="activity1.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application1','application2'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use earthquake data from plate boundaries in ocean regions off of the Pacific Northwest to look if there are patterns between 2010-17.</p>
<ul>
  <li>Make a prediction about what kind of patterns in earthquake magnitude and location you may observe over time.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='application1'): ?>
<p>Use earthquake data from a divergent plate boundaries in ocean regions off of the Pacific Northwest to determine what relationships of earthquakes along the boundary over time.</p>
<ul>
  <li>Make a prediction about what kind of patterns in earthquake magnitude and location you may observe over time along the boundary.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time along the boundary.</li>
</ul>

<?php elseif ($level=='application2'): ?>
<p>Use earthquake data from a transform plate boundaries in ocean regions off of the Pacific Northwest to determine what relationships of earthquakes along the boundary over time.</p>
<ul>
  <li>Make a prediction about what kind of patterns in earthquake magnitude and location you may observe over time along the boundary.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time along the boundary.</li>
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
<!-- Leaflet Plugins -->
<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-minimap/v1.0.0/Control.MiniMap.js'></script>
<link href='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-minimap/v1.0.0/Control.MiniMap.css' rel='stylesheet' />

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
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/usgs_earthquakes.csv" data-zoom="5" data-days="365"></div>

<?php elseif ($level=='application1'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/usgs_gordo.csv" data-zoom="6" data-center="[42, -128]"></div>

<?php elseif ($level=='application2'): ?>
<div id="map" style="height: 365px; width: 720px; margin-bottom: 1em;" data-source="data/usgs_blanco.csv" data-zoom="6" data-days="14"></div>

<?php endif; ?>

<div id="map2"></div>
<p>Automatically select: 
<?php if ($level=='application1' || $level=='application2'): ?>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(7)">1 Week</button>
<?php endif; ?>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(30)">1 Month</button>
<?php if ($level=='exploration'): ?>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(180)">6 Months</button>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(365)">1 Year</button>
<?php endif; ?>
</p>

<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "https://d3js.org/d3-scale-chromatic.v1.min.js";
  $scripts[] = "javascript/geology1.js";
?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see all of the earthquake data from 2010 throughout the Coastal Endurance Array. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Zooming in and out of the map to see more or less of the area of the ocean the earthquakes occurred.</li>
</ul>

<?php elseif ($level=='application1'): ?>
<p>When the site loads, you are able to see all of the earthquake data from the last two weeks in May 2013 throughout the Coastal Endurance Array. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Zooming in and out of the map to see more or less of the area of the ocean the earthquakes occurred.</li>
</ul>

<?php elseif ($level=='application2'): ?>
<p>When the site loads, you are able to see all of the earthquake data from two weeks in May 2015 throughout the Coastal Endurance Array. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Zooming in and out of the map to see more or less of the area of the ocean the earthquakes occurred.</li>
</ul>

<?php endif; ?>

<p>Note, the color denotes earthquake depth, with darker blues representing deeper depths (up to 50km) and dark red representing shallower depths (0km). The yellows are in-between.  The circles on the map are sized by the earthquake magnitude.</p>


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
      <li>What changes or patterns did you observe in earthquake location over this time period in the Northern Pacific Ocean? </li>
      <li>Where did you see these changes or patterns?</li>
      <li>What changes or patterns did you observe in earthquake magnitude over this time period in the Northern Pacific Ocean?</li>
      <li>What questions do you still have about what we can learn about plate boundaries from earthquake data over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application1'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what geographic area are you able to observe earthquake data in this map? </li>
      <li>What is the range of earthquake magnitudes in these data?</li>
      <li>Where do you see the largest earthquakes and the smallest earthquakes along the plate boundary?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What is the relationship between earthquake size (magnitude) and location over time along this divergent plate boundary from 2013-14? </li>
      <li>What is your evidence of the relationship?</li>
      <li>How does this relationship support, or lack of relationship challenge, what you previously knew about features at divergent plate boundaries?</li>
      <li>What questions do you still have about features at divergent plate boundaries?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application2'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what geographic area are you able to observe earthquake data in this map? </li>
      <li>What is the range of earthquake magnitudes in these data?</li>
      <li>Where do you see the largest earthquakes and the smallest earthquakes along the plate boundary?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What is the relationship between earthquake size (magnitude) and location over time along this transform plate boundary in May 2015? </li>
      <li>What is your evidence of the relationship?</li>
      <li>How does this relationship support, or lack of relationship challenge, what you previously knew about features at transform plate boundaries?</li>
      <li>What questions do you still have about features at transform plate boundaries?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('images_json/geology1.json');  
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
<p>Data for this activity were retrieved from the <a href="https://earthquake.usgs.gov/earthquakes/map/">USGS Earthquake Catalog</a>.</p>  


<?php if ($level=='exploration'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo1e" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application1'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo1a1" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application2'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo1a2" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Help students understand features of transform and divergent plate boundaries by working with earthquake data along the intersection of the Pacific and Juan de Fuca plates</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Use earthquake data from plate boundaries in ocean regions off of the Pacific Northwest to look if there are patterns between 2010-17.</p>
      </a>
      <a href="activity1.php?level=application1" class="list-group-item">
        <h4 class="list-group-item-heading">Application #1 - Divergent Boundary</h4>
        <p class="list-group-item-text">Use earthquake data from a divergent plate boundaries in ocean regions off of the Pacific Northwest to determine what relationships of earthquakes along the boundary over time.</p>
      </a>
      <a href="activity1.php?level=application2" class="list-group-item">
        <h4 class="list-group-item-heading">Application #2 - Transform Boundary</h4>
        <p class="list-group-item-text">Use earthquake data from a transform plate boundaries in ocean regions off of the Pacific Northwest to determine what relationships of earthquakes along the boundary over time.</p>
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
