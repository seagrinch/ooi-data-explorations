<?php 
  $lesson_title = 'Carbonate Buffering System';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Chemistry</a></li>
  <li><a href="activity4.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the May 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p> As pH changes over time, what else changes?</p>
<?php elseif ($level=='application'): ?>
<p>How does the relationship between pH and pCO<sub>2</sub> depth vary across the ocean and over time?</p>
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
<?php endif; ?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore data from the surface across different time periods from the northern Pacific Ocean (Coastal Endurance Array) to see what you can observe.</p>

<p><strong>Data Tip:</strong> Turn on and off different seasons to compare changes in pH and pCO2 over time. Select another time period to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='application'): ?>

<p>Explore data from the surface across different time periods from different areas of the Pacific Ocean - North (Coastal Endurance Array) and South (Global Southern Ocean Array) - to see what you can observe.</p>

<p><strong>Data Tip:</strong> Select which comparison you are interested in looking at against the Oregon dataset: Washington or Chile. Select another time period to explore the data to help you observe patterns in the data. Zoom in and out of the data to look at different time scales that interest you. </p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you learn about changes in pH and pCO2 over time?</li>
  <li>What questions do you still have about how pH and pCO2 are related?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>What similarities and differences did you find in seasonal patterns in changes in pH and pCO2 across the Pacific Ocean?</li>
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

<p>Data for this activity was adapted from the following instrument:</p>
<ul>
  <li>Coastal Endurance:
  <ul>
    <li>Oregon Shelf Surface Mooring, Near Surface Instrument Frame, Seawater pH (CE02SHSM-RID26-06-PHSEND000), telemetered phsen_abcdef_dcl_instrument</li>
    <li>Oregon Shelf Surface Mooring, Surface Buoy, pCO2 Air-Sea (CE02SHSM-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_water</li>
  </ul></li>
</ul>

<?php elseif ($level=='application'): ?>

<p>Data for this activity were adapted from the following instruments:</p>
<ul>
  <li>Coastal Endurance:
  <ul>
    <li>Oregon Shelf Surface Mooring, Near Surface Instrument Frame, Seawater pH (CE02SHSM-RID26-06-PHSEND000), telemetered phsen_abcdef_dcl_instrument</li>
    <li>Oregon Shelf Surface Mooring, Surface Buoy, pCO2 Air-Sea (CE02SHSM-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_water</li>
    <li>Washington Shelf Surface Mooring, Near Surface Instrument Frame, Seawater pH (CE07SHSM-RID26-06-PHSEND000), telemetered phsen_abcdef_dcl_instrument</li>
    <li>Washington Shelf Surface Mooring, Surface Buoy, pCO2 Air-Sea (CE07SHSM-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_water</li>
  </ul></li>
  <li>Global Southern Ocean: 
  <ul>
    <li>Apex Surface Mooring, Mooring Riser, Seawater pH (100 m) (GS01SUMO-RII11-02-PHSENE042), telemetered phsen_abcdef_imodem_instrument</li>
    <li>Apex Surface Mooring, Surface Buoy, pCO2 Air-Sea (GS01SUMO-SBD12-04-PCO2AA000), telemetered pco2a_a_dcl_instrument_air</li>
  </ul></li>
</ul>

<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in seawater pH and pCO2 over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity4.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text"> As pH changes over time, what else changes?</p>
      </a>
      <a href="activity4.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does the relationship between pH and pCO<sub>2</sub> depth vary across the ocean and over time?</p>
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
