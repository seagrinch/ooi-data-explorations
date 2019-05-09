<?php 
  $lesson_title = 'Changes in Salinity';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">March 2019</a></li>
  <li><a href="salinity.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3 style="color:red;">This activity is under construction!</h3>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use sea surface salinity data from the North Pacific Ocean to identify patterns over time. 
Explore salinity data at one location over time.</p>

<?php elseif ($level=='invention'): ?>
<p>TBD</p>

<?php elseif ($level=='application'): ?>
<p>TBD</p>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
?>  

<?php if ($level=='exploration'): ?>
<?php 
  $scripts[] = "javascript/salinity_exploration.js";
?>  
<br>
<p class="text-right"><a href="data/salinity_ce02.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='invention'): ?>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include Salinity?</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
      Salinity</label>
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)" checked> 
      Air Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)" > 
      Sea Surface Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)" > 
      Rain</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(this)" > 
      None</label>
  </div>
</div>
<?php 
  $scripts[] = "javascript/salinity_invention.js";
?>  
<p class="text-right"><a href="data/salinity_ce02.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php elseif ($level=='application'): ?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a Measurement:</p>
  </div>
  <div class="col-xs-9">
    <select class="form-control" id="parameter" onchange="toggle_lines()">
      <option value="salinity">Salinity</option>
      <option value="airtemp">Air Temperature</option>
      <option value="sst">Sea Surface Temperature</option>
      <option value="rain">Rain</option>
    </select>
  </div>
</div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select Locations:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="CE" onclick="toggle_lines()" checked> 
    Inshore Pacific Ocean (Endurance Array - Oregon Shelf Surface Mooring)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="CP" onclick="toggle_lines()" checked> 
    Inshore Atlantic Ocean (Pioneer Array - Inshore Surface Mooring)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="GI" onclick="toggle_lines()" checked> 
    North Atlantic (Irminger Sea - Apex Surface Mooring)</label>
  </div>
</div>
<?php 
  $scripts[] = "javascript/salinity_application.js";
?>  

<p class="text-right"><a href="data/salinity_application.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the full salinity dataset from the Oregon Shelf Surface Buoy in the Coastal Endurance Array. You can interact with the data by:</p>
<ul>
  <li>Turning on and off different oceanic or atmospheric variables to compare their data to the salinity data.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted).</li>
</ul>
<?php elseif ($level=='invention'): ?>
<p>TBD</p>
<?php elseif ($level=='application'): ?>
<p>TBD</p>
<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What variable are you looking at in this graph? </li>
      <li>In what location was these data collected? </li>
      <li>Across what time periods are you able to observe this variable?</li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns in salinity did you observe at this location over time?</li>
      <li>When did you see these changes or patterns?</li>
      <li>What do you think might be driving these changes?</li>
      <li>What questions do you still have about changes in salinity at the ocean surface over time?</li>
    </ul>
  </div>
</div>
<?php elseif ($level=='invention'): ?>
<p>TBD</p>
<?php elseif ($level=='application'): ?>
<p>TBD</p>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<p>TBD</p>

<h4>Dataset Information</h4>
<p>TBD</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Processes that Change Salinity</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="salinity.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore changes in sea surface salinity over time.</p>
      </a>
      <a href="salinity.php?level=invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">Explore oceanic and atmospheric processes that are correlated with changes in salinity over time.</p>
      </a>
      <a href="salinity.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Explore seawater characteristics of processes that are correlated with changes in salinity over time, and over different locations.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_ECA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
