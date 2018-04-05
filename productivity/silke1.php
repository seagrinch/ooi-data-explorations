<?php 
  $lesson_title = 'Chlorophyll-a and Nitrate';
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
  <li><a href="activity6.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php //if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<!--
<h3>Challenge Question</h3>
<?php if ($level=='exploration'): ?>
<p></p>
<?php elseif ($level=='concept_invention'): ?>
<p></p>
<?php elseif ($level=='application'): ?>
<p></p>
<?php endif; ?>
-->


<!-- DATA CHART -->

<div id="chart" style="width:800px; height: 400px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include datasets:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
    Washington Shelf Chlorophyll</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)" > 
    Washington Shelf Nitrate</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)" checked> 
    Irminger Chlrophyll</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="3" onclick="toggle_visibility(this)" > 
    Irminger Nitrate</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/silke1.js";
?>  

<p class="text-right"><a href="data/silke1.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<!--
<h3>Your Objective</h3>

<?php if ($level=='exploration'): ?>

<p></p>

<?php elseif ($level=='concept_invention'): ?>

<p></p>

<?php elseif ($level=='application'): ?>

<p></p>

<?php endif; ?>
-->


<!--
<h3>Interpretation and Analysis Questions</h3>

<?php if ($level=='exploration'): ?>

<p></p>

<?php elseif ($level=='concept_invention'): ?>

<p></p>

<?php elseif ($level=='application'): ?>

<p></p>

<?php endif; ?>
-->


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('images_json/silke1.json');
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
<?php //else: ?>

<!--
<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore chlorophyll-a concentrations from inshore and offshore locations</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="silke1.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">What can we observe about chlorophyll inshore vs. offshore in the Ocean? </p>
      </a>
      <a href="silke1.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What are patterns of primary production between inshore and offshore locations in the Ocean? </p>
      </a>
      <a href="silke1.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How does primary production vary between inshore and offshore locations in the Ocean? How does that relate to what you know about primary production? </p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_ECA.png" alt="Learning Cycle Diagram" />
  </div>
</div>
-->

<?php //endif; ?>


<?php 
  include_once('../footer.php'); 
?>