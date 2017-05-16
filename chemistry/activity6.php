<?php 
  $lesson_title = 'Halocline';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Chemistry</a></li>
  <li><a href="activity6.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What kind of changes or patterns in the location of the halocline do you observe over the summer?</p>
<?php elseif ($level=='application'): ?>
<p>How do patterns of the location of the halocline vary across the ocean?</p>
<?php endif; ?>


<!-- DATA CHART -->
<div class="row">
  <div class="col-md-6">

<div id="chart"></div>
    
  </div>
  <div class="col-md-6">

<?php if ($level=='exploration'): ?>
<?php elseif ($level=='application'): ?>
<p class="text-center">Select a Site:
<select name="dataset" onchange="updateGraph(this.value)">
  <option value="CP02PMCI">CP02PMCI</option>
  <option value="CP02PMCO">CP02PMCO</option>
  <option value="GI02HYPM">GI02HYPM</option>
</select>
</p>
<?php endif; ?>

<div style="margin-top: 12px; width: 400px;">
  <div style="float: left; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
    <span class="glyphicon glyphicon-chevron-left" onClick="sliderSubtract()"></span>
  </div>
  <div style="float: right; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
    <span class="glyphicon glyphicon-chevron-right" onClick="sliderAdd()"></span>
  </div>
  <div style="float: left; width: 250px; font-size: 12px;">
    <div id="profile-slider" style="margin-bottom: 6px; margin-top: 0px"></div>
    <span id="profile-slider-left" style="float: left;"></span>
    <span id="profile-slider-right" style="float: right;"></span>
  </div>
  <p class="text-center small">
    <label for="show_all" style="font-weight: normal;"><input type="checkbox" id="show_all" onClick="showAll()"> Show All Profiles</label> <br>
    <label for="show_context" style="font-weight: normal;"><input type="checkbox" id="show_context" onClick="showContext()"> Show Context</label>
  </p>
</div>
    
  </div>
</div>

<script charset="utf-8" src="../js/d3.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "../js/colorbrewer.js";
  $scripts[] = "javascript/chemistry6.js";
?>  



<div style="clear:both"></div>

<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore data across different parts of the summer from the northern Atlantic Ocean (Coastal Pioneer Array) to see what you can observe about the halocline.</p>

<p><strong>Data Tip:</strong> Use the time slide to compare changes in the depth of the halocline over the summer. Select another time period to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='application'): ?>

<p>Compare patterns in halocline depth data during the summer to determine if there are relationships over time across different regions from the northern Atlantic Ocean (Coastal Endurance Array and Global Irminger Sea Array).</p>

<p><strong>Data Tip:</strong> Select another location to explore the data to find patterns in the halocline location. Zoom in and out of the data to look at different time scales that interest you. </p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you learn about the depth of the halocline over the summer?</li>
  <li>What questions do you still have about changes in the depth of the halocline over time?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>What similarities and differences did you find in patterns of changes in the depth of the halocline across the northern Atlantic Ocean?</li>
  <li>What can you conclude overall about patterns of changes in the depth of the halocline in the summer across the ocean from these data?</li>
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
<h2><?= $lesson_title ?><br><small>Explore different kinds of variables that are collected to measure ???</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity6.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What kind of changes or patterns in the location of the halocline do you observe over the summer?</p>
      </a>
      <a href="activity6.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How do patterns of the location of the halocline vary across the ocean?</p>
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
