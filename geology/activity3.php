<?php 
  $lesson_title = 'Seamount Diking-Eruption Event Science';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Tectonics & Seamounts</a></li>
  <li><a href="activity3.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<div class="alert alert-danger">Note: These are prototype activities.  They will be updated following the June 2017 workshop.</div>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use data about the change in seafloor elevation from an active volcano in the North Pacific Ocean to look if there are patterns over time in terms of when eruptions occur.</p>
<ul>
  <li>Explore the data below to see what you can observe about how the seafloor changes height before, during, and after an eruption.</li>
  <li>Use your cursor to draw your prediction on the graph of when the next eruption event occurred after 2012.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Use data about the change in seafloor elevation from an active volcano in the North Pacific Ocean to determine what the are patterns over time in terms of when eruptions occur and to make a prediction.</p>
<ul>
  <li>Explore the data below to see what you can observe about how the seafloor changes height before, during, and after an eruption.</li>
  <li>Use your cursor to draw your prediction on the graph of when the next eruption may occur.</li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>

<?php if ($level=='exploration'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-2">
    <p class="text-right"></p>
  </div>
  <div class="col-xs-4">
    <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)"> 
      Show Estimated Threshold</label>
  </div>
  <div class="col-xs-4">
    <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="show_results(this)"> 
      Show Actual Observations</label>
  </div>
  <div class="col-xs-2">
    <button class="btn btn-default" id="reset" onclick="prediction_reset(this)"> 
      Clear Prediction</button>
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/geology3e.js";
?>
<div class="modal fade" tabindex="-1" role="dialog" id="confirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p><strong>Are you ready to show the actual measured observations?</strong></p>
        <p>If you haven't made a prediction yet, please click "Cancel" and draw your prediction on the graph before showing the results.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="cancel_results();">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="confirm_results();">Show Observations</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php elseif ($level=='application'): ?>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-2">
  </div>
  <div class="col-xs-4">
    <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)"> 
      Show Estimated Threshold</label>
  </div>
  <div class="col-xs-4">
  </div>
  <div class="col-xs-2">
    <button class="btn btn-default" id="reset" onclick="prediction_reset(this)"> 
      Clear Prediction</button>
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/geology3a.js";
?>

<?php endif; ?>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the changes in the elevation of the seafloor around the Axial Seamount from 1997-2012 above where magma often builds up just below the seafloor until enough pressure builds for a diking-eruption event. You can interact with the data by:</p>
<ul>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Using your cursor to make a prediction of what the data look like from 2012-2016.</li>
  <li>Selecting "Show Actual Observations" to compare your prediction against the actual change in seafloor data from 2012-2016.</li>
</ul>
<p>Note - The "Estimated Threshold" is an estimation of the amount the seafloor rises (inflates) before which an eruptions follows. </p>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to see the changes in the elevation of the seafloor around the Axial Seamount from 1997-2016 above where magma often builds up just below the seafloor until enough pressure builds for a diking-eruption event. You can interact with the data by:</p>
<ul>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Using your cursor to make a prediction of what the data look like going forward after 2016.</li>
</ul>
<p>Note - The "Estimated Threshold" is an estimation of the amount the seafloor rises (inflates) before which an eruptions follows.</p> 

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time periods are you able to observe changes in the seafloor data in this graph? </li>
      <li>Across what range of seafloor elevation are you able to observe in this graph?</li>
      <li>At what amount of change in seafloor elevation is the estimated threshold for when a diking-eruption will likely follow?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in changes in seafloor elevation between 1997-2012 at the Axial Seamount? </li>
      <li>When did you see these changes or patterns?</li>
      <li>How did you use those changes or patterns from 1997-2012 to help make your prediction of when the next diking-eruption event could have occurred?</li>
      <li>What questions do you still have about how we use data of change in seafloor depth over time to predict when the next diking-eruption event may occur?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time periods are you able to observe changes in the seafloor data in this graph? </li>
      <li>Across what range of seafloor elevation are you able to observe in this graph?</li>
      <li>At what amount of change in seafloor elevation is the estimated threshold for when a diking-eruption will likely follow?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in changes in seafloor elevation between 1997-2016 at the Axial Seamount?
        <ul>
          <li>Were these these changes or patterns driven by how much time had passed? What is your evidence?</li>
          <li>Were these changes or patterns driven by how much of a chance in the seafloor elevation had occurred? What is your evidence?</li>
        </ul>
      </li>
      <li>How did you use those changes or patterns from 1997-2016 to help make your prediction of when the next diking-eruption event may occur? What is your evidence?</li>
      <li>What questions do you still have about how we use data of change in seafloor depth over time to predict when the next diking-eruption event may occur?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='exploration') {
    $json_file = file_get_contents('images_json/geology3.json');  
  } elseif ($level=='application') {
    $json_file = file_get_contents('images_json/geology3.json');
  }
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<?php if ($level=='application'): ?>
<h4>Additional Resources</h4>
Dziak, R.P., D.R. Bohnenstiehl, J.P. Cowen, E.T. Baker, K.H. Rubin, J.H. Haxel and M.J. Fowler (2007), <a href="https://www.pmel.noaa.gov/pubs/outstand/dzia2986/dzia2986.shtml">Rapid dike emplacement leads to eruptions and hydrothermal plume release during seafloor spreading events</a>. Geology., 35(7), 579-582 
<?php endif; ?>


<h4>Dataset Information</h4>
<p>The data in this activity was provided by William Chadwick at NOAA PMEL, and was adapted from Figure 2 in:  Nooner, S. L., and W. W. Chadwick, Jr. (2016), <a href="http://science.sciencemag.org/content/354/6318/1399">Inflation-predictable behavior and co-diking-eruption event deformation at Axial Seamount</a>, Science, 354(6318), 1399-1403, doi:10.1126/science.aah4666.</p>

<?php if ($level=='exploration'): ?>
<p class="text-center"><a href="data/geology3e.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<?php elseif ($level=='application'): ?>
<p class="text-center"><a href="data/geology3a.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<?php endif; ?>

<p>The data for this activity was collected by the Central Caldera <a href="http://oceanobservatories.org/instrument-class/botpt/">Bottom Pressure and Tilt</a> instrument (<a href="https://ooinet.oceanobservatories.org/data_access/?search=RS03CCAL-MJ03F-05-BOTPTA301#RS03CCAL-MJ03F-05-BOTPTA301/streamed_botpt-nano-sample-15s">RS03CCAL-MJ03F-05-BOTPTA301</a>) on the <a href="http://oceanobservatories.org/array/cabled-axial-seamount/">Cabled Axial Seamount </a> array.</p>

<p>To see the latest data from this instrument, you can check out <a href="https://www.pmel.noaa.gov/eoi/rsn/index.html">Bottom Pressure and Tilt</a> page at NOAA PMEL.  They also provide a blog that chronicles past and future<a href="https://www.pmel.noaa.gov/eoi/axial_blog.html"> diking-eruption event forecasts at Axial Seamount</a>.


<?php if ($level=='exploration'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo3e" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo3a" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Help students understand how scientists use data and knowledge of processes at mid-ocean ridges to make predictions of future seismic and eruption events at the Axial Seamount, North Pacific Ocean.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity3.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Use data about the change in seafloor elevation from an active volcano in the North Pacific Ocean to look if there are patterns over time in terms of when eruptions occur.</p>
      </a>
      <a href="activity3.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Use data about the change in seafloor elevation from an active volcano in the North Pacific Ocean to determine what the are patterns over time in terms of when eruptions occur and to make a prediction.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_EA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
