<?php 
  $lesson_title = 'Chlorophyll-a Inshore vs. Offshore ';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  include_once('header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="productivity_index.php">Exploring Primary Productivity with Data</a></li>
  <li><a href="productivity6.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p>What can we observe about chlorophyll inshore vs. offshore in the Ocean? </p>
<?php elseif ($level=='concept_invention'): ?>
<p>What are patterns of primary production between inshore and offshore locations in the Ocean? </p>
<?php elseif ($level=='application'): ?>
<p>How does primary production vary between inshore and offshore locations in the Ocean? How does that relate to what you know about primary production? </p>
<?php endif; ?>


<!-- DATA 
  1.	Similar layout to original (http://education.oceanobservatories.org/productivity/activity4b.php), except can we:
a.	Make it so only the inshore and offshore data from Endurance are visible when the user first comes to the page?
b.	Change the offshore Endurance data to the burnt orange (used in the revised global widget)?
c.	Can all of the legend labels be on the same line, rather than the Offshore Atlantic dropping to the line below?

1.	Similar layout to original (http://education.oceanobservatories.org/productivity/activity4b.php), except can we:
a.	Make it so only the inshore and offshore data from Endurance are visible when the user first comes to the page?
b.	Change the offshore Endurance data to the burnt orange (used in the revised global widget)?
c.	Can all of the legend labels be on the same line, rather than the Offshore Atlantic dropping to the line below?

1.	Similar layout to original (http://education.oceanobservatories.org/productivity/activity4b.php), except can we:
a.	Make it so only the inshore and offshore data from Endurance are visible when the user first comes to the page?
b.	Change the offshore Endurance data to the burnt orange (used in the revised global widget)?
c.	Can all of the legend labels be on the same line, rather than the Offshore Atlantic dropping to the line below?

-->

<div id="chart" style="width:800px; height: 400px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include datasets:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
    Inshore Pacific Ocean (Endurance)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)" checked> 
    Offshore Pacific Ocean (Endurance)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)" checked> 
    Inshore Atlantic Ocean (Pioneer)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="3" onclick="toggle_visibility(this)" checked> 
    Offshore Atlantic Ocean (Pioneer)</label>
  </div>
</div>

<?php 
  $scripts[] = "js/dygraph-combined-dev.js";
  $scripts[] = "js/activity4b.js";
?> 

<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p>Explore the "Chlorophyll-a Concentration" data among the inshore and offshore locations at each station in the Temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>) and Atlantic Ocean (<a href="http://oceanobservatories.org/array/coastal-pioneer/">Coastal Pioneer Array</a>) to see what you can observe.</p>

<p><strong>Data Hint:</strong> Select different inshore and offshore locations to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<?php elseif ($level=='concept_invention'): ?>

<p>Look for patterns in the "Chlorophyll-a Concentration" data from the inshore and offshore locations at each station in the Temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>) and Atlantic Ocean (<a href="http://oceanobservatories.org/array/coastal-pioneer/">Coastal Pioneer Array</a>).</p>

<p><strong>Data Hint:</strong> Select the inshore and offshore locations for each Ocean to explore the data. Zoom in and out of the data to look at different time scales to investigate patterns across time.</p>

<?php elseif ($level=='application'): ?>

<p>Investigate the "Chlorophyll-a Concentration" data to determine how the data vary from the inshore and offshore locations at each station in the Temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>) and Atlantic Ocean (<a href="http://oceanobservatories.org/array/coastal-pioneer/">Coastal Pioneer Array</a>). </p>

<p><strong>Data Hint:</strong> Select each inshore and offshore location to explore the data from the Temperate Zones of the Ocean. Zoom in and out of the data to look at different time scales to investigate patterns across time.</p>

<?php endif; ?>


<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<ol>
  <li>What did you find interesting about what you observed in the data about chlorophyll-a concentration among the inshore and offshore locations?</li>
  <li>Did you observe any patterns? If so, what were the patterns and for which variables?</li>
  <li>What questions do you still have about chlorophyll-a concentration among the inshore and offshore locations?</li>
</ol>

<?php elseif ($level=='concept_invention'): ?>

<ol>
  <li>How did the chlorophyll-a concentration vary among the inshore and offshore locations? </li>
  <li>What is your evidence for the pattern, which you observed, in the data among the inshore and offshore locations?</li>
  <li>What questions do you still have about patterns in chlorophyll-a concentration among the inshore and offshore locations in the Ocean?</li>
</ol>

<?php elseif ($level=='application'): ?>

<ol>
  <li> Is there a relationship in primary production among the inshore and offshore locations? 
    <ol type="a">
      <li>If so, explain what kind of relationship is it? Why do you think that relationship exists for chlorophyll-a concentration among the inshore and offshore locations?</li>
      <li>If not, why do you think there is no relationship for chlorophyll-a concentration among the inshore and offshore locations?</li>
    </ol>
  </li>
  <li>How does this relationship, or lack of relationship, support or challenge what you previously knew about primary production?</li>
  <li>What questions do you still have about primary production?</li>
</ol>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('productivity/images_json/productivity6.json');
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="productivity/images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="productivity/images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>

<p style="text-align: right;">Finished the activity?  Please take our quick <a href="index.php" class="btn btn-sm btn-warning">Student Survey</a></p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore chlorophyll-a concentrations from inshore and offshore locations. </small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="productivity6.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe about chlorophyll inshore vs. offshore in the Ocean? </p>
      </a>
      <a href="productivity6.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What are patterns of primary production between inshore and offshore locations in the Ocean? </p>
      </a>
      <a href="productivity6.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does primary production vary between inshore and offshore locations in the Ocean? How does that relate to what you know about primary production? </p>
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