<?php 
  $lesson_title = 'Seasonal Salinity Variation';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Chemistry</a></li>
  <li><a href="activity1.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What kind of changes or patterns in salinity do you observe over a year?</p>
<?php elseif ($level=='application'): ?>
<p>How do seasonal patterns in salinity vary across the ocean?</p>
<?php endif; ?>


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>

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

<?php if ($level=='exploration'): ?>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chemistry1e.js";
?>  
<p class="text-right"><a href="data/chemistry1e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Choose a dataset: <br><small>Note, the graph will automatically zoom to the late summer season.</small></p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)">
    Inshore vs offshore coastal/Pacific Ocean (CE01ISSM vs. CE02SHSM)</label>
  <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)"> 
    Atlantic vs. Pacific coastal (CE07SHSM  vs. CP03ISSM)</label><br>
  <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)"> 
    Northern vs southern hemisphere/Atlantic Ocean (GA01SUMO vs. GI03FLMA)</label><br>
  <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(this)" checked> 
    Show All</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chemistry1a.js";
?>  
<p class="text-right"><a href="data/chemistry1a.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<?php endif; ?>




<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>...</p>

<p><strong>Data Tip:</strong> ...</p>

<?php elseif ($level=='application'): ?>

<p>...</p>

<p><strong>Data Tip:</strong> ...</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you learn about changes or patterns in salinity over a year?</li>
  <li>What questions do you still have about how or why salinity changes over a year?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>What similarities and differences did you find in seasonal patterns in salinity across the hemispheres?</li>
  <li>What similarities and differences did you find in seasonal patterns in salinity between the coastal ocean in the western Pacific and the eastern Atlantic?</li>
  <li>What similarities and differences did you find in seasonal patterns in salinity between inshore and offshore locations in the same region?</li>
  <li>What can you conclude overall about seasonal patterns in salinity across the ocean from these data?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>



<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore different kinds of variables that are collected to measure primary production</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What kind of changes or patterns in salinity do you observe over a year?</p>
      </a>
      <a href="activity1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How do seasonal patterns in salinity vary across the ocean?</p>
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