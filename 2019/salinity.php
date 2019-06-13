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
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="salinity.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use sea surface salinity data from the North Pacific Ocean to identify patterns over time. 
Explore salinity data at one location over time.</p>

<?php elseif ($level=='invention'): ?>
<p>Use water and atmospheric conditions data at and above the ocean surface from the North Pacific Ocean to identify patterns in sea surface salinity.</p>
<ul>
  <li>Make predictions and formulate hypotheses about surface salinity changes and the drivers of these changes in one location.</li>
  <li>Use atmospheric and sea surface data to test predictions about sea surface salinity changes in this location.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Use water and atmospheric conditions data at and above the ocean surface across similar time periods from the North Pacific and North Atlantic Oceans to identify patterns.</p>
<ul>
  <li>Make predictions and formulate hypotheses about surface salinity at different locations.  Explain the drivers of these changes. </li>
  <li>Use atmospheric and sea surface data to test predictions about sea surface salinity variations between locations.</li>
</ul>

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
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include Salinity?</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="salinity" onclick="toggle_lines()" checked> 
      Salinity</label>
  </div>
</div>
<div class="row">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="airtemp" onclick="toggle_lines()" > 
      Air Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="sst" onclick="toggle_lines()" > 
      Sea Surface Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="rain" onclick="toggle_lines()" > 
      Rain</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_lines()" checked> 
      None</label>
  </div>
</div>
<div class="row">
  <div class="col-xs-3">
    <p class="text-right">Select locations:</p>
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
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted).</li>
</ul>

<?php elseif ($level=='invention'): ?>
<p>When the site loads, you are able to see the full salinity dataset from the Oregon Shelf Surface Buoy in the Coastal Endurance Array. You can interact with the data by:</p>
<ul>
  <li>Turning on and off different oceanic or atmospheric variables to compare their data to the salinity data.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted).</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to see the full salinity dataset from the Oregon Shelf Surface Buoy in the Coastal Endurance Array, the Pioneer Inshore Surface Mooring Buoy in the Coastal Pioneer Array, and the Apex Surface Mooring Surface Buoy in the Global Irminger Sea Array.. You can interact with the data by:</p>
<ul>
  <li>Turning on and off different oceanic or atmospheric variables to compare their data to the salinity data.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted).</li>
</ul>

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
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you look at in these graphs? </li>
      <li>Across what time periods are you able to observe oceanic or atmospheric variables in these graphs?</li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe at the surface in other variables as salinity changes over this time period off of Oregon?</li>
      <li>When did you see these changes or patterns?</li>
      <li>Describe how the different oceanic and atmospheric variables affect salinity levels at this location, i.e., identify any correlations/relationships between variables?</li>
      <li>Explain the reasons behind the relationships between the variables, if any.</li>
      <li>What questions do you still have about what drives changes in salinity at the ocean surface over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you look at in these graphs? </li>
      <li>Where are the locations? Find them on a map.</li>
      <li>Across what time periods are you able to observe oceanic or atmospheric variables in these graphs?</li>
      <li>What is the first month and year there are data?</li>
      <li>What is the last month and year there are data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe at the surface in other variables as salinity changes over this time period in each of the locations?</li>
      <li>When did you see these changes or patterns?</li>
      <li>What variations do you see between the different locations?</li>
      <li>What similarities do you see?</li>
      <li>Which characteristics appear to be correlated?</li>
      <li>Why do you think they are correlated?</li>
      <li>What questions do you still have about what drives changes in salinity at the ocean surface over time and location?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<p>TBD</p>

<h4>Dataset Information</h4>
<p>The data for this activity was obtained from the following instruments:</p>
<ul>
  <li>Coastal Endurance, <a href="http://oceanobservatories.org/site/CE02SHSM/">Oregon Shelf Surface Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-SBD11-06-METBKA000">CE02SHSM-SBD11-06-METBKA000</a>)</li>
  <?php if ($level=='application'): ?>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP03ISSM/"> Inshore Surface Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP03ISSM-SBD11-06-METBKA000">CP03ISSM-SBD11-06-METBKA000</a>)</li>
  <li>Global Irminger Sea, <a href="http://oceanobservatories.org/site/GI01SUMO/">Apex Surface Mooring</a> @ 7m (<a href="https://ooinet.oceanobservatories.org/plot/#GI01SUMO-SBD11-06-METBKA000">GI01SUMO-SBD11-06-METBKA000</a>)</li>
  <?php endif; ?>
</ul>

<p>The above datasets were downloaded from the OOI data portal, and then averaged to hourly intervals.</p>


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
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_ECA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="anoxia_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<p><strong>Citation:</strong> ??? &amp; Lichtenwalner, S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
