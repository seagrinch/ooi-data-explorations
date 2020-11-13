<?php 
  $lesson_title = 'Impacts of Ocean Acidification on Shellfish in the Pacific Northwest';
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
  <li><a href="acidification.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>How do changing weather conditions and ocean circulation patterns affect ocean pH?</p>

<?php elseif ($level=='application'): ?>
<p>How does ocean pH affect survival of shellfish in hatcheries? Predict when coastal waters become harmful to shellfish.</p>

<?php endif; ?>


<!-- DATA CHART -->
<?php if ($level=='exploration'): ?>
<div id="chart1" style="width:800px; height: 190px;"></div>
<div id="chart2" style="width:800px; height: 160px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 160px; margin-top: 20px;"></div>
<div id="chart4" style="width:800px; height: 160px; margin-top: 20px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary disabled" id="prev" onclick="changeState('prev')">Previous</a></p>
  </div>
  <div class="col-md-8">
    <p id="btext" class="text-center">This pH data is from the subsurface (at 7m) at this location. Click next to add another dataset.</p>
  </div>
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary" id="next" onclick="changeState('next')">Next</a></p>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div id="chart1" style="width:800px; height: 190px;"></div>
<div id="chart2" style="width:800px; height: 160px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 160px; margin-top: 20px;"></div>
<div id="chart4" style="width:800px; height: 160px; margin-top: 20px;"></div>

<?php endif; ?>

<link rel="stylesheet" href="../js/dygraph-2.1.0/dygraph.css" />
<style type="text/css">
.dygraph-legend {
  left: 544px !important;
}
</style>
<?php 
  $scripts[] = "../js/dygraph-2.1.0/dygraph.js";
  $scripts[] = "../js/dygraph-2.1.0/synchronizer.js";
  if ($level=='exploration') {
    $scripts[] = "javascript/acidification_exploration.js";    
  }
  elseif ($level=='application') {
    $scripts[] = "javascript/acidification_application.js";    
  }
?>  


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>Datasets for this activity come from the Coastal Endurance Array Oregon Shelf Surface Buoy and Oregon Inshore Surface Mooring(see dataset section below for details about these locations and instruments).You can interact with the data by:</p>
<ul>
  <li>By clicking on the Next button you can add more data sets.</li>
  <li>Examine the different data sets to see if they have similar patterns.</li>
  <li>Zoom in and out to see if changes in one type of data correlate with changes in another, or if there is a lag between the two. You can zoom by grabbing the sliders on the graph underneath the pH graph, or by clicking and dragging sliders on any of the subsequent graphs of pCO<sub>2</sub>, temperature or wind speed.</li>
  <li>Note that the wind data shows only that part of the wind parallel to shore. Positive values indicate wind blowing to the north, negative values to the south</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Datasets for this activity come from the Coastal Endurance Array Oregon Shelf Surface Buoy and Oregon Inshore Surface Mooring (see background section below for details about these locations and instruments).You can interact with the data by:</p>
<ul>
  <li>Examine the different data sets to see if they have similar patterns.</li>
  <li>Zoom in and out to see if changes in one type of data correlate with changes in another, or if there is a lag between the two. You can zoom by grabbing the sliders on the graph underneath the pH graph, or by clicking and dragging sliders on any of the subsequent graphs of pCO<sub>2</sub>, temperature or wind speed.</li>
  <li>Note that the wind data shows only that part of the wind parallel to shore. Positive values indicate wind blowing to the north, negative values to the south</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>List the variables displayed in these graphs.</li>
      <li>Describe the location where this data was collected.</li>
      <li>Across what time period were the data collected?</li>
      <li>What was the lowest pH value observed? When was it observed?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>Examine each data set (pH, seawater pCO<sub>2</sub>, temperature and wind direction) and explore how it changes through time. What patterns do you see for each individual data set over the course of a month?</li>
      <li>Do you see any similarities or differences in how these data vary?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Zoom into May - July 2017. What trends do you see in the data. Compare this trend to May - July 2018. Do the trends match? (NOTE: Need to check these date ranges and make sure the trend is clear)</li>
      <li>Zoom into January-December 2017, examine each data set (pH, seawater pCO<sub>2</sub>, temperature and wind direction) and explore how it changes through time. What patterns do you see for each individual data set over the course of a year? Compare to the data sets from January-December 2018. How are they similar or different?</li>
      <li>Examine each data set (pH, seawater pCO<sub>2</sub>, temperature and wind direction) and explore how it changes through time. What patterns do you see for each individual data set over the course of a year? Season?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>Using the temperature data, make a prediction about how changing wind direction affects ocean circulation. How do these data support your prediction?</li>
      <li>Using multiple data sets, make a prediction about how changing ocean circulation affects seawater pH. How do these data sets support your prediction?</li>
      <li>If you were a shellfish hatchery manager in the Pacific Northwest, during what time of year would you expect the highest oyster mortality?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/acidification.json');
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_acidification/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_acidification/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_acidification/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p class="pull-right"><a href="data/production_invention.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<p>The data for this activity was obtained from the following <a href="https://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance</a> instruments:</p>
<ul>
  <li><a href="https://oceanobservatories.org/instrument-class/ph/">pH</a> (7m) @ Oregon Shelf Surface Mooring (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-RID26-06-PHSEND000">CE02SHSM-RID26-06-PHSEND000</a>)</li>
  <li><a href="https://oceanobservatories.org/instrument-class/pco2a/">pCO<sub>2</sub></a> (1m) @ Oregon Shelf Surface Mooring (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-SBD12-04-PCO2AA000">CE02SHSM-SBD12-04-PCO2AA000</a>)</li>
  <li><a href="https://oceanobservatories.org/instrument-class/ctd/">Seawater Temperature</a> (25m) @ Oregon Inshore Surface Mooring (<a href="https://ooinet.oceanobservatories.org/plot/#CE01ISSM-MFD37-03-CTDBPC000">CE01ISSM-MFD37-03-CTDBPC000</a>)</li>
  <li><a href="https://oceanobservatories.org/instrument-class/metbk/">Winds</a> (3m above sea-level) @ Oregon Shelf Surface Mooring (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-SBD11-06-METBKA000">CE02SHSM-SBD11-06-METBKA000</a>)</li>
</ul>  
  
<p>Datasets were downloaded from the OOI data portal, outliers were removed, and then hourly (mean) averages of seawater pH, pCO<sub>2</sub>, temperature, salinity and wind speeds were calculated and merged together into a single file.</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/August2019/DL_August_Ocean_Acidification_v1.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>SHORT DESCRIPTION</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="acidification.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore the relationships among atmospheric processes (wind), ocean processes (currents and upwelling), and how these processes affect ocean chemistry (pH).</p>
      </a>
      <a href="acidification.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Explore the relationships among atmospheric processes (wind), ocean processes (currents and upwelling), and how these processes affect ocean chemistry (pH) and the survival of juvenile shellfish along the coast of the Pacific Northwest.</p>
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
    <a href="acidification_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Gerken, S., Greengrove, C., Nuwer, M., Smith, S., &amp; Lichtenwalner, C. S. (2020). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
