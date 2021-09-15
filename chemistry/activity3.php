<?php 
  $lesson_title = 'Changes in pH with Depth';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Properties of Seawater</a></li>
  <li><a href="activity3.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application','exploration21','application21'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>

<?php if (($level=='exploration') || ($level=='exploration21')): ?>
<p>Use pH data from the surface down to 200m from the North Pacific Ocean to look if there are patterns over a year.</p>
<ul>
  <li>Make a prediction about what kind of changes or patterns in pH with depth may observe over a year.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif (($level=='application') || ($level=='application21')): ?>
<p>Use pH with depth data to determine if there are relationships over time across different regions of the ocean.</p>
<ul>
  <li>Make a prediction about what kind of changes or patterns in pH with depth you may observe between two different parts of the ocean.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time and/or space.</li>
</ul> 

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart"></div>

<?php
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  if ($level=='exploration'):
    $scripts[] = "javascript/chemistry3e.js";
  elseif ($level=='exploration21'): 
    $scripts[] = "javascript/chemistry3e_2021.js";
  elseif ($level=='application'): 
    $scripts[] = "javascript/chemistry3a.js";
  elseif ($level=='application21'): 
    $scripts[] = "javascript/chemistry3a_2021.js";
?>  

<?php endif; ?>
<p>Zoom to: 
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(7)">1 week</button>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(14)">2 weeks</button>
  <button class="btn btn-primary btn-sm" onclick="graph_zoom(30)">1 month</button>
</p>


<h3>Data Tips</h3>

<?php if (($level=='exploration') || ($level=='exploration21')): ?>
<p>When the site loads, you are able to see pH data from the <strong>Oregon Offshore Profiler Mooring</strong> in the <strong>Coastal Endurance Array</strong>. You can interact with the data by:</p>

<?php elseif (($level=='application') || ($level=='application21')): ?>
<p>When the site loads, you are able to see pH data data from the <strong>Oregon Offshore</strong> (located in 580m of water) and the <strong>Oregon Slope Base</strong> (in 2,906m of water) both off of Oregon. You can interact with the data by: </p>

<?php endif; ?>

<ul>
  <li>Selecting a different amount of time to look at by choosing between, 1 week, 2 weeks, or 1 month. </li>
  <li>Selecting a different part of the year to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph to be more or less than a month.</li>
</ul>
<p>The color denotes the time of year the pH data are from. January starts as light purple/pink and December ends as dark blue/purple.</p>
<p>Note, not all of the data may be accurate, as the sensor can become biofouled over time or other sampling issues.</p>


<h3>Questions for Thought</h3>

<?php if (($level=='exploration') || ($level=='exploration21')): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time periods are you able to observe pH data in this graph?</li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
      <li>What is the overall range of pH data you are able to observe in this graph?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in pH with depth over this time period in the Northern Pacific Ocean? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about changes in pH from the surface to down in the water column over time?</li>
    </ul>
  </div>
</div>

<?php elseif (($level=='application') || ($level=='application21')): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time periods are you able to observe pH data in these graphs? </li>
      <li>What is the first month and year there are data for each graph?</li>
      <li>What is the last month and year there are data for each graph?</li>
      <li>What is the overall range of pH data you are able to observe in these graph? </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What similarities and differences did you find in patterns of pH with depth over time between Coastal Offshore and Shallow Slope locations in temperate North Pacific Ocean locations?</li>
      <li>What other questions do you have about variations in patterns of pH with depth over time and space from these data?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if (($level=='exploration') || ($level=='exploration21')) {
    $json_file = file_get_contents('images_json/chemistry3e.json');  
  } elseif (($level=='application') || ($level=='application21')) {
    $json_file = file_get_contents('images_json/chemistry3a.json');
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

<?php if (($level=='exploration') || ($level=='exploration21')): ?>

<p>The data for this activity was obtained from the following profiling pH instrument:</p>
<ul>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE04OSPS/">Oregon Offshore Cabled Shallow Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE04OSPS-SF01B-2B-PHSENA108/streamed_phsen-data-record">CE04OSPS-SF01B-2B-PHSENA108</a>)</li>
</ul>

<?php elseif (($level=='application') || ($level=='application21')): ?>

<p>The data for this activity was obtained from the following profiling pH instruments:</p>
<ul>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE04OSPS/">Oregon Offshore Cabled Shallow Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE04OSPS-SF01B-2B-PHSENA108/streamed_phsen-data-record">CE04OSPS-SF01B-2B-PHSENA108</a>)</li>
  <li>Cabled Array, <a href="http://oceanobservatories.org/site/RS01SBPS/">Oregon Slope Base Shallow Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#RS01SBPS-SF01A-2D-PHSENA101/streamed_phsen-data-record">RS01SBPS-SF01A-2D-PHSENA101</a>)</li>
</ul>

<?php endif; ?>

<?php if (($level=='exploration') || ($level=='application')): ?>
<p class="text-center"><a href="data/chemistry3.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<p>The above datasets were downloaded from the OOI data portal.  Complete profiles of the instrument were identified and the profile closest to midnight (GMT) each day was saved.  This reduced the overall temporal resolution (and size) of the final dataset but it preserved the raw variability exhibited in individual profiles and measurements.</p>

<?php elseif (($level=='exploration21') || ($level=='application21')): ?>
<p class="text-center"><a href="data/chemistry3_2021.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<p>The above datasets were downloaded from the OOI data portal with minimal editing.  This preserved the raw variability exhibited in individual profiles, though not all of the measurements may be accurate due to the complexity of measuring pH in the ocean.</p>

<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in how seawater pH changes with depth.</small></h2>
</div>

<div class="alert alert-info" role="alert">
  <p>This activity was updated in September 2021 with some new datasets from 2019.  The original versions with data from 2016 are also still available.</p>
</div>

<div class="row">
  <div class="col-md-6">
    <p>This activity has the following variations:</p>
    <div class="list-group">
      <a href="activity3.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration (2016 data)</h4>
        <p class="list-group-item-text">Use pH data from the surface down to 200m from the North Pacific Ocean to look if there are patterns over a year.</p>
      </a>
      <a href="activity3.php?level=exploration21" class="list-group-item">
        <h4 class="list-group-item-heading">New Exploration (2019 data)</h4>
        <p class="list-group-item-text">Use pH data from the surface down to 200m from the North Pacific Ocean to look if there are patterns over a year.</p>
      </a>
      <a href="activity3.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application (2016 data)</h4>
        <p class="list-group-item-text">Use pH with depth data to determine if there are relationships over time across different regions of the ocean.</p>
      </a>
      <a href="activity3.php?level=application21" class="list-group-item">
        <h4 class="list-group-item-heading">New Application (2019 data)</h4>
        <p class="list-group-item-text">Use pH with depth data to determine if there are relationships over time across different regions of the ocean.</p>
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
