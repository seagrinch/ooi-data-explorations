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
  <li><a href="index.php">March 2019</a></li>
  <li><a href="anoxia.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3 style="color:red;">This activity is under construction!</h3>

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
    <p id="btext" class="text-center">When you're ready to add a new dataset, click the Next button.</p>
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

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "../js/dygraph-synchronizer.js";

  if ($level=='exploration') {
    $scripts[] = "javascript/anoxia.js";    
  }
?>  

<!--
TTD
- Add 2 line
- Show graphs sequentially
- Show bands
- Plot winds in 2 colors
-->

<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>TBD</p>

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
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<p>TBD</p>

<h4>Dataset Information</h4>
<p>TBD</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>The impact of interaction between the mid-depth ocean and coastal waters on fisheries</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="anoxia.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore the relationship between atmospheric processes (wind), oceanic processes (currents and upwelling) and how these processes affect benthic organisms and our ability to fish for them.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="anoxia_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>


<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
