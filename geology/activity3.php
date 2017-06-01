<?php 
  $lesson_title = 'Seamount Diking-Eruption Event Science';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Geology</a></li>
  <li><a href="activity3.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>When do you think the next diking-eruption event could have occurred?</p>
<?php elseif ($level=='application'): ?>
<p>When do you think the next diking-eruption event could occur?</p>
<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-2">
    <p class="text-right"></p>
  </div>
  <div class="col-xs-5">
    <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)" checked> 
      Show Estimated Threshold</label>
  </div>
  <div class="col-xs-5">
    <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)"> 
      Show Actual Results</label>
  </div>
</div>
<p class="text-right"><a href="data/geology2e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/geology3e.js";
?>

<?php elseif ($level=='application'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right"></p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)" checked> 
      Show Estimated Threshold</label>
  </div>
</div>
<p class="text-right"><a href="data/geology2e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/geology3a.js";
?>

<?php endif; ?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Explore the changes in the depth of the seafloor data over time on the Axial Seamount in the Northern Pacific Ocean (Cabled Array) to make a prediction of when you think the next diking-eruption event could have occurred.</p>
<p><strong>Data Tip:</strong> Zoom in and out of the data to look at different time scales that interest you. Use your cursor to draw your prediction of when the next diking-eruption event will occur.</p>

<?php elseif ($level=='application'): ?>
<p>Explore the changes in the depth of the seafloor data over time on the Axial Seamount in the Northern Pacific Ocean (Cabled Array) to make a prediction of when you think the next diking-eruption event may occur.</p>
<p><strong>Data Tip:</strong> Zoom in and out of the data to look at different time scales that interest you. Use your cursor to draw your prediction of when the next diking-eruption event will occur.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>
<ol>
  <li>What did you find interesting in the seafloor depth data at the Axial Seamount from 1998 to 2012?</li>
  <li>Did you observe any patterns? If so, what was it/were they?  </li>
  <li>How did you use that pattern between 1998-2012 to make your prediction of when the next diking-eruption event could have occurred?</li>
  <li>What questions do you still have about how we infer patterns in diking-eruption event cycles to predict when the next diking-eruption event may occur?</li>
</ol>

<?php elseif ($level=='application'): ?>
<ol>
  <li>Is there a relationship between how much time has passed and an diking-eruption event occurring? 
  <ul>
    <li>If so, explain what kind of relationship is it and what your evidence for the relationship is. </li>
    <li>Why do you think that relationship exists between time and diking-eruption event occurrence?</li>
  </ul></li>
  <li>Is there a relationship between how much of a change in the depth of the seafloor over time and an diking-eruption event occurring? 
  <ul>
    <li>If so, explain what kind of relationship is it and what your evidence for the relationship is.</li>
    <li>Why do you think that relationship exists between depth of the seafloor and an diking-eruption event occurrence? </li>
  </ul></li>
  <li>When do you think the next seamount diking-eruption event will occur? 
  <ul>
    <li>What evidence did you use to make that prediction?</li>
    <li>What is your reasoning for choosing that time period?</li>
  </ul></li>
  <li>What questions do you still have about when diking-eruption events can occur and how we can predict when they may occur?</li>
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
      <a href="activity3.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">When do you think the next diking-eruption event could have occurred?</p>
      </a>
      <a href="activity3.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">When do you think the next diking-eruption event could occur?</p>
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
