<?php 
  $lesson_title = 'Halocline';
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
  <li><a href="activity6.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Use salinity data across a summer in the North Atlantic Ocean to look if there are patterns in the depth and shape of the halocline over time.</p>
<ul>
  <li>Make a prediction about how the location of the halocline may change over a summer in one location.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Use salinity data across a summer to determine if there are relationships in the depth and shape of the halocline over time between three different regions of the North Atlantic Ocean.</p>
<ul>
  <li>Make a prediction about what differences in the location of the halocline you may observe across Temperate and Polar locations.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time and/or space.</li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->
<script charset="utf-8" src="../js/d3.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <div id="chart"></div>
  </div>
  <div class="col-md-6">
    <div style="margin-top: 12px; width: 400px;">
      <div style="float: left; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
        <span class="glyphicon glyphicon-chevron-left" onClick="sliderSubtract()"></span>
      </div>
      <div style="float: right; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
        <span class="glyphicon glyphicon-chevron-right" onClick="sliderAdd()"></span>
      </div>
      <div style="float: left; width: 250px; font-size: 12px;">
        <div id="profile-slider" style="margin-bottom: 6px; margin-top: 0px"></div>
        <span id="profile-slider-left" style="float: left;"></span>
        <span id="profile-slider-right" style="float: right;"></span>
      </div>
      <p class="text-center small">
        <label for="show_context" style="font-weight: normal;"><input type="checkbox" id="show_context" onClick="showContext()"> Show Context</label>
      </p>
    </div>
  </div>
</div>
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "../js/colorbrewer.js";
  $scripts[] = "javascript/chemistry6e.js";
?>  

<?php elseif ($level=='application'): ?>
<div id="chart"></div>
<div class="row">
  <div class="col-md-9">
    <div style="margin-top: 12px; width: 600px;">
      <p id="chart-date" class="text-center"></p>
      <div style="float: left; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
        <span class="glyphicon glyphicon-chevron-left" onClick="sliderSubtract()"></span>
      </div>
      <div style="float: right; width: 75px; font-size: 20px; text-align: center; cursor: pointer;">
        <span class="glyphicon glyphicon-chevron-right" onClick="sliderAdd()"></span>
      </div>
      <div style="float: left; width: 450px; font-size: 12px;">
        <div id="profile-slider" style="margin-bottom: 6px; margin-top: 0px"></div>
        <span id="profile-slider-left" style="float: left;"></span>
        <span id="profile-slider-right" style="float: right;"></span>
      </div>
      <p class="text-center small">
        <label for="show_context" style="font-weight: normal;"><input type="checkbox" id="show_context" onClick="showContext()"> Show Context</label>
      </p>
    </div>
  </div>
  <div class="col-md-3">
    <br>
    <label style="font-weight: normal;"><input type="checkbox" onclick="match_salinity(this)"> 
      Match salinity limits</label> <br>
    <label style="font-weight: normal;"><input type="checkbox" onclick="match_depth(this)"> 
      Match depth limits</label>
  </div>
</div>
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "../js/colorbrewer.js";
  $scripts[] = "javascript/chemistry6a.js";
?>  
<?php endif; ?>
<style>
  div.tooltip {
    position: absolute;
    text-align: left;
    padding: 4px;
    font: 12px sans-serif;
    background: white;
    border: 0px;
    border-radius: 8px;	
    pointer-events: none;
}
</style>

<div style="clear:both"></div>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to a salinity profile from June 1, 2015 from the Coastal Pioneer Array. You can interact with the data by:</p>
<ul>
  <li>Selecting a different date to explore the data in ways that interest you by using the left/right arrows or moving the time slider box to the left or right.</li>
  <li>Seeing how the date your are looking at compares with all of the other data from the summer by selecting the "Show Context" button.</li>
</ul>
<p>As a note, each day graphs as a different color. </p>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to daily salinity profiles from June 1, 2015 from the Coastal Pioneer Array (Temperate Inshore & Offshore Shelf), with an empty graph for the Irminger Sea Array (Polar Deep Basin) as data are not available from June 1, 2015. You can interact with the data by: </p>
<ul>
  <li>Selecting a different date to explore the data in ways that interest you by using the left/right arrows or moving the time slider box to the left or right. </li>
  <li>Seeing how the date your are looking at compares with all of the other data from the summer by selecting the "Show Context" button.</li>
  <li>Selecting to have the salinity or depth scales be the same across the two graphs, rather than determined by the available data (as it shows when the site loads).</li>
</ul>
<p>As a note, each day graphs as a different color.</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>How can you know what date the data are from that you are looking at in the graph?</li>
      <li>Across what time periods in summer 2015 are you able to observe salinity with depth data in this interactive? </li>
      <li>What is the first day and month there are data?</li>
      <li>What is the last day and month there are data?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in the location of the halocline over this time period in the Northern Atlantic Ocean? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about changes in the depth of the halocline over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>How can you know what date the data are from that you are looking at in each graph?</li>
      <li>What is the overall range of salinity data you are able to observe in each graph? </li>
      <li>What is the overall range of depth data you are able to observe in each graph?</li>
      <li>What is the overall time range are you able to observe in each graph? </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What similarities and differences did you find in patterns of halocline depth over time between these Temperate Shelf and Polar Plain locations in the North Atlantic Ocean?</li>
      <li>What other questions do you have about patterns of changes in the depth of the halocline in the summer across the ocean from these data?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/chemistry6e.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/chemistry6a.json');
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

<p>The data for this activity was obtained from the following profiling CTD instrument:</p>
<ul>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP02PMCO/">Central Offshore Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP02PMCO-WFP01-03-CTDPFK000/recovered-wfp_ctdpf-ckl-wfp-instrument-recovered">CP02PMCO-WFP01-03-CTDPFK000</a>)</li>
</ul>

<?php elseif ($level=='application'): ?>

<p>The data for this activity was obtained from the following profiling CTD instruments:</p>
<ul>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP02PMCO/">Central Offshore Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP02PMCO-WFP01-03-CTDPFK000/recovered-wfp_ctdpf-ckl-wfp-instrument-recovered">CP02PMCO-WFP01-03-CTDPFK000</a>)</li>
  <li>Coastal Pioneer, <a href="http://oceanobservatories.org/site/CP02PMCI/">Central Inshore Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP02PMCI-WFP01-03-CTDPFK000/telemetered_ctdpf-ckl-wfp-instrument">CP02PMCI-WFP01-03-CTDPFK000</a>)</li>
  <li>Global Irminger Sea, <a href="http://oceanobservatories.org/site/GI02HYPM/">Apex Profiler Mooring</a> (<a href="https://ooinet.oceanobservatories.org/plot/#GI02HYPM-WFP02-04-CTDPFL000/recovered-wfp_ctdpf-ckl-wfp-instrument-recovered">GI02HYPM-WFP02-04-CTDPFL000</a>)</li>
</ul>

<?php endif; ?>

<p class="text-center"><a href="data/chemistry6.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<p>The above datasets were downloaded from the OOI data portal.  Complete profiles of the instrument were identified and the profile closest to midnight (GMT) each day was saved.  This reduced the overall temporal resolution (and size) of the final dataset but it preserved the raw variability exhibited in individual profiles and measurements.</p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore and analyze patterns in the location of the halocline over time.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>This activity has the following variations:</p>
    <div class="list-group">
      <a href="activity6.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Use salinity data across a summer in the North Atlantic Ocean to look if there are patterns in the depth and shape of the halocline over time.</p>
      </a>
      <a href="activity6.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Use salinity data across a summer to determine if there are relationships in the depth and shape of the halocline over time between three different regions of the North Atlantic Ocean.</p>
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
