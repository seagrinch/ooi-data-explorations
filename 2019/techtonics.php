<?php 
  $lesson_title = 'Tectonics and Tsunamis';
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
  <li><a href="techtonics.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use earthquake and bathymetry data to make observations about seafloor features and potential tsunami hazards.</p>
<ul>
  <li>Explore the data to see what observations you can make.</li>
  <li>Describe the possible relationship between the earthquakes and tectonic boundaries.</li>
  <li>Make predictions of locations for potential tsunami generation.</li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>

<?php endif; ?>

<p class="text-right"><a href="data/salinity_application.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the bathymetry of an area in the northeastern region of the Pacific Ocean.  You also have the option to turn on a layer indicating earthquake locations for 2010 to 2017.  The data was collected using the Cabled Axial Seamount and Cabled Coastal Arrays. You can interact with the data by:</p>
<ul>
  <li>Zooming in and out of the map and by clicking and dragging it.</li>
  <li>Toggling between the bathymetry map and earthquake locations.</li>
  <li>Adjusting the slider to view earthquakes over a specific time period.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Where is the land and where is the ocean?</li>
      <li>Across what time periods are you able to observe oceanic or geologic variables in the plot? 
        <ul>
          <li>What is the first month and year there are data?</li>
          <li>What is the last month and year there are data?</li>
        </ul>
      </li>
      <li>What is the range of earthquake magnitude?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What oceanic or geologic features can you see?</li>
      <li>What type of tectonic plate boundaries are present in this area?</li>
      <li>Are their patterns associated with the earthquakes relative to size and location?  Do these make sense?</li>
      <li>What type of plate boundary apparently has the smallest magnitude earthquakes?  Does this make sense?  Why or why not?</li>
      <li>What might be indicated by the number and size of earthquakes both presently and the future?</li>
      <li>If a large earthquake were to occur near the continental slope, how might it affect the slope?  What other hazards might be associated with such an earthquake?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/techtonics.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_magma/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_magma/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_magma/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p>TBD</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore... ???</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="techtonics.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore the relationship between earthquakes and plate boundaries and the potential for tsunami generation.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="salinity_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Jordan, B. &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
