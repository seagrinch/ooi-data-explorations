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
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="chl_nitrate.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<p>TBD</p>


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
  $scripts[] = "javascript/chl_nitrate.js";
?>  

<p class="text-right"><a href="data/chl_nitrate.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>
<p>TBD</p>


<h3>Questions for Thought</h3>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>TBD</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>TBD</li>
    </ul>
  </div>
</div>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/chl_nitrate.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="../productivity/images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="../productivity/images/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="../productivity/images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore chlorophyll-a and nitrate concentrations at two locations</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="chl_nitrate.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">How do chlorophyll and nitrate change over time at two locations?</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" usemap="#lcmap"/>
  </div>
</div>

<map name="lcmap">
  <area shape="rect" coords="244,36,379,129" href="chl_nitrate.php?level=exploration" alt="Exploration">
<!--   <area shape="rect" coords="257,152,392,245" href="chl_nitrate.php?level=invention" alt="Invention"> -->
<!--   <area shape="rect" coords="116,211,251,304" href="chl_nitrate.php?level=application" alt="Application"> -->
</map>


<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>