<?php 
  $lesson_title = 'Changes in pH and pCO2';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Properties of Seawater</a></li>
  <li><a href="activity4.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Use pH and pCO<sub>2</sub> data from the surface from the North Pacific Ocean to look if there are patterns over time.</p>
<ul>
  <li>Make a prediction about what changes in pH at the ocean surface you may observe as pCO<sub>2</sub> of the water changes over time.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Explore data from the surface across different time periods from different areas of the Pacific Ocean - North (Coastal Endurance Array) and South (Global Southern Ocean Array) - to see what you can observe.</p>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart"></div>

<?php if ($level=='exploration'): ?>
<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "javascript/chemistry4e.js";
?>  
<?php elseif ($level=='application'): ?>
<?php 
  $scripts[] = "https://d3js.org/d3.v4.min.js";
  $scripts[] = "javascript/chemistry4a.js";
?>  
<p class="text-center">Select a Site:
<select name="dataset" onchange="updateGraph(this.value)">
  <option value="CE02SHSM">CE02SHSM</option>
  <option value="CE07SHSM">CE07SHSM</option>
  <option value="GS01SUMO">GS01SUMO</option>
</select>
</p>
<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the full dataset (September 2015-August 2016) of pH and pCO<sub>2</sub> data from the Oregon Shelf Surface Mooring in the Coastal Endurance Array. You can see each variable plotted against time in the stacked plots on the right, as well as the variables plotted against one another in the scatter plot on the left. You can interact with the data by: </p>
<ul>
  <li>Selecting a different time period to explore the data in ways that interest you by selecting a section of data in the pH graph (top right) to draw a box over the data points and then moving the highlighted box to the right or left. </li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of your highlighted box section in the pH graph (top right).</li>
</ul>
<p>As a note, the color denotes the time of year the pH data are from (light purple/pink are from September 2015 through blue/dark purple from August 2016).</p>

<?php elseif ($level=='application'): ?>
<p>Select different datasets from Washington (CE07) or off Chile (GS01) against the Oregon dataset (CE02). Drag the time slider to select a time period on the top right pH graph to compare changes in pH and pCO<sub>2</sub> over time across all the graphs among the datasets. Select another time period on the top right pH graph, to explore the data in ways that interest you. </p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What is the overall range of pH data you are able to observe in this graph?</li>
      <li>What is the overall range of pCO<sub>2</sub> data you are able to observe in this graph?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in the relationship between pH and  pCO<sub>2</sub> over this time period in the Northern Pacific Ocean? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about how pH and pCO<sub>2</sub> are related?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<ol>
  <li>What similarities and differences did you find in seasonal patterns in changes in pH and pCO<sub>2</sub> across the Pacific Ocean?</li>
  <li>What can you conclude overall about seasonal patterns in changes in pH and pCO<sub>2</sub> across the ocean from these data?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/chemistry4e.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/chemistry4a.json');
  }
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h4>Dataset Information</h4>

<?php if ($level=='exploration'): ?>

<p>The data for this activity was obtained from the following instruments:</p>
<ul>
  <li>Seawater pH: Coastal Endurance, <a href="http://oceanobservatories.org/site/CE02SHSM/">Oregon Shelf Surface Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-RID26-06-PHSEND000/telemetered_phsen-abcdef-dcl-instrument">CE02SHSM-RID26-06-PHSEND000</a>)</li>
  <li>Seawater pCO<sub>2</sub>: Coastal Endurance, <a href="http://oceanobservatories.org/site/CE02SHSM/">Oregon Shelf Surface Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CE02SHSM-SBD12-04-PCO2AA000/telemetered_pco2a-a-dcl-instrument-water">CE02SHSM-SBD12-04-PCO2AA000</a>)</li>
</ul>
<p class="text-center"><a href="data/chemistry4_CE02SHSM.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<p>The above datasets were downloaded from the OOI data portal, and then down-sampled to hourly intervals.  The data presented are from the raw record, that is, they are instantaneous measurements that have not been averaged because that would smooth out the variability in the dataset.</p>

<?php elseif ($level=='application'): ?>

<p>Data for this activity were adapted from the following instruments:</p>
<ul>
  <li>Coastal Endurance:
  <ul>
    <li>Oregon Shelf Surface Mooring, Near Surface Instrument Frame, Seawater pH (CE02SHSM-RID26-06-PHSEND000), telemetered phsen_abcdef_dcl_instrument</li>
    <li>Oregon Shelf Surface Mooring, Surface Buoy, pCO<sub>2</sub> Air-Sea (CE02SHSM-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_water</li>
    <li>Washington Shelf Surface Mooring, Near Surface Instrument Frame, Seawater pH (CE07SHSM-RID26-06-PHSEND000), telemetered phsen_abcdef_dcl_instrument</li>
    <li>Washington Shelf Surface Mooring, Surface Buoy, pCO<sub>2</sub> Air-Sea (CE07SHSM-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_water</li>
  </ul></li>
  <li>Global Southern Ocean: 
  <ul>
    <li>Apex Surface Mooring, Mooring Riser, Seawater pH (100 m) (GS01SUMO-RII11-02-PHSENE042), telemetered phsen_abcdef_imodem_instrument</li>
    <li>Apex Surface Mooring, Surface Buoy, pCO<sub>2</sub> Air-Sea (GS01SUMO-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_air</li>
  </ul></li>
</ul>

<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in seawater pH and pCO<sub>2</sub> over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>This activity has the following variations:</p>
    <div class="list-group">
      <a href="activity4.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Use pH and pCO<sub>2</sub> data from the surface from the North Pacific Ocean to look if there are patterns over time.</p>
      </a>
<!--
      <a href="activity4.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does the relationship between pH and pCO<sub>2</sub> depth vary across the ocean and over time?</p>
      </a>
-->
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
