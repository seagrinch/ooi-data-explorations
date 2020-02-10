<?php 
  $lesson_title = 'Drivers of Seawater Density';
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
  <li><a href="density.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Observe temperature, salinity and density data from three locations.</p>
<ol>
  <li>Make a prediction on whether temperature or salinity is more important in determining seawater density at each location.</li>
  <li>Test this prediction by observing how density changes when temperature or salinity is held constant at the mean value</li>
</ol>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart1" style="width:800px; height: 160px;"></div>
<div id="chart2" style="width:800px; height: 160px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 190px; margin-top: 20px;"></div>
<link rel="stylesheet" href="../js/dygraph-2.1.0/dygraph.css" />
<style type="text/css">
  .dygraph-legend {
    left: 544px !important;
  }
  .dygraph-label.dygraph-ylabel {
    margin-top: -14px;
  }
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-4">
    <p class="text-right">Show calculated density:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="constantT" onclick="toggle_lines()" > 
      Hold Temperature Constant</label><br>
    <label style="font-weight: normal;"><input type="checkbox" id="constantS" onclick="toggle_lines()" > 
      Hold Salinity Constant</label>
  </div>
</div>

<div class="row">
  <div class="col-xs-4">
    <p class="text-right">Select which location to show:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="radio" name="site" id="ce" value='CE' onclick="toggle_lines()" checked> 
      Washington Inshore Surface Mooring (7m)</label><br />
    <label style="font-weight: normal;"><input type="radio" name="site" id="GI" value='GI' onclick="toggle_lines()" > 
      Irminger Sea Flanking Mooring A (30m)</label><br />
    <label style="font-weight: normal;"><input type="radio" name="site" id="GP" value='GP' onclick="toggle_lines()" > 
      Station Papa Flanking Mooring A (30m)</label><br />
    <label style="font-weight: normal;"><input type="radio" name="site" id="CP" value='CP' onclick="toggle_lines()" > 
      Coastal Pioneer Offshore Surface Mooring</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-2.1.0/dygraph.js";
  $scripts[] = "../js/dygraph-2.1.0/synchronizer.js";
  $scripts[] = "javascript/density.js";    
?>  



<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, students will be able to observe plots of density, salinity and temperature from near near-surface moorings at three locations, Station PAPA in the North Pacific (30 m depth), Coastal Endurance array from the Oregon Coast (7 m depth), and the Irminger Sea (30 m depth). Students can interact with the data by:</p>
<ul>
  <li>Zooming in and out of the data to look at different time scales that interest them by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted).</li>
  <li>Toggling to hold either temperature or salinity constant at the mean value and observing the new calculated density in a different color.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic variables can you observe in each plot?</li>
      <li>Locate the three stations on the map. How do they compare?</li>
      <li>Across what time periods were these observations made?
        <ul>
          <li>During what time periods do temperature, salinity and density vary the most?</li>
          <li>During what time periods do they vary the least?</li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>Is temperature or salinity more important in controlling density?
        <ul>
          <li>In the North Pacific (Station Papa)</li>
          <li>Off the Oregon Coast (Coastal Endurance Array)</li>
          <li>In the Sub-arctic Atlantic (Irminger Sea)</li>
        </ul>
      </li>
      <li>During what time period did you see these changes or patterns?</li>
      <li>What might explain the differences between these stations?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>TBD</p>


<h3>Dataset Information</h3>
<p>TBD</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Observe how temperature, salinity influence density at three locations.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="density.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Observe temperature, salinity and density data from three locations</p>
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
    <a href="density_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Kumar, A., Rudio, K., Shull, D. &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
