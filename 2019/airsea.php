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
<?php if (in_array($level, array('exploration','application1','application2'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>How do atmospheric processes affect surface oceanographic conditions?</p>

<?php elseif ($level=='application1'): ?>
<p>How do atmospheric processes affect surface oceanographic conditions?</p>

<?php elseif ($level=='application2'): ?>
<p>How do atmospheric processes affect surface oceanographic conditions?</p>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart" style="width:800px; height: 400px;"></div>

<p class="text-right"><a href="data/airsea.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads you are able to see maximum wave height and peak wave period data from the Coastal Pioneer Central and Surface Moorings.</p>

<?php elseif ($level=='application1'): ?>
<p>When the site loads you are able to see maximum wave height and peak wave period data from the Coastal Pioneer Central and Surface Moorings. You can interact with the data by clicking on the "Next" button to display additional data sets.</p>

<?php elseif ($level=='application2'): ?>
<p>When the site loads you are able to the previous figures displaying maximum wave height, peak wave period, wind speed, and surface current speed data from the Coastal Pioneer Central and Surface Moorings. You will also see a new figure showing barometric pressure and precipitation during the same time period. The precipitation data are incomplete. You can interact with the data by:</p>
<ul>
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
      <li>Are the minima/maxima of the variables coincident?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What is the relationship between wave height and wave period?</li>
      <li>Do the maximum data seem anomalous to the rest of the data?</li>
      <li>Hypothesize some factors that could lead to the changes in wave properties that you observed.</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application1'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Click through and examine these data sets: wind height, wave period, wind speed, and surface current speed, and explore how they change through time. What patterns do you see for each individual data set over the course of a week?</li>
      <li>Compare the datasets and describe any correlations you see among the datasets.</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What effect does wind speed have on waves and surface currents?</li>
      <li>What natural process may have been responsible for the collective air-sea changes you observed?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application2'): ?>
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
<p>TBD</p>


<h3>Dataset Information</h3>
<p>The data for this activity was obtained from the following <a href="">Coastal Pioneer</a> instruments:</p>
<ul>
  <li><a href="https://oceanobservatories.org/site/CP01CNSM/">Central Surface Mooring</a>, <a href="https://oceanobservatories.org/instrument-class/wavss/">Surface Wave Spectra</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP01CNSM-SBD12-05-WAVSSA000">CP01CNSM-SBD12-05-WAVSSA000</a>)</li>
  <?php if (($level=='application1') || ($level=='application2')): ?>
  <li><a href="https://oceanobservatories.org/site/CP03ISSM/">Inshore Surface Mooring</a>, <a href="https://oceanobservatories.org/instrument-class/metbk/">Bulk Meteorology Instrument Package</a> (<a href="https://ooinet.oceanobservatories.org/plot/#CP03ISSM-SBD11-06-METBKA000">CP03ISSM-SBD11-06-METBKA000</a>)</li>
  <?php endif; ?>
</ul>

<p>Recovered datasets were downloaded from the OOI data portal, and then hourly mean averages were calculated and merged together into a single file for use in this activity.  Hourly rain rate was calculated by differencing the hourly precipitation measurements.</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/March2019/Activities/DL_June_Air-Sea_v1.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small></small></h2>
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
      <a href="airsea.php?level=application1" class="list-group-item">
        <h4 class="list-group-item-heading">Application #1</h4>
        <p class="list-group-item-text">Students will explore and analyze wave properties, in addition to surface current speed and wind speed, using graphs, and hypothesize possible correlation and causation.</p>
      </a>
      <a href="airsea.php?level=application2" class="list-group-item">
        <h4 class="list-group-item-heading">Application #2</h4>
        <p class="list-group-item-text">Students will explore and analyze wave properties, surface current speed, wind speed, and atmospheric pressure using graphs, and hypothesize possible correlation and causation. Students will predict precipitation amounts in relation to atmospheric pressure and reflect on impacts of episodic events on coastal communities.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_EA.png" alt="Learning Cycle Diagram" />
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
