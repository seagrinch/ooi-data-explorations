<?php 
  $lesson_title = 'Processes that Change Salinity';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Chemistry</a></li>
  <li><a href="activity2.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What changes in the surface ocean as salinity changes over time?</p>
<?php elseif ($level=='application'): ?>
<p>Does salinity change over time in the surface ocean? Why?</p>
<?php endif; ?>


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include datasets:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
    Air Temperature</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)" > 
    Sea Surface Temperature</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)" > 
    Salinity</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="3" onclick="toggle_visibility(this)" > 
    Rain Rate</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chemistry2e.js";
?>  
<p class="text-right"><a href="data/chemistry2e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>
<p class="text-right"><a href="data/chemistry2a.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
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
  <li>What did you learn about changes in other variables as salinity changes?</li>
  <li>What questions do you still have about what drives changes in salinity in the surface ocean over time?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>What did you find from the data about the influence of precipitation on surface ocean salinity over time?</li>
  <li>What did you find from the data about the influence of evaporation on surface ocean salinity over time?</li>
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
      <a href="activity2.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What changes in the surface ocean as salinity changes over time?</p>
      </a>
      <a href="activity2.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Does salinity change over time in the surface ocean? Why?</p>
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
