<?php 
  $lesson_title = 'Seasonal Variation of Surface Salinity';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Properties of Seawater</a></li>
  <li><a href="activity1.php"><?= $lesson_title ?></a></li>
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
<p>Make a prediction about what kind of changes or patterns in salinity you could observe over a year.</p>
<?php elseif ($level=='application'): ?>
<p>Make a prediction about what kinds of changes or patterns in salinity over time you could observe across different parts of the ocean.</p>
<?php endif; ?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Explore salinity data across different time periods from the Northern Pacific Ocean (Coastal Endurance Array) to see what you can observe.</p>

<?php elseif ($level=='application'): ?>
<p>Compare patterns in salinity data across different time periods to determine if there are relationships over time across different regions of the ocean.</p>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a season to zoom to see:</p>
  </div>
  <div class="col-xs-9">
  <p>
    <button class="btn btn-primary btn-sm" onclick="date_button('year')">Full Year</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('summer')">Summer</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('fall')">Fall</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('winter')">Winter</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('spring');">Spring</button>
  </p>
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chemistry1e.js";
?>  
<p class="text-right"><a href="data/chemistry1e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a season to zoom to see:</p>
  </div>
  <div class="col-xs-9">
  <p>
    <button class="btn btn-primary btn-sm" onclick="date_button('year')">Full Year</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('spring');">Spring</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('summer')">Summer</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('fall')">Fall</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('winter')">Winter</button>
  </p>
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Choose a dataset: </p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(1)" checked>
    Inshore vs. Offshore (Pacific Ocean off of the Oregon coast)</label>
  <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(2)"> 
    Coastal Pacific vs. Coastal Mid-Atlantic</label><br>
  <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(3)"> 
    Northern vs. Southern Atlantic Ocean</label>
<!--
  <br>
  <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(0)"> 
    Show All</label>
-->
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chemistry1a.js";
?>  
<p class="text-right"><a href="data/chemistry1a.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the full dataset of salinity data from the Coastal Endurance's Near Shelf Surface Mooring. You can interact with the data by:</p>
<ul>
  <li>Selecting a shorter or different time period to explore the data in ways that interest you.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to see the full dataset of salinity data from the Inshore and Offshore sites of the Coastal Endurance. You can interact with the data by:</p>
<ul>
  <li>Selecting which regional comparison you are interested in looking at: Inshore vs. Offshore, Atlantic vs. Pacific, or Northern near-polar vs. Southern temperate.</li>
  <li>Selecting a shorter or different time period to explore the data in ways to investigate your Challenge.</li>
  <li>Zooming in and out of the data to look at different time scales to investigate your Challenge by changing the width of the highlighted section of the bottom graph.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>
<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time periods are you able to observe salinity data in this graph? </li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in salinity over this time period in the Northern Pacific Ocean? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about why salinity changes over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>For each regional comparison, across what time periods are you able to observe salinity data in this graph?</li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data? </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What similarities and differences did you find in patterns of salinity over time:
        <ul>
          <li>Between inshore and offshore locations on shelf in temperate North Pacific Ocean locations?</li>
          <li>Between the Atlantic vs. Pacific Ocean in temperate northern hemisphere locations?</li>
          <li>Between Northern near-polar vs. Southern temperate in the Atlantic Ocean locations?</li>
        </ul>
      </li>
      <li>What other questions do you have about variations in patterns of salinity over time across different parts of the ocean from these data?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/chemistry1e.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/chemistry1a.json');
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

<p>The data for this activity was obtained from the following CTD instrument:</p>
<ul>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE07SHSM/">Washington Shelf Surface Mooring</a> @ 7m (<a href="https://ooinet.oceanobservatories.org/plot/#CE07SHSM-RID27-03-CTDBPC000/telemetered_ctdbp-cdef-dcl-instrument">CE07SHSM-RID27-03-CTDBPC000</a>)</li>
</ul>
<p class="text-center"><a href="data/chemistry1e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>

<p>The data for this activity was obtained from the following CTD instruments:</p>
<ul>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE07SHSM/">Washington Shelf Surface Mooring</a> @ 7m (<a href="https://ooinet.oceanobservatories.org/plot/#CE07SHSM-RID27-03-CTDBPC000/telemetered_ctdbp-cdef-dcl-instrument">CE07SHSM-RID27-03-CTDBPC000</a>)</li>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE01ISSM/">Oregon Inshore Surface Mooring</a> @ 7m (<a href="https://ooinet.oceanobservatories.org/plot/#CE01ISSM-RID16-03-CTDBPC000/recovered-inst_ctdbp-cdef-instrument-recovered">CE01ISSM-RID16-03-CTDBPC000</a>)</li>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE02SHSM/">Oregon Shelf Surface Mooring</a> @ 7m (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-RID27-03-CTDBPC000/telemetered_ctdbp-cdef-dcl-instrument">CE02SHSM-RID27-03-CTDBPC000</a>)</li>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP03ISSM/">Inshore Surface Mooring</a> @ 7m (<a href="https://ooinet.oceanobservatories.org/plot/#CP03ISSM-RID27-03-CTDBPC000/telemetered_ctdbp-cdef-dcl-instrument">CP03ISSM-RID27-03-CTDBPC000</a>)</li>
  <li>Global Argentine Basin, <a href="http://oceanobservatories.org/site/GA01SUMO/">Apex Surface Mooring</a> @ 12m (<a href="https://ooinet.oceanobservatories.org/plot/#GA01SUMO-RID16-03-CTDBPF000/recovered-inst_ctdbp-cdef-instrument-recovered">GA01SUMO-RID16-03-CTDBPF000</a>)</li>
  <li>Global Irminger Sea, <a href="http://oceanobservatories.org/site/GI03FLMA/">Flanking Subsurface Mooring A</a> @ 30 m (<a href="https://ooinet.oceanobservatories.org/plot/#GI03FLMA-RIM01-02-CTDMOG040/recovered-inst_ctdmo-ghqr-instrument-recovered">GI03FLMA-RIM01-02-CTDMOG040</a>)</li>
</ul>
<p class="text-center"><a href="data/chemistry1a.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php endif; ?>

<p>The above datasets were downloaded from the OOI data portal, and then down-sampled to hourly intervals.  The data presented are from the raw record, that is, they are instantaneous measurements that have not been averaged because that would smooth out the variability in the dataset.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in how surface salinity changes over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>This activity has the following variations:</p>
    <div class="list-group">
      <a href="activity1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Make a prediction about what kind of changes or patterns in salinity you could observe over a year.</p>
      </a>
      <a href="activity1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Make a prediction about what kinds of changes or patterns in salinity over time you could observe across different parts of the ocean.</p>
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
