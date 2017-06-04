<?php 
  $lesson_title = 'Vent Video Frames';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Tectonics & Seamounts</a></li>
  <li><a href="activity5.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the June 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('scene1','scene7','combined'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<p>How do vent chimneys change over time?</p>


<!-- DATA CHART -->
<div style="margin-top: 12px; width: 640px;">
  <div style="float: left; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
    <span class="glyphicon glyphicon-chevron-left" onClick="sliderSubtract()"></span>
  </div>
  <div style="float: right; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
    <span class="glyphicon glyphicon-chevron-right" onClick="sliderAdd()"></span>
  </div>
  <div style="float: left; width: 490px; font-size: 12px;">
    <div id="image-slider" style="margin-bottom: 6px; margin-top: 6px"></div>
    <span id="image-slider-left" style="float: left;"></span>
    <span id="image-slider-right" style="float: right;"></span>
  </div>
</div>
<div class="clearfix"></div>

<h3>Challenge Question</h3>
<?php if ($level=='scene1'): ?>
<img id="slider-image" data-directory="scene1">
<?php elseif ($level=='scene7'): ?>
<img id="slider-image" data-directory="scene7">
<?php elseif ($level=='combined'): ?>
<img id="slider-image" data-directory="scene_combined">
<?php endif; ?>

<script charset="utf-8" src="../js/d3.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "javascript/geology5.js";
?> 


<!--
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
-->



<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore video frames to observe hydrothermal vent changes over time</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity5.php?level=scene1" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration - Scene 1</h4>
        <p class="list-group-item-text">How do vent chimneys change over time?</p>
      </a>
      <a href="activity5.php?level=scene7" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration - Scene 7</h4>
        <p class="list-group-item-text">How do vent chimneys change over time?</p>
      </a>
      <a href="activity5.php?level=combined" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration - Combined Scene</h4>
        <p class="list-group-item-text">How do vent chimneys change over time?</p>
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
