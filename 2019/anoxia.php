<?php 
  $lesson_title = 'Anoxic Events';
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
  <li><a href="anoxia.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>How do changing weather conditions and ocean circulation patterns affect our ability to fish for benthic organisms like crabs?</p>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart1" style="width:800px; height: 210px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 180px; margin-top: 20px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary disabled" id="prev" onclick="changeState('prev')">Previous</a></p>
  </div>
  <div class="col-md-8">
    <p id="btext" class="text-center">This dissolved oxygen data is from the seafloor (at 25m) at this location. Hypoxia occurs when dissolved oxygen (DO) values decrease below 2mg/L.  Click the next button to show this threshold.</p>
  </div>
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary" id="next" onclick="changeState('next')">Next</a></p>
  </div>
</div>

<!--
  <button class="btn btn-default" onclick="goto_step(1)">Step 1</button>
  <button class="btn btn-default" onclick="goto_step(2)">Step 2</button>
  <button class="btn btn-default" onclick="goto_step(3)">Step 3</button>
-->

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
    $scripts[] = "javascript/anoxia.js";    
  }
?>  

<p class="text-right"><a href="data/anoxia2017b.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<ul>
  <li>By clicking on the Next button you can add more data sets.</li>
  <li>Examine the different data sets to see if they have similar patterns.</li>
  <li>Zoom in and out to see if changes in one type of data correlate with changes in another, or if there is a lag between the two. You can zoom by grabbing the sliders on the graph underneath the dissolved oxygen graph, or by clicking and dragging on either the temperature or wind speed graphs.</li>
  <li>Note that the wind data shows only that part of the wind parallel to shore.  Positive values indicate wind blowing to the north, negative values to the south</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Examine each data set (wind direction, temperature, dissolved oxygen) and explore how it changes through time. What patterns do you see for each individual data set over the course of a month? </li>
      <li>Do you see any differences in how often these data vary? </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>Compare two different times highlighted in each data set. How do the three parameters compare during these two different time periods?</li>
      <li>Using multiple data sets, make a prediction about how changing wind directions affect ocean circulation. How do these data sets support your prediction?</li>
      <li>Using multiple data sets, make a prediction about how changing ocean circulation affect conditions on the seafloor for organisms like crabs that live there. How do these data sets support your prediction?</li>
      <li>If you were a marine scientist working in Oregon, what would you want to tell the fisheries industry about the impact of weather on their ability to catch crabs?</li>
      <li>You identified some patterns in the data sets that can be correlated across the data sets.  Do you see small differences in timing of correlations across some of the data?  How can they be explained?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected, and to review dissolved oxygen in the ocean.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('json/anoxia.json');  
  }
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_anoxia/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_anoxia/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_anoxia/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p>The data for this activity was obtained from the following Coastal Endurance instruments:</p>
<ul>
  <li><a href="https://oceanobservatories.org/site/CE01ISSM/">Oregon Inshore Surface Mooring</a>, <strong>Dissolved Oxygen</strong> @ 25m depth (<a href="https://ooinet.oceanobservatories.org/plot/#CE01ISSM-MFD37-03-DOSTAD000">CE01ISSM-MFD37-03-DOSTAD000</a>)</li>
  <li><a href="https://oceanobservatories.org/site/CE01ISSM/">Oregon Inshore Surface Mooring</a>, <strong>Seawater Temperature</strong> @ 25m depth (<a href="https://ooinet.oceanobservatories.org/plot/#CE01ISSM-MFD37-03-CTDBPC000">CE01ISSM-MFD37-03-CTDBPC000</a>)</li>
  <li><a href="https://oceanobservatories.org/site/CE02SHSM/">Oregon Shelf Surface Mooring</a>, <strong>Winds</strong> @ 3m above sea-level from the Bulk Meteorological Instrument Package (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-SBD11-06-METBKA000">CE02SHSM-SBD11-06-METBKA000</a>) </li>
</ul>

<p>Recovered datasets for the above instruments were downloaded from the OOI data portal, and then averaged to hourly intervals before being merged and exported to CSV.  In addition, DO was converted from micromole/kg (which is what the OOI system provides) to mg/L (which is what textbooks often use).</p>

<p>The Glider CTD and Dissolved Oxygen profile data shown in the background plots was collected by <a href="https://oceanobservatories.org/site/CE05MOAS/">Endurance Coastal Glider</a> #384,  (<a href="https://ooinet.oceanobservatories.org/plot/#CE05MOAS-GL384-04-DOSTAM000">CE05MOAS-GL384-04-DOSTAM000</a>).</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/March2019/Activities/DL_March_Anoxia_v4.ipynb">Jupyter Notebook</a> for details on how all of the data used in this activity was processed.</p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore the impact and interaction between the mid-depth ocean and coastal waters on fisheries</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="anoxia.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore the relationship between atmospheric processes (wind) and oceanic processes (currents and upwelling), and how these processes affect benthic organisms and our ability to fish for them.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" usemap="#lcmap" />
  </div>
</div>

<map name="lcmap">
  <area shape="rect" coords="244,36,379,129" href="anoxia.php?level=exploration" alt="Exploration">
<!--   <area shape="rect" coords="257,152,392,245" href="anoxia.php?level=invention" alt="Invention"> -->
<!--   <area shape="rect" coords="116,211,251,304" href="anoxia.php?level=application" alt="Application"> -->
</map>

<h4>Instructors' Corner</h4>
<p>If you are a professor or teacher interested in additional information on how to integrate these Data Explorations in your courses, check out the Instructor's Guide and Learning Cycle Sequence for more guidance.</p>
<div class="text-center">
  <p>
    <a href="anoxia_guide.php" class="btn btn-primary">Instructor's Guide</a>
    <a href="learningcycle/Anoxic-Events-Learning-Cycle-chart.pdf" class="btn btn-primary">Learning Cycle Sequence</a>
  </p>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Browne, K., Sahl, L., Freeman, R., Smalley, G., White, C., &amp; Lichtenwalner, C.S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
