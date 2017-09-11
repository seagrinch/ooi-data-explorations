<?php 
  $lesson_title = 'Geologic Features of a Seamount';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Tectonics & Seamounts</a></li>
  <li><a href="activity2.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the June 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application1','application2'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What observations can we make about a seamount over time?</p>
<?php elseif ($level=='application1'): ?>
<p>What can happen to the seafloor when a seamount erupts?</p>
<?php elseif ($level=='application2'): ?>
<p>Has a seamount diking-eruption event occurred?</p>
<?php endif; ?>


<?php if ($level=='application1'): ?>
<div id="imgslider">
 <div><img alt="before" src="data/axial_2013.jpg" width="600" height="590" /></div>
 <div><img alt="after" src="data/axial_2015.jpg" width="600" height="590" /></div>
</div>
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "../js/beforeafter/jquery.beforeafter-1.4.min.js";
  $scripts[] = "javascript/geology2_bathy.js";
?>
<?php endif; ?>


<!-- DATA CHARTS -->
<div id="chart1" style="width:800px; height: 250px;"></div>
<div id="chart2" style="width:730px; height: 250px; margin-top: 20px;"></div>
<?php if ($level=='application2'): ?>
<div id="chart3" style="width:730px; height: 250px; margin-top: 20px;"></div>
<?php endif; ?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include datasets:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)"> 
    International District Vent Field 2 (MJ03D)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)"> 
    Eastern Caldera (MJ03E)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)" checked> 
    Central Caldera (MJ03F)</label><br>
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "../js/dygraph-synchronizer.js";

  if ($level=='exploration') {
    $scripts[] = "javascript/geology2e.js";    
  } elseif ($level=='application1') {
    $scripts[] = "javascript/geology2a1.js";
  } elseif ($level=='application2') {
    $scripts[] = "javascript/geology2a2.js";
  }
?>  


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Explore seafloor data (depth and angle/tilt) from 3 locations on the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) over 7 months and see what kinds of patterns, if any, you can observe.</p>
<p><strong>Data Tip:</strong> Select another location (in addition to the blue & black plotted Central Caldera data) to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>
<p>Note - Tilt values are in microradians. One microradian is the amount of tilt you'd get if you lifted one end of a straight line that is 1 km long by 1 mm.</p>

<?php elseif ($level=='application1'): ?>
<p>Explore maps of the changes in the seafloor and seafloor data (depth and angle/tilt) from 3 locations on the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) before, during, and after an diking-eruption event in April 2015 to look for patterns in how the seafloor can change when a seamount diking-eruption event occurs.</p>
<p><strong>Data Tip:</strong> To compare the seafloor data from Before and After the event, use the green slider at the center to move between the images as you are interested. Or select the category buttons below to jump to only Before or only After.</p>
<p>Select another location (in addition to the blue & black plotted Central Caldera data) to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales to see if it changes the relationships or patterns you observe.</p>
<p>Note - Tilt values are in microradians. One microradian is the amount of tilt you'd get if you lifted one end of a straight line that is 1 km long by 1 mm.</p>

<?php elseif ($level=='application2'): ?>
<p>Explore maps of the changes in the seafloor (seafloor depth and angle/tilt) and surrounding waters (temperature) from 3 locations on the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) over time to determine if, and when, a seamount diking-eruption event occurred.</p>
<p><strong>Data Tip:</strong> Select another location (in addition to the blue plotted Central Caldera data) to explore relationships and patterns in the data. Zoom in and out of the data to look at different time scales to see if it changes the relationships or patterns you observe.</p>
<p>Note - Tilt values are in microradians. One microradian is the amount of tilt you'd get if you lifted one end of a straight line that is 1 km long by 1 mm.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>
<ol>
  <li>What did you find interesting in the seafloor data at the Axial Seamount over these 7 months in 2015?</li>
  <li>Did you observe any patterns? If so, what was it/were they? </li>
  <li>Did you see the pattern(s) occur at all 3 locations? If so, were the patterns similar or different at all 3 locations?</li>
  <li>What questions do you still have about what we can learn about seamounts from seafloor data?</li>
</ol>

<?php elseif ($level=='application1'): ?>
<ol>
  <li>In general, how did the seafloor depth vary from before, during, to after the diking-eruption event? </li>
  <li>In general, how did the tilt of the seafloor from before, during, to after the diking-eruption event?</li>
  <li>What is your evidence for these patterns in the seafloor depth and tilt data from before, during, to after the diking-eruption event?</li>
  <li>How do these patterns relate to what you already knew about seamounts?</li>
  <li>What questions do you still have about changes to the seafloor at a seamount before, during, and after an diking-eruption event?</li>
</ol>

<?php elseif ($level=='application2'): ?>

<ol>
  <li>Did a seamount diking-eruption occur?
  <ul>
    <li>If so, what is your evidence that an diking-eruption occurred?</li>
    <li>If not, what is your evidence that no diking-eruption occurred? </li>
  </ul></li>
  <li>Is there a relationship among among water temperature, seafloor depth, and seafloor tilt at Axial Seamount in 2015? 
  <ul>
    <li>If so,
    <ul>
      <li>What kind of relationship is it? </li>
      <li>What is your evidence of the relationship?</li>
      <li>Why do you think that relationship exists among water temperature, seafloor depth, and seafloor tilt? </li>
    </ul></li>
    <li>If not,
    <ul>
      <li>Why do you think there is no relationship among water temperature, seafloor depth, and seafloor tilt?</li>
    </ul></li>
  </ul>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about volcanic activity at seamounts?</li>
  <li>What questions do you still have about seamounts?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('images_json/geology2.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>

<h5>Dataset Information</h5>
<p>Data for this activity were accessed from the following instruments on <a href="http://oceanobservatories.org/array/cabled-axial-seamount/">Cabled Axial Seamount</a>:</p>
<ul>
  <li>Central Caldera, Medium-Power JBox, Bottom Pressure and Tilt (RS03CCAL-MJ03F-05-BOTPTA301)</li>
  <li>Eastern Caldera, Medium-Power JBox, Bottom Pressure and Tilt (RS03ECAL-MJ03E-06-BOTPTA302)</li>
  <li>International District Vent Field 2, Medium-Power JBox, Bottom Pressure and Tilt (RS03INT2-MJ03D-06-BOTPTA303)</li>
</ul>
<?php if ($level=='exploration'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo2e" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application1'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo2a1" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application2'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo2a2" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Help students understand how seamounts are actively changing at mid-ocean ridges by working with seafloor and oceanic data at the Axial Seamount, North Pacific Ocean.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity2.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What observations can we make about a seamount over time?</p>
      </a>
      <a href="activity2.php?level=application1" class="list-group-item">
        <h4 class="list-group-item-heading">Application #1 - Event-in-Detail</h4>
        <p class="list-group-item-text">What can happen to the seafloor when a seamount erupts?</p>
      </a>
      <a href="activity2.php?level=application2" class="list-group-item">
        <h4 class="list-group-item-heading">Application #2 - Event Impacts</h4>
        <p class="list-group-item-text">Has a seamount diking-eruption event occurred?</p>
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
