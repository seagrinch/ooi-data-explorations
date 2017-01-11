<?php 
  $lesson_title = 'Chlorophyll-a Near the Polar Zones of the Ocean ';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  include_once('header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="productivity_index.php">Exploring Primary Production with Data</a></li>
  <li><a href="productivity5.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What can we observe in chlorophyll data from near the Polar Zones of the Ocean? </p>
<?php elseif ($level=='concept_invention'): ?>
<p>What happens to primary production from near the Polar Zones of the Ocean over time?</p>
<?php elseif ($level=='application'): ?>
<p>What similarities and differences exist between patterns in chlorophyll-a concentrations from the three locations over time? How does that relate to what you know about primary production?</p>
<?php endif; ?>


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Choose a dataset: <br><small>Note, the graph will automatically zoom to the late summer season.</small></p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)">
    Northern Hemisphere Atlantic Ocean (Irminger Sea)</label>
  <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)"> 
    Northern Hemisphere Pacific Ocean (Station Papa)</label><br>
  <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)"> 
    Southern Hemisphere Pacific Ocean (Southern Ocean)</label><br>
  <label style="font-weight: normal;"><input type="radio" name="second" value="" onclick="toggle_radio(this)" checked> 
    Show All</label>
  </div>
</div>

<?php 
  $scripts[] = "js/dygraph-combined-dev.js";
  $scripts[] = "productivity/javascript/productivity5.js";
?>  

<p style="text-align: right;"><a href="productivity/data/productivity5.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore the "Chlorophyll-a Concentration" data among the stations near the Polar Zones of the Pacific Ocean (<a href="http://oceanobservatories.org/array/global-station-papa/">Station Papa Array</a>; <a href="http://oceanobservatories.org/array/global-southern-ocean/">Southern Ocean Array</a>) and Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>) to see what you can observe. </p>

<p><strong>Data Tip:</strong> Select different locations near the Polar Zones of the Ocean to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>

<p>Look for patterns in the "Chlorophyll-a Concentration" data at each of the stations near the Polar Zones of the Pacific Ocean (<a href="http://oceanobservatories.org/array/global-station-papa/">Station Papa Array</a>; <a href="http://oceanobservatories.org/array/global-southern-ocean/">Southern Ocean Array</a>) and Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>).</p>

<p><strong>Data Tip:</strong> Select each location to explore the data from near the Polar Zones of the Ocean. Zoom in and out of the data to look at different time scales to investigate patterns across time. Note that when you select a specific station, it will zoom into the late Summer to early Fall season appropriate for the hemisphere the station is in.</p>

<?php elseif ($level=='application'): ?>

<p>Investigate the "Chlorophyll-a Concentration" data to determine how the data vary over time among areas near the Polar Zones of the Pacific Ocean (<a href="http://oceanobservatories.org/array/global-station-papa/">Station Papa Array</a>; <a href="http://oceanobservatories.org/array/global-southern-ocean/">Southern Ocean Array</a>) and Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>).</p>

<p><strong>Data Tip:</strong> Select each location to explore the data from near the Polar Zones of the Ocean. Zoom in and out of the data to look at different time scales to investigate patterns across time.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you find interesting about what you observed in the data about chlorophyll-a concentration from near the Polar Zones in the Ocean?</li>
  <li>Did you observe any patterns? If so, what were the patterns and for which variables?</li>
  <li>What questions do you still have about chlorophyll-a concentration from near the Polar Zones in the Ocean?</li>
</ol>

<?php elseif ($level=='concept_invention'): ?>

<ol>
  <li>How did the chlorophyll-a concentration vary over time near the Polar Zones of the Ocean? </li>
  <li>What is your evidence for the pattern, which you observed, in the data over time near the Polar Zones of the Ocean?</li>
  <li>What questions do you still have about patterns in chlorophyll-a concentration over time near the Polar Zones of the Ocean?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li> Is there a relationship in primary production over time near the Polar Zones of the Ocean?
    <ol type="a">
      <li>If so, explain what kind of relationship is it? Why do you think that relationship exists for chlorophyll-a concentration over time near the Polar Zones of the Ocean?</li>
      <li>If not, why do you think there is no relationship for chlorophyll-a concentration over time near the Polar Zones of the Ocean?</li>
    </ol>
  </li>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about primary production?</li>
  <li>What questions do you still have about primary production?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('productivity/images_json/productivity5.json');
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="productivity/images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="productivity/images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>

<?php if ($level=='exploration'): ?>
<p style="text-align: right;">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/SE/?SID=SV_cw2bOpyONWUaW1v" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='concept_invention'): ?>
<p style="text-align: right;">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/SE/?SID=SV_0UjIvS7bPKsxYdD" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application'): ?>
<p style="text-align: right;">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/SE/?SID=SV_77eiqJ3YFkHXbb7" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore chlorophyll-a concentration data from locations near the polar zones of the ocean</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="productivity5.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe in chlorophyll data from near the Polar Zones of the Ocean? </p>
      </a>
      <a href="productivity5.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What happens to primary production from near the Polar Zones of the Ocean over time?</p>
      </a>
      <a href="productivity5.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">What similarities and differences exist between patterns in chlorophyll-a concentrations from the three locations over time? How does that relate to what you know about primary production?</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="Learning%20Cycle.png" alt="Learning%20Cycle" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('footer.php'); 
?>