<?php 
  $lesson_title = 'Primary Production Variables';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  include_once('header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="productivity_index.php">Exploring Primary Productivity with Data</a></li>
  <li><a href="productivity1.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What can we observe in the different kinds of data we collect about primary production?</p>
<?php elseif ($level=='concept_invention'): ?>
<p>What happens to primary production over a year?</p>
<?php elseif ($level=='application'): ?>
<p>What is the relationship between chlorophyll-a concentration and colored dissolved organic matter (<a href="http://www.serc.si.edu/labs/phytoplankton/primer/components_cdom.aspx">CDOM</a>)? How does that relate to what you know about primary production?</p>
<?php endif; ?>


<!--
1.	Similar layout to original (http://education.oceanobservatories.org/productivity/activity1.php), except remove Total Volume Scattering Coefficient as a variable and make it so you can turn CDOM off. Can we make it so that the chlorophyll is the data that automatically populates, but that they could turn it off if they wanted?

2. Similar layout to original (http://education.oceanobservatories.org/productivity/activity1.php), except remove Total Volume Scattering Coefficient as a variable and make it so you can turn CDOM off. Can we make it so that the chlorophyll is the data that automatically populates, but that they could turn it off if they wanted?

3.	Similar layout to original (http://education.oceanobservatories.org/productivity/activity1.php, but the only variables should be chlorophyll-a concentration and CDOM which will automatically be populated in the figure. The user can select between the two variables to plot either independently or them both together.
-->

<div id="chart" style="width:800px; height: 400px;"></div>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>
  
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <select class="form-control" onchange="change_var2(this)">
      <option value="1">Colored Dissolved Organic Matter (CDOM)</option>
      <option value="2">Total Volume Scattering Coefficient (TVSC)</option>
      <option value="3">Optical Backscatter (OBS)</option>
      <option value="4">Total Scattering Coefficient of Pure Seawater (TSCPS)</option>
    </select>
  </div>
</div>

<?php 
  $scripts[] = "js/dygraph-combined-dev.js";
  $scripts[] = "js/activity1.js";
?>  


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore different data variables collected for primary production measurements by looking at 3-wavelength fluorometer data from the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>) to see what you can observe.</p>

<p><strong>Data Hint:</strong> Select another variable (in addition to the blue plotted Chlorophyll-a Concentration data) to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>

<p>Look for patterns in how the chlorophyll-a concentration, colored dissolved organic matter (<a href="http://www.serc.si.edu/labs/phytoplankton/primer/components_cdom.aspx">CDOM</a>), and/or <a href="http://www.interactiveoceans.washington.edu/story/Optical_Backscatter_Sensor_V14">optical backscatter</a> data varies over a year in the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<p><strong>Data Hint:</strong> Select another variable (in addition to the blue plotted Chlorophyll-a Concentration data) to explore the data in ways to investigate the different variables of primary production. Zoom in and out of the data to look at different time scales to investigate patterns across the year.</p>

<?php elseif ($level=='application'): ?>

<p >Explore the chlorophyll-a concentration and CDOM data to determine if there is a relationship over time in the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<p><strong>Data Hint:</strong> Select CDOM (in addition to the blue plotted Chlorophyll-a Concentration data) to explore relationships and patterns in the data. Zoom in and out of the data to look at different time scales to see if it changes the relationships or patterns you observe.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you find interesting about what you observed in the data about primary production?</li>
  <li>Did you observe any patterns? If so, what were the patterns and for which variables?</li>
  <li>What questions do you still have about data used to look at primary production?</li>
</ol>

<?php elseif ($level=='concept_invention'): ?>

<ol>
  <li>How did the chlorophyll-a concentration vary over time? OR How did the CDOM vary over time? OR How did the optical backscatter vary over time?</li>
  <li>What is your evidence for the pattern, which you observed, in the data over time?</li>
  <li>What questions do you still have about patterns in primary production over time?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>Is there a relationship between chlorophyll-a concentration and CDOM? 
    <ol type="a">
      <li>If so, explain what kind of relationship is it? Why do you think that relationship exists between chlorophyll-a concentration and CDOM?</li>
      <li>If not, why do you think there is no relationship between chlorophyll-a concentration and CDOM?</li>
    </ol>
  </li>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about primary production?</li>
  <li>What questions do you still have about primary production?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('productivity/images_json/productivity1.json');
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="productivity/images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="productivity/images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>

<p style="text-align: right;">Finished the activity?  Please take our quick <a href="index.php" class="btn btn-sm btn-warning">Student Survey</a></p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore different kinds of variables that are collected to measure primary production.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="productivity1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe in the different kinds of data we collect about primary production?</p>
      </a>
      <a href="productivity1.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What happens to primary production over a year?</p>
      </a>
      <a href="productivity1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">What is the relationship between chlorophyll-a concentration and colored dissolved organic matter (CDOM)? How does that relate to what you know about primary production?</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="Learning%20Cycle.png" alt="Learning%20Cycle" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('footer.php'); 
?>