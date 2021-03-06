<?php 
  $lesson_title = 'Changes in Salinity with Depth';
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
  <li><a href="activity5.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Use salinity data from the surface to 100m from the North Atlantic Ocean to look if there are patterns over time.</p>
<ul>
  <li>Make a prediction about what changes in salinity with depth you may observe over time at one location.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Use salinity with depth data to determine if there are relationships over time between two different regions of the North Atlantic Ocean.</p>
<ul>
  <li>Make a prediction about what changes in salinity with depth you may observe across different parts of the ocean.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time and/or space.</li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart"></div>
<div class="row">
  <div class="col-md-6">
    <p>Zoom to: 
      <button class="btn btn-primary btn-sm" onclick="graph_zoom(7)">1 week</button>
      <button class="btn btn-primary btn-sm" onclick="graph_zoom(14)">2 weeks</button>
      <button class="btn btn-primary btn-sm" onclick="graph_zoom(30)">1 month</button>
    </p>
  </div>
  <div class="col-md-6">
<?php if ($level=='application'): ?>
    <label style="font-weight: normal;"><input type="checkbox" onclick="match_salinity(this)"> 
      Match salinity limits</label> <br>
    <label style="font-weight: normal;"><input type="checkbox" onclick="match_depth(this)"> 
      Match depth limits</label>
<?php endif; ?>
  </div>
</div>

<?php if ($level=='exploration'): ?>
<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "javascript/chemistry5e.js";
?>  
<?php elseif ($level=='application'): ?>
<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "javascript/chemistry5a.js";
?>  
<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see daily profiles of salinity data from all of May 2015 from the Coastal Pioneer Array. You can interact with the data by:</p>
<ul>
  <li>Selecting a different amount of time to look at by choosing between, "1 week," "2 weeks," or "1 month." </li>
  <li>Selecting a different part of the year to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph to be more or less than a month.</li>
</ul>
<p>As a note, the color denotes the time of year the salinity data are from (light purple/pink are from May 2015 through blue/dark purple from February 2016).</p>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to see daily profiles of salinity data from the first two weeks of July 2015 from the Coastal Pioneer Array (Temperate Shelf) and the Global Irminger Sea Array (Polar Deep Basin) both in the North Atlantic Ocean. You can interact with the data by: </p>
<ul>
  <li>Selecting a different amount of time to look at by choosing between, "1 week," "2 weeks," or "1 month." </li>
  <li>Selecting a different part of the year to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph to be more or less than two weeks.</li>
  <li>Selecting to have the salinity or depth scales be the same across the two graphs, rather than determined by the available data (as it shows when the site loads).</li>
</ul>
<p>As a note, the color denotes the time of year the salinity data are from (pink are from May 2015 through dark purple from February 2016).</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time periods are you able to observe salinity with depth data in this graph? </li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
      <li>What is the overall range of salinity data you are able to observe in this graph?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in salinity with depth over this time period in the Northern Atlantic Ocean? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about changes in salinity from the surface to down in the water column over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What is the overall range of salinity data you are able to observe in each graph? </li>
      <li>What is the overall range of depth data you are able to observe in each graph?</li>
      <li>What is the overall time range are you able to observe in each graph? </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What similarities and differences did you find in patterns of salinity with depth over time between these Temperate Shelf and Polar Plain locations in the North Atlantic Ocean?</li>
      <li>What other questions do you have about differences in patterns in changes in salinity with depth across different parts of the ocean from these data?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/chemistry5e.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/chemistry5a.json');
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

<p>The data for this activity was obtained from the following profiling CTD instrument:</p>
<ul>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP02PMUI/">Upstream Inshore Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP02PMUI-WFP01-03-CTDPFK000/telemetered_ctdpf-ckl-wfp-instrument">CP02PMUI-WFP01-03-CTDPFK000</a>)</li>
</ul>
<p class="text-center"><a href="data/chemistry5_CP02PMUI.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>

<p>The data for this activity was obtained from the following profiling CTD instruments:</p>
<ul>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP02PMUI/">Upstream Inshore Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP02PMUI-WFP01-03-CTDPFK000/telemetered_ctdpf-ckl-wfp-instrument">CP02PMUI-WFP01-03-CTDPFK000</a>)</li>
  <li>Global Irminger Sea, <a href="http://oceanobservatories.org/site/GI02HYPM/">Apex Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#GI02HYPM-WFP02-04-CTDPFL000/recovered-wfp_ctdpf-ckl-wfp-instrument-recovered">GI02HYPM-WFP02-04-CTDPFL000</a>)</li>
</ul>
<p class="text-center">
  <a href="data/chemistry5_CP02PMUI.csv" class="btn btn-sm btn-primary">Download CP02PMUI</a>
  <a href="data/chemistry5_GI02HYPM.csv" class="btn btn-sm btn-primary">Download GI02HYPM</a>
</p>

<?php endif; ?>

<p>The above datasets were downloaded from the OOI data portal.  Complete profiles of the instrument were identified and the profile closest to midnight (GMT) each day was saved.  This reduced the overall temporal resolution (and size) of the final dataset but it preserved the raw variability exhibited in individual profiles and measurements.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in how salinity changes with depth over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>This activity has the following variations:</p>
    <div class="list-group">
      <a href="activity5.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Use salinity data from the surface to 100m from the North Atlantic Ocean to look if there are patterns over time.</p>
      </a>
      <a href="activity5.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Use salinity with depth data to determine if there are relationships over time between two different regions of the North Atlantic Ocean.</p>
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
