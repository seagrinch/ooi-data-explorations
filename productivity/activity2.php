<?php 
  $lesson_title = 'Chlorophyll-a Across the Year ';
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
  <li><a href="activity2.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What can we observe about chlorophyll over a year?</p>
<?php elseif ($level=='concept_invention'): ?>
<p>What are the seasonal patterns in primary production? </p>
<?php elseif ($level=='application'): ?>
<p>How does seasonal primary production vary? How does that relate to what you know about primary production? </p>
<?php endif; ?>


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a season to zoom to see:</p>
  </div>
  <div class="col-xs-9">
  <p>
    <button class="btn btn-primary btn-sm" onclick="date_button('year')">Full Year</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('summer')">Summer</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('fall')">Fall</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('winter')">Winter</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('spring');">Spring</button>
  </p>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/productivity2.js";
?>  

<p class="text-right"><a href="data/productivity2.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Chlorophyll-a Concentration" data among the seasons in the Temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>) to see what you can observe.</p>

<p><strong>Data Tip:</strong> Select different seasons to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>

<p>Look for patterns in the "Chlorophyll-a Concentration" data during each season in the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<p><strong>Data Tip:</strong> Select each season to explore the seasonal data. Zoom in and out of the data to look at different time scales to investigate patterns across the seasons.</p>

<?php elseif ($level=='application'): ?>

<p>Investigate the "Chlorophyll-a Concentration" data to determine if there is an annual relationship to primary production over time and how the data vary in the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<p><strong>Data Tip:</strong> Select different seasons to explore relationships and patterns in the data. Zoom in and out of the data to look at different time scales to see if it changes the relationships or patterns you observe.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you find interesting about what you observed in the data about chlorophyll-a concentration over a year?</li>
  <li>Did you observe any patterns? If so, what were the patterns and for which variables?</li>
  <li>What questions do you still have about chlorophyll-a concentration over a year?</li>
</ol>

<?php elseif ($level=='concept_invention'): ?>

<ol>
  <li>How did the chlorophyll-a concentration vary over each season? </li>
  <li>What is your evidence for the pattern, which you observed, in the data over each season?</li>
  <li>What questions do you still have about patterns in chlorophyll-a concentration over each season?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li> Is there an annual relationship to primary production over time?
    <ol type="a">
      <li>If so, explain what kind of relationship is it? Why do you think that relationship exists for chlorophyll-a concentration over time?</li>
      <li>If not, why do you think there is no relationship of chlorophyll-a concentration over time?</li>
    </ol>
  </li>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about primary production?</li>
  <li>What questions do you still have about primary production?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('images_json/productivity2.json');
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
<h2><?= $lesson_title ?><br><small>Explore chlorophyll-a concentrations throughout a year</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity2.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe about chlorophyll over a year?</p>
      </a>
      <a href="activity2.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What are the seasonal patterns in primary production? </p>
      </a>
      <a href="activity2.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does seasonal primary production vary? How does that relate to what you know about primary production?</p>
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