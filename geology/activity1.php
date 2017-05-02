<?php 
  $lesson_title = 'Seamount Geology';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Ocean Geology</a></li>
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
<p>What can we observe about a seamount from seafloor data over time?</p>
<?php elseif ($level=='concept_invention'): ?>
<p>What happens when a seamount erupts?</p>
<?php elseif ($level=='application'): ?>
<p>Has a seamount eruption has occurred?</p>
<?php endif; ?>


<!-- DATA CHART -->

<div id="imgslider">
 <div><img alt="before" src="data/axial_2013.jpg" width="600" height="590" /></div>
 <div><img alt="after" src="data/axial_2015.jpg" width="600" height="590" /></div>
</div>
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "../js/beforeafter/jquery.beforeafter-1.4.min.js";
  $scripts[] = "javascript/geology1_bathy.js";
?>  


<?php if ($level=='exploration'): ?>
<?php elseif ($level=='application'): ?>
<?php endif; ?>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>
<p>Explore seafloor data (depth and angle/tilt) from 3 locations on the Axial Seamount in the Northern Pacific Ocean (Cabled Array) to see what you can observe.</p>
<p><strong>Data Tip:</strong> Select another location (in addition to the blue plotted Central Caldera data) to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>
<p>Explore seafloor data (depth and angle/tilt) from 3 locations on the Axial Seamount in the Northern Pacific Ocean (Cabled Array) to look for patterns in what changes when a seamount eruption occurs.</p>
<p><strong>Data Tip:</strong> To compare the seafloor data from Before and After the event, select the map title of which you are interested in looking. Select another location (in addition to the blue plotted Central Caldera data) to explore how the event was detected at different locations on the seamount. Zoom in and out of the data to look at different time scales during the event.</p>

<?php elseif ($level=='application'): ?>
<p>Explore data (seafloor depth, seafloor angle/tilt, and water temperature) from 3 locations on the Axial Seamount in the Northern Pacific Ocean (Cabled Array) to determine if, and when, a seamount eruption occurred.</p>
<p><strong>Data Tip:</strong> Select another location (in addition to the blue plotted Central Caldera data) to explore relationships and patterns in the data. Zoom in and out of the data to look at different time scales to see if it changes the relationships or patterns you observe.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>
<ol>
  <li>What did you find interesting about what you observed in the seafloor data at a seamount?</li>
  <li>Did you observe any patterns? If so, what were the patterns? </li>
  <li>Did the patterns occur at all 3 locations? If so, were the patterns similar?</li>
  <li>What questions do you still have about what we can learn about seamounts from seafloor data?</li>
</ol>

<?php elseif ($level=='concept_invention'): ?>
<ol>
  <li>How did the seafloor depth vary before, during, and after the eruption event? How did the tilt of the seafloor vary before, during, and after the eruption event?</li>
  <li>What is your evidence for the pattern, which you observed, in the data before, during, and after the eruption event?</li>
  <li>What questions do you still have about patterns of the changes to a seamount before, during, and after an eruption event?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li>Did a seamount eruption occur?
  <ol>
    <li>If so, what is your evidence that an eruption occurred?</li>
    <li>If not, what is your evidence that no eruption occurred? </li>
  </ol></li>
  <li>Is there a relationship among water temperature, seafloor depth, and seafloor tilt? 
  <ol>
    <li>If so, explain what kind of relationship is it? Why do you think that relationship exists among water temperature, seafloor depth, and seafloor tilt?</li>
    <li>If not, why do you think there is no relationship among water temperature, seafloor depth, and seafloor tilt?</li>
  </ol></li>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about seamounts and plate tectonics?</li>
  <li>What questions do you still have about seamounts and plate tectonics?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>



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
        <p class="list-group-item-text">What can we observe about a seamount from seafloor data over time?</p>
      </a>
      <a href="activity1.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What happens when a seamount erupts?</p>
      </a>
      <a href="activity1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Has a seamount eruption has occurred?</p>
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
