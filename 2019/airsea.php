<?php 
  $lesson_title = 'Dynamic Air-Sea Interactions';
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
  <li><a href="airsea.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','concept_invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Your objective for this activity is to examine how atmospheric processes affect surface oceanographic conditions. In this section, you will analyze the relationship between wave height and wave period, and speculate on the processes that can influence wave properties.</p>

<?php elseif ($level=='concept_invention'): ?>
<p>Your objective for this activity is to examine how atmospheric processes affect surface oceanographic conditions. In this section, you will link the wave data from the previous activity to wind and current data, to investigate the interaction between the oceans and atmosphere.</p>

<?php elseif ($level=='application'): ?>
<p>Your objective for this activity is to examine how atmospheric processes affect surface oceanographic conditions. In this section, you will link the data from the previous activities to atmospheric pressure, and make some predictions about rainfall.</p>

<?php endif; ?>


<!-- DATA CHART -->
<style>
  #chart1 .dygraph-ylabel {color:#00457C;}
  #chart1 .dygraph-y2label {color:#DBA53A;}
</style>
<?php if ($level=='exploration'): ?>
<div id="chart1" style="width:800px; height: 400px;"></div>

<?php elseif ($level=='concept_invention'): ?>
<div id="chart1" style="width:800px; height: 220px;"></div>
<div id="chart2" style="width:723px; height: 160px; margin-top: 20px;"></div>
<div id="chart3" style="width:723px; height: 160px; margin-top: 20px;"></div>
<div class="row" style="margin-top:10px;">
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary disabled" id="prev" onclick="changeState('prev')">Previous</a></p>
  </div>
  <div class="col-md-8">
    <p id="btext" class="text-center">Click the Next button to add wind speed data to the visualization.</p>
  </div>
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary" id="next" onclick="changeState('next')">Next</a></p>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<style>
  #chart2 .dygraph-ylabel {color:#008100;}
  #chart2 .dygraph-y2label {color:#00839C;}
</style>

<div id="chart1" style="width:800px; height: 200px;"></div>
<div id="chart2" style="width:800px; height: 130px; margin-top: 20px;"></div>
<div id="chart3" style="width:723px; height: 130px; margin-top: 20px;"></div>
<div id="chart4" style="width:723px; height: 160px; margin-top: 20px;"></div>
<p style="font-style: italic">Take a look at the above charts.  Use your mouse to draw your prediction for what the rest of the Rain dataset should look like.  After you have made your estimate, click the "Check Prediction" box.</p>
<div class="row" style="margin-top:10px;">
  <div class="col-md-3">
  </div>
  <div class="col-md-4">
    <label style="font-weight: normal;"><input type="checkbox" id="showObs" onclick="show_obs(this)"> Check Prediction</label>
  </div>
  <div class="col-md-4">
    <button class="btn btn-default" id="clearprediction" onclick="clear_prediction(this)">Clear Prediction</button>
  </div>
  <div class="col-md-1">
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirmModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p><strong>Are you ready to show the actual measured observations?</strong></p>
        <p>If you haven't made a prediction yet, please click "Cancel" and draw your prediction on the graph before showing the results.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="modal_cancel();">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="modal_confirm();">Show Observations</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php endif; ?>

<link rel="stylesheet" href="../js/dygraph-2.1.0/dygraph.css" />
<style type="text/css">
.dygraph-legend {
  left: 544px !important;
}
</style>
<?php 
  $scripts[] = "../js/dygraph-2.1.0/dygraph.js";
  $scripts[] = "../js/dygraph-2.1.0/synchronizer.js";
  if ($level=='exploration') {
    $scripts[] = "javascript/airsea_exploration.js";
  } elseif ($level=='concept_invention') {
    $scripts[] = "javascript/airsea_invention.js";
  } elseif ($level=='application') {
    $scripts[] = "../js/moment.js";
    $scripts[] = "javascript/airsea_application.js";
  }
?>  


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<ul>
  <li>When the site loads you are able to see maximum wave height and peak wave period data from the Coastal Pioneer Central and Surface Moorings. </li>
  <li>Move your cursor over the plots to reveal the values for each data point. </li>
  <li>Zoom in and out by dragging the slider bars to select the time period of interest.</li>
</ul>

<?php elseif ($level=='concept_invention'): ?>
<ul>
  <li>When the site loads you are able to see maximum wave height and peak wave period data from the Coastal Pioneer Central and Surface Moorings. </li>
  <li>Move your cursor over the plots to reveal the values for each data point. </li>
  <li>Zoom in and out by dragging the slider bars to select the time period of interest.</li>
  <li>You can interact with the data by clicking on the "Next" button to display additional data sets.</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>When the site loads you are able to view the previous graphs displaying maximum wave height, peak wave period, wind speed, and surface current speed data from the Coastal Pioneer Central and Surface Moorings. You will also see a new figure showing barometric pressure and precipitation during the same time period. The precipitation data are incomplete. You can interact with the data by:</p>
<ul>
  <li>Moving your cursor over the plots to reveal the values for each data point.</li>
  <li>Using your cursor to make a prediction of what the precipitation data would look like during this event.</li>
  <li>You can then click on the "Next" button to display the actual precipitation data and check your prediction.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time period are you able to see wave data in this graph?</li>
      <li>What are the minima and maxima of these variables?</li>
      <li>Do the minimum values of each variable occur at around the same time? What about the maximum values?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What is the relationship between wave height and wave period?</li>
      <li>Do the maximum values of each variable seem anomalous (unusual) compared to the rest of the data?</li>
      <li>Hypothesize some factors that could lead to the changes in wave properties that you observed.</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='concept_invention'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Click through and examine each data set one at a time: wave height, wave period, wind speed, and surface current speed, and explore how they change through time. What patterns do you see for each individual data set over the course of a week?</li>
      <li>Compare the datasets and describe any correlations you see among the datasets.</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What effect does wind speed have on waves and surface currents?</li>
      <li>The current speed data show significant fluctuations throughout the sample period. What could be causing these daily fluctuations?</li>
      <li>What natural process may have been responsible for the collective air-sea changes you observed?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Describe changes in atmospheric pressure over the course of the week.</li>
      <li>How do changes in atmospheric pressure correlate with the other variables?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>With the additional data, what natural process do you hypothesize is responsible for the collective air-sea changes you observed?</li>
      <li>How did you use those changes or patterns to help make your prediction of precipitation levels? What is your evidence?</li>
      <li>If you lived in a coastal area of the northeast of the US, how might this event affect your life?</li>
      <li>What questions do you still have about dynamic air-sea interactions?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='application') {
    $json_file = file_get_contents('json/airsea2.json');  
  } else {
    $json_file = file_get_contents('json/airsea.json');    
  }
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_airsea/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_airsea/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_airsea/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p class="pull-right"><a href="data/airsea.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<p>The data for this activity was obtained from the following <a href="">Coastal Pioneer</a> instruments:</p>
<ul>
  <li><a href="https://oceanobservatories.org/site/CP01CNSM/">Central Surface Mooring</a>, <a href="https://oceanobservatories.org/instrument-class/wavss/">Surface Wave Spectra</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP01CNSM-SBD12-05-WAVSSA000">CP01CNSM-SBD12-05-WAVSSA000</a>)</li>
  <?php if (($level=='concept_invention') || ($level=='application')): ?>
  <li><a href="https://oceanobservatories.org/site/CP01CNSM/">Central Surface Mooring</a>, <a href="https://oceanobservatories.org/instrument-class/metbk/">Bulk Meteorology Instrument Package</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP01CNSM-SBD11-06-METBKA000">CP01CNSM-SBD11-06-METBKA000</a>)</li>
  <?php endif; ?>
</ul>

<p>Recovered datasets were downloaded from the OOI data portal, and then hourly mean averages were calculated and merged together into a single file for use in this activity.  Hourly rain rate was calculated by differencing the hourly precipitation measurements.</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/June2019/DL_June_Air_Sea_v1.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore dynamic air-sea interactions from an interesting event</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="airsea.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Students will explore and analyze wave height and wave period using graphs, and hypothesize possible causation.</p>
      </a>
      <a href="airsea.php?level=concept_invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">Students will explore and analyze wave properties, in addition to surface current speed and wind speed, using graphs, and hypothesize possible correlation and causation.</p>
      </a>
      <a href="airsea.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Students will explore and analyze wave properties, surface current speed, wind speed, and atmospheric pressure using graphs, and hypothesize possible correlation and causation. Students will predict precipitation amounts in relation to atmospheric pressure and reflect on impacts of episodic events on coastal communities.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_ECA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="airsea_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Degan, J., Hicks, M., Mitra, S., Webb, P., &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
