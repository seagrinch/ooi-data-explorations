<?php 
  $lesson_title = 'Vent Video Frames';
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
  <li><a href="activity5.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('scene1','scene7','combined'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='scene1'): ?>
<p>Use still images from a hydrothermal vent chimney at Axial Seamount to look if there are patterns over a year.</p>
<ul>
  <li>Make a prediction about what kind of patterns in shape and size of the vent chimney, and the organisms living around it, you may observe over time on an active vent.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='scene7'): ?>
<p>Use still images from a hydrothermal vent chimney at Axial Seamount to look if there are patterns over a year.</p>
<ul>
  <li>Make a prediction about what kind of patterns in shape and size of the vent chimney, and the organisms living around it, you may observe over time on an active vent.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='combined'): ?>
<p>Use still images from two locations on a hydrothermal vent chimney at Axial Seamount to look if there are patterns over a year.</p>
<ul>
  <li>Make a prediction about what kind of patterns in shape and size of the vent chimney, and the organisms living around it, you may observe over time on an active vent.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php endif; ?>


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


<h3>Data Tips</h3>

<?php if ($level=='scene1'): ?>
<p>When the site loads, you are able to see an image from November 20, 2015 from the Scene 1 camera. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the slider above the image to the right or left (or by using the right and left arrows).</li>
</ul>
<p>Note, if you are interested in knowing what you are looking at check out the <a href="http://www.interactiveoceans.washington.edu/story/Biology_at_Axial_Seamount">List of Organisms at Hydrothermal Vents</a>.</p>

<?php elseif ($level=='scene7'): ?>
<p>When the site loads, you are able to see an image from November 20, 2015 from the Scene 7 camera. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the slider above the image to the right or left (or by using the right and left arrows).</li>
</ul>
<p>Note, if you are interested in knowing what you are looking at check out the <a href="http://www.interactiveoceans.washington.edu/story/Biology_at_Axial_Seamount">List of Organisms at Hydrothermal Vents</a>.</p>

<?php elseif ($level=='combined'): ?>
<p>When the site loads, you are able to see an image from November 20, 2015 from the Scene 1 & 7 cameras. You can interact with the data by:</p>
<ul>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the slider above the image to the right or left (or by using the right and left arrows).</li>
</ul>
<p>Note, if you are interested in knowing what you are looking at check out the <a href="http://www.interactiveoceans.washington.edu/story/Biology_at_Axial_Seamount">List of Organisms at Hydrothermal Vents</a>.</p>

<?php endif; ?>


<!--
<h3>Questions for Thought</h3>

<?php if ($level=='scene1'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</div>

<?php elseif ($level=='scene7'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</div>

<?php elseif ($level=='combined'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</div>

<?php endif; ?>
-->


<!--
<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
-->


<!--
<h4>Dataset Information</h4>
<p>Information</p>
-->


<?php if ($level=='scene1'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo5scene1" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='scene7'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo5scene7" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='combined'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo5combined" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


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
        <p class="list-group-item-text">Use still images from a hydrothermal vent chimney at Axial Seamount to look if there are patterns over a year.</p>
      </a>
      <a href="activity5.php?level=scene7" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration - Scene 7</h4>
        <p class="list-group-item-text">Use still images from a hydrothermal vent chimney at Axial Seamount to look if there are patterns over a year.</p>
      </a>
      <a href="activity5.php?level=combined" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration - Combined Scene</h4>
        <p class="list-group-item-text">Use still images from two locations on a hydrothermal vent chimney at Axial Seamount to look if there are patterns over a year.</p>
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
