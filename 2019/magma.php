<?php 
  $lesson_title = 'Magma Movement and the Shape of the Seafloor';
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
  <li><a href="magma.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use earthquake and bathymetry data from before and after an underwater eruption to see how they are related.</p>
<ul>
  <li>Explore the data to see what observations you can make.</li>
  <li>Describe the possible relationship between the earthquakes and changes in seafloor topography.</li>
  <li>What do the earthquake and bathymetry data tell you about magma movement within the volcano?</li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart1" style="width:800px; height: 250px;"></div>
<div id="chart2" style="width:723px; height: 120px; margin-top: 20px;"></div>
<div id="chart3" style="width:723px; height: 120px; margin-top: 20px;"></div>

<link rel="stylesheet" href="../js/dygraph-2.1.0/dygraph.css" />
<style type="text/css">
  .dygraph-legend {
    left: 468px !important;
  }
  .dygraph-label.dygraph-ylabel {
    margin-top: -14px;
  }
  #chart1 .dygraph-ylabel {color:#00457C;}
  #chart1 .dygraph-y2label {color:#DBA53A;}
</style>
<?php 
  $scripts[] = "../js/dygraph-2.1.0/dygraph.js";
  $scripts[] = "../js/dygraph-2.1.0/synchronizer.js";
  $scripts[] = "javascript/magma.js";
?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-5">
    <p><strong>Zoom:</strong> 
      <button class="btn btn-primary btn-sm" onclick="graph_range('eruption')">Eruption</button>
      <button class="btn btn-primary btn-sm" onclick="graph_range('all')">All Data</button>
    </p>
  </div>
  <div class="col-xs-1">
    <p class="text-left"><strong>Show:</strong></p>
  </div>
  <div class="col-xs-6">
    <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_lines(this)" checked> 
      Measured Pressure</label> <br>
    <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_lines(this)" checked> 
      Calculated Depth</label></p>
  </div>
</div>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the full datasets of bottom pressure, depth, and earthquakes at Axial Seamount.  The data was collected using the Cabled Axial Seamount Array in the northeastern region of the Pacific Ocean. You can interact with the data by:</p>
<ul>
  <li>Toggling between the raw and processed bathymetry data.</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section or dragging the highlight box.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or geologic variables can you look at in these graphs?</li>
      <li>Across what time periods are you able to observe oceanic or geologic variables in these graphs? 
        <ul>
          <li>What is the first month and year there are data?</li>
          <li>What is the last month and year there are data?</li>
        </ul>
      </li>
      <li>What is general depth range?</li>
      <li>What is the range of earthquake magnitude?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in the earthquake data?</li>
      <li>What changes or patterns did you observe in the bathymetry data?</li>
      <li>What relationships did you see between the earthquake and bathymetry data?</li>
      <li>What changes or patterns indicate the eruption of the volcano? </li>
      <li>Why do you think there is a difference between the number of earthquakes before and after the eruption?</li>
      <li>As you think about magma within the volcano, how might the movement of the magma influence the behavior of the earthquakes before, during, and after the eruption?  How might the movement of the magma influence the bathymetry?</li>
      <li>What questions do you still have about what drives changes in the seismicity and/or bathymetry over time at Axial Seamount?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/magma.json');  
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
<p class="pull-right">Download: <a href="data/magma_botpt.csv" class="btn btn-sm btn-primary">Depth Data</a> <a href="data/magma_earthquakes.csv" class="btn btn-sm btn-primary">Earthquake Data</a></p>
<p>The pressure/depth data in this activity was provided by William Chadwick at NOAA PMEL and was collected by the Central Caldera <a href="http://oceanobservatories.org/instrument-class/botpt/">Bottom Pressure and Tilt</a> instrument (<a href="https://ooinet.oceanobservatories.org/data_access/?search=RS03CCAL-MJ03F-05-BOTPTA301#RS03CCAL-MJ03F-05-BOTPTA301/streamed_botpt-nano-sample-15s">RS03CCAL-MJ03F-05-BOTPTA301</a>) on the <a href="http://oceanobservatories.org/array/cabled-axial-seamount/">Cabled Axial Seamount Array</a>.</p>
<ul>
  <li>The following <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/July2019/DL_July_Magma_v1.ipynb">Jupyter Notebook</a> demonstrates how you can (crudely) process this dataset yourself.</li>
  <li>To see the latest data from this instrument, you can check out <a href="https://www.pmel.noaa.gov/eoi/rsn/index.html">Bottom Pressure and Tilt</a> page at NOAA PMEL.  They also provide a blog that chronicles past and future<a href="https://www.pmel.noaa.gov/eoi/axial_blog.html"> diking-eruption event forecasts at Axial Seamount</a>.</li>
  <li>Nooner, S. L., and W. W. Chadwick, Jr. (2016), <a href="http://science.sciencemag.org/content/354/6318/1399">Inflation-predictable behavior and co-diking-eruption event deformation at Axial Seamount</a>, Science, 354(6318), 1399-1403, doi:10.1126/science.aah4666</li>
</ul>

<p>The earthquake data was provided by William Wilcock via the <a href="http://axial.ocean.washington.edu">Axial Seamount Earthquake Catalog</a>.</p>
<ul>
  <li>Wilcock, W., Waldhauser, F., & Tolstoy, M. (2016). Catalogs of earthquake recorded on Axial Seamount from January, 2015 through November, 2015 (investigators William Wilcock, Maya Tolstoy, Felix Waldhauser). (Version 1) [Data set]. Integrated Earth Data Applications (IEDA). <a href="https://doi.org/10.1594/ieda/323843">https://doi.org/10.1594/ieda/323843</a>. The earthquake catalog data are publicly available in the <a href="http://www.marine-geo.org/tools/search/Files.php?data_set_uid=23843">Marine Geoscience Data System</a>.  The data used are from the file Axial_DD_n12.dat.</li>
  <li>To learn more about this diking-eruptive event, see Wilcock, W., M. Tolstoy, F. Waldhauser, C. Garcia1, Y. Joe Tan, D. Bohnenstiehl, J. Caplan-Auerbach, R. Dziak, A. Arnulf, and M. Mann. (2016) Seismic constraints on caldera dynamics from the 2015 Axial Seamount eruption. Science. 354(6318): 1395-1399. <a href="https://doi.org/10.1126/science.aah5563">https://doi.org/10.1126/science.aah5563</a></li>
</ul>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore how earthquake data helps explain changes in the topography of an underwater volcano</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="magma.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore how earthquake data helps explain changes in the topography of an underwater volcano.</p>
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
    <a href="magma_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Jordan, B. &amp; Lichtenwalner, C. S. (2020). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
