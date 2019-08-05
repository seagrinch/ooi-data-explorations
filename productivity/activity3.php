<?php 
  $lesson_title = 'Chlorophyll-a Across the Globe ';
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
  <li><a href="activity3.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What can we observe about chlorophyll in the fall around the world? </p>
<?php elseif ($level=='concept_invention'): ?>
<p>What are global patterns in primary production? </p>
<?php elseif ($level=='application'): ?>
<p>How does primary production vary around the world? How does that relate to what you know about primary production?</p>
<?php endif; ?>


<!-- DATA CHART -->
<div id="chart1" style="width:800px; height: 250px;"></div>
<br>
<div id="chart2" style="width:800px; height: 250px;"></div>
<br>
<div id="chart3" style="width:800px; height: 250px;"></div>
<br>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/productivity3.js";
?>  

<p class="text-right"><a href="data/productivity3.zip" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore the "Chlorophyll-a Concentration" data to see what you can observe among the six stations during the Fall season: northern near polar Pacific Ocean (<a href="http://oceanobservatories.org/array/global-station-papa/">Station Papa Array</a>); northern temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>); southern near polar Pacific Ocean (<a href="http://oceanobservatories.org/array/global-southern-ocean/">Southern Ocean Array</a>); northern near polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>); northern temperate Atlantic Ocean (<a href="http://oceanobservatories.org/array/coastal-pioneer/">Coastal Pioneer Array</a>); southern near polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-argentine-basin/">Argentine Basin Array</a>).</p>

<p><strong>Data Tip:</strong> Select different locations in the ocean to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>

<p>Look for patterns in the "Chlorophyll-a Concentration" data among the six stations during the Fall season: northern near polar Pacific Ocean (<a href="http://oceanobservatories.org/array/global-station-papa/">Station Papa Array</a>); northern temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>); southern near polar Pacific Ocean (<a href="http://oceanobservatories.org/array/global-southern-ocean/">Southern Ocean Array</a>); northern near polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>); northern temperate Atlantic Ocean (<a href="http://oceanobservatories.org/array/coastal-pioneer/">Coastal Pioneer Array</a>); southern near polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-argentine-basin/">Argentine Basin Array</a>).</p>

<p><strong>Data Tip:</strong> Select each location to explore the data from around the globe. Zoom in and out of the data to look at different time scales to investigate patterns across time.</p>

<?php elseif ($level=='application'): ?>

<p>Investigate the "Chlorophyll-a Concentration" data to determine if there is an regional relationship to primary production during the Fall season and how the data vary among the six stations: northern near polar Pacific Ocean (<a href="http://oceanobservatories.org/array/global-station-papa/">Station Papa Array</a>); northern temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>); southern near polar Pacific Ocean (<a href="http://oceanobservatories.org/array/global-southern-ocean/">Southern Ocean Array</a>); northern near polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>); northern temperate Atlantic Ocean (<a href="http://oceanobservatories.org/array/coastal-pioneer/">Coastal Pioneer Array</a>); southern near polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-argentine-basin/">Argentine Basin Array</a>).</p>

<p><strong>Data Tip:</strong> Select the different locations to explore relationships and patterns in the data. Zoom in and out of the data to look at different time scales across the Fall to see if it changes the relationships or patterns you observe.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you find interesting about what you observed in the data about chlorophyll-a concentration around the world?</li>
  <li>Did you observe any patterns? If so, what were the patterns and for which variables?</li>
  <li>What questions do you still have about chlorophyll-a concentration around the world?</li>
</ol>

<?php elseif ($level=='concept_invention'): ?>

<ol>
  <li>How did the chlorophyll-a concentration vary around the world? </li>
  <li>What is your evidence for the pattern, which you observed, in the data from around the world?</li>
  <li>What questions do you still have about patterns in chlorophyll-a concentration from around the world?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li> Is there a relationship to primary production and geography?
    <ol type="a">
      <li>If so, explain what kind of relationship is it? Why do you think that relationship exists for chlorophyll-a concentration around the world?</li>
      <li>If not, why do you think there is no relationship of chlorophyll-a concentration around the world?</li>
    </ol>
  </li>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about primary production?</li>
  <li>What questions do you still have about primary production?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('images_json/productivity3.json');
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
<h2><?= $lesson_title ?><br><small>Explore chlorophyll-a concentrations throughout the globe</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity3.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe about chlorophyll in the fall around the world? </p>
      </a>
      <a href="activity3.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What are global patterns in primary production? </p>
      </a>
      <a href="activity3.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does primary production vary around the world? How does that relate to what you know about primary production? 
</p>
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