<?php 
  $lesson_title = 'Changes in Salinity with Depth';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Chemistry</a></li>
  <li><a href="activity5.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the May 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What kind of changes or patterns in salinity with depth do you observe over a year?</p>
<?php elseif ($level=='application'): ?>
<p>How do patterns of changes in salinity with depth vary across the ocean?</p>
<?php endif; ?>


<!-- DATA CHART -->
<div id="chart"></div>

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


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore data from the surface to XXm across different time periods from the northern Atlantic Ocean (Coastal Pioneer Array) to see what you can observe.</p>

<p><strong>Data Tip:</strong> Turn on and off different seasons to compare changes in salinity with depth over time. Select another time period to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='application'): ?>

<p>Compare patterns in salinity with depth data across different time periods to determine if there are relationships over time across different regions from the northern Atlantic Ocean.</p>

<p><strong>Data Tip:</strong> Select another time period to explore the data in ways to help you find the patterns. Zoom in and out of the data to look at different time scales that interest you. </p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you learn about changes in salinity over time?</li>
  <li>What questions do you still have about changes in salinity from the surface to down in the water column over time?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>What similarities and differences did you find in seasonal patterns in changes in salinity with depth across the northern Atlantic Ocean?</li>
  <li>What can you conclude overall about seasonal patterns in changes in salinity with depth across the ocean from these data?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>

<h4>Lesson Metadata</h4>
<?php if ($level=='exploration'): ?>
<p>Data for this activity was adapted from the following instrument:</p>
<?php elseif ($level=='application'): ?>
<p>Data for this activity were adapted from the following instruments:</p>
<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in how salinity changes with depth over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity5.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What kind of changes or patterns in salinity with depth do you observe over a year?</p>
      </a>
      <a href="activity5.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How do patterns of changes in salinity with depth vary across the ocean?</p>
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
