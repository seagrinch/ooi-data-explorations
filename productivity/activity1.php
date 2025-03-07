<?php 
  $lesson_title = 'Primary Production Variables';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Primary Production</a></li>
  <li><a href="activity1.php"><?= $lesson_title ?></a></li>
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


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>

<?php if ($level=='application'): ?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
      Chlorophyll-a</label><br>
    <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)" checked> 
      Colored Dissolved Organic Matter (CDOM)</label><br>      
  </div>
</div>

<?php else: ?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include Chlorophyll?</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
      Chlorophyll-a</label>
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)" checked> 
      Colored Dissolved Organic Matter (CDOM)</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)" > 
      Optical Backscatter (OBS)</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)" > 
      Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="4" onclick="toggle_radio(this)" > 
      Salinity</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(this)" > 
      None</label>
  </div>
</div>

<?php endif; ?>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/productivity1.js";
?>  

<p class="text-right"><a href="data/productivity1.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore different data variables collected for primary production measurements by looking at 3-wavelength fluorometer data from the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>) to see what you can observe.</p>

<p><strong>Data Tip:</strong> Select another variable (in addition to the blue plotted Chlorophyll-a Concentration data) to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>

<p>Look for patterns in how the chlorophyll-a concentration, colored dissolved organic matter (<a href="http://www.serc.si.edu/labs/phytoplankton/primer/components_cdom.aspx">CDOM</a>), and/or <a href="http://www.interactiveoceans.washington.edu/story/Optical_Backscatter_Sensor_V14">optical backscatter</a> data varies over a year in the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<p><strong>Data Tip:</strong> Select another variable (in addition to the blue plotted Chlorophyll-a Concentration data) to explore the data in ways to investigate the different variables of primary production. Zoom in and out of the data to look at different time scales to investigate patterns across the year.</p>

<?php elseif ($level=='application'): ?>

<p >Explore the chlorophyll-a concentration and CDOM data to determine if there is a relationship over time in the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<p><strong>Data Tip:</strong> Select CDOM (in addition to the blue plotted Chlorophyll-a Concentration data) to explore relationships and patterns in the data. Zoom in and out of the data to look at different time scales to see if it changes the relationships or patterns you observe.</p>

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
  $json_file = file_get_contents('images_json/productivity1.json');
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


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
      <a href="activity1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe in the different kinds of data we collect about primary production?</p>
      </a>
      <a href="activity1.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What happens to primary production over a year?</p>
      </a>
      <a href="activity1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">What is the relationship between chlorophyll-a concentration and colored dissolved organic matter (CDOM)? How does that relate to what you know about primary production?</p>
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