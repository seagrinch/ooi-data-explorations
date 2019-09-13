<?php 
  $lesson_title = 'Chlorophyll-a in upwelling vs. stratified temperate regions';
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
  <li><a href="chlorophyll.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>What trends do you observe as primary productivity, temperature, salinity, and dissolved oxygen varies over time in the North Pacific Ocean?</p>
<p>Look for patterns in how the chlorophyll-a concentration, temperature, salinity, and/or oxygen data varies over time in the Northern Pacific Ocean (Coastal Endurance Array).</p>

<?php elseif ($level=='application'): ?>
<p>How does primary productivity, temperature, salinity and dissolved oxygen in the North Pacific Ocean Compare to the North Atlantic Ocean?</p>
<p>Compare patterns in chlorophyll-a concentration, salinity, and/or oxygen data between the Northern Pacific Ocean (Coastal Endurance Array) and the Northern Atlantic Ocean (Coastal Pioneer Array). Make a prediction for temperature in the Northern Atlantic Ocean by drawing your own lines on the graph.</p>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include Chlorophyll-a?</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="chlorophyll" onclick="toggle_chl(this)" checked> 
      Chlorophyll-a</label>
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a second parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)" > 
      Dissolved Oxygen</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)" > 
      Sea Surface Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)" > 
      Salinity</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(this)" checked> 
      None</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chlorophyll_exploration.js";
?>  

<?php elseif ($level=='application'): ?>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
  #chart .dygraph-axis-label-y2 {color:#fff;}
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include Chlorophyll-a?</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="chlorophyll" onclick="toggle_lines()" checked> 
      Chlorophyll-a</label>
  </div>
</div>
<div class="row">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="do" onclick="toggle_lines()" > 
      Dissolved Oxygen</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="sst" onclick="toggle_lines()" > 
      Sea Surface Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="salinity" onclick="toggle_lines()" > 
      Salinity</label><br>
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
      Coastal Endurance - Oregon Offshore Surface Mooring)</label><br>
    <label style="font-weight: normal;"><input type="checkbox" id="CP" onclick="toggle_lines()" checked> 
      Coastal Pioneer - Offshore Surface Mooring</label><br>
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/chlorophyll_application.js";
?>  

<?php endif; ?>

<p class="text-right"><a href="data/chlorophyll.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>Select another variable (in addition to the green plotted Chlorophyll-a Concentration data) to explore the data in ways to investigate the different variables of primary production. Zoom in and out of the data to look at different time scales to investigate patterns across the year.</p>

<?php elseif ($level=='application'): ?>
<p>Select the different locations to explore relationships and patterns in the data. Start by comparing each of the same variables at the two locations before looking at multiples. Zoom in and out of the data to look at different time scales across time to see if it changes the relationships or patterns you observe.</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li></li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What is the data range and units for Chlorophyll a on the y-axis?</li>
      <li>What changes or patterns did you observe at the surface in other variables (temperature, salinity, and dissolved oxygen) as chlorophyll changes over this time period off of Oregon?</li>
      <li>When (which months on the x-axis) did you see these changes or patterns taking place?</li>
      <li>What questions do you still have about what drives changes in chlorophyll (PP) at the ocean surface over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li></li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>How does chl in the North Pacific compare to the North Atlantic in the summer and fall?</li>
      <li>How do the non-chl water characteristics in the North Pacific compare to the North Atlantic in the summer and fall?</li>
      <li>What are your predictions for temperature during this time period in the North Atlantic?</li>
      <li>What questions do you still have about what drives changes in chl (PP) at the ocean surface over time?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/chlorophyll.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_chlorophyll/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_chlorophyll/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_chlorophyll/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p>The data for this activity was obtained from the following instruments:</p>
<ul>
  <li>Coastal Endurance <a href="https://oceanobservatories.org/site/CE04OSSM/">Oregon Offshore Surface Mooring</a>
    <ul>
      <li><a href="https://oceanobservatories.org/instrument-class/do2/">Dissolved Oxygen</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE04OSSM-RID27-04-DOSTAD000">CE04OSSM-RID27-04-DOSTAD000</a>)</li>
      <li><a href="https://oceanobservatories.org/instrument-class/FLUOR/">3-Wavelength Fluorometer</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE04OSSM-RID27-02-FLORTD000">CE04OSSM-RID27-02-FLORTD000</a>)</li>
    </ul>
  </li>
  <?php if ($level=='application'): ?>
  <li>Coastal Pioneer <a href="https://oceanobservatories.org/site/CP04OSSM/">Offshore Surface Mooring</a>
    <ul>
      <li><a href="https://oceanobservatories.org/instrument-class/do2/">Dissolved Oxygen</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP04OSSM-RID27-04-DOSTAD000">CP04OSSM-RID27-04-DOSTAD000</a>)</li>
      <li><a href="https://oceanobservatories.org/instrument-class/FLUOR/">3-Wavelength Fluorometer</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP04OSSM-RID27-02-FLORTD000">CP04OSSM-RID27-02-FLORTD000</a>)</li>
    </ul>
  </li>
  <?php endif; ?>
</ul>

<p>Recovered datasets were downloaded from the OOI data portal, and then daily mean averages were calculated and merged together into a single file for use in this activity.</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/June2019/DL_June_Chlorophyll_v1.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore seawater characteristics that are correlated with changes in primary productivity, particularly during the summer in the North Pacific vs. the North Atlantic.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="chlorophyll.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What trends do you observe as primary productivity, temperature, salinity, and dissolved oxygen varies over time in the North Pacific Ocean?</p>
      </a>
      <a href="chlorophyll.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does primary productivity, temperature, salinity and dissolved oxygen in the North Pacific Ocean Compare to the North Atlantic Ocean?</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_EA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="chlorophyll_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Baker, K., Condie, C., Ellis, R., Petrik, C., &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
