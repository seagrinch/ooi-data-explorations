<?php 
  $lesson_title = 'CO2 Exchange Between Air and Sea';
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
  <li><a href="co2.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration1','exploration2','invention1','invention2','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if (($level=='exploration1') || ($level=='exploration2') || ($level=='invention1') || ($level=='invention2')): ?>
<p>Use atmospheric conditions and water properties across three years in the North Pacific and North Atlantic to identify drivers of CO<sub>2</sub> flux between the atmosphere and ocean.</p>
<ul>
  <li>Identify periods of time during which the ocean is a source or a sink of CO<sub>2</sub> or at equilibrium</li>
  <li>Explore patterns in temperature, salinity, wind speed, and chlorophyll concentration data to identify causes of changing CO<sub>2</sub> concentration and flux.</li>
  <li>Temporal: Assign relative flux magnitudes across time within a site (as driven by seasonal temps, winds, primary production as discovered in #2).</li>
  <li>Spatial:  Assign relative flux magnitudes as compared between sites (cold west coast currents (and upwelling?) and warm east coast waters as discovered in #2).</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>Use atmospheric conditions and water properties across two/three years in the North Pacific and North Atlantic to evaluate environmental factors that control whether this site is a source or a sink of CO<sub>2</sub>.</p>
<ul>
  <li>Identify periods of time during which the ocean is a source or a sink of CO<sub>2</sub> or at equilibrium at this location</li>
  <li>Evaluate the relative importance of variables that affect CO<sub>2</sub> concentration and flux at this location</li>
  <li>Predict the location of the mystery site by comparing to data from known regions, and justify your prediction with reference to the data </li>
</ul>

<?php endif; ?>


<!-- DATA CHART -->

<?php if ($level=='exploration1' || $level=='exploration2'): ?>

<div id="chart1" style="width:800px; height: 250px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>

<?php endif; ?>


<?php if ($level=='invention1' || $level=='invention2' || $level=='application'): ?>

<div id="chart1" style="width:800px; height: 250px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 180px; margin-top: 20px;"></div>

<div class="row" id="div_parameter" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="parameter" value="sst" onclick="toggle_lines()" checked> 
      Sea Surface Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="parameter" value="salinity" onclick="toggle_lines()" > 
      Salinity</label><br>
    <label style="font-weight: normal;"><input type="radio" name="parameter" value="wind" onclick="toggle_lines()" > 
      Wind Speed</label><br>
    <label style="font-weight: normal;"><input type="radio" name="parameter" value="chl" onclick="toggle_lines()" > 
      Chlorophyll</label><br>
    <label style="font-weight: normal;"><input type="radio" name="parameter" value="cdom" onclick="toggle_lines()" > 
      CDOM</label>
  </div>
</div>

<?php endif; ?>

<?php if ($level=='exploration2' || $level=='invention2' || $level=='application'): ?>

<div class="row" id="div_mooring" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select location:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="mooring" value="CE03" onclick="toggle_lines()" checked> 
      Washington Shelf Surface Mooring</label><br>
    <label style="font-weight: normal;"><input type="radio" name="mooring" value="CP01" onclick="toggle_lines()" > 
      Pioneer Centra Profiler Mooring</label><br>
    <?php if ($level=='application'): ?>
    <label style="font-weight: normal;"><input type="radio" name="mooring" value="mystery" onclick="toggle_lines()" > 
      Mystery Site</label><br>
    <?php endif; ?>

  </div>
</div>

<?php endif; ?>

<?php if ($level=='invention1' || $level=='invention2'): ?>

<div class="row" style="margin-top:10px;">
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary disabled" id="prev" onclick="changeState('prev')">Previous</a></p>
  </div>
  <div class="col-md-8">
    <p id="btext" class="text-center">This graph shows the partial pressure of CO<sub>2</sub> in both the Atmosphere and Ocean.  Click the next button to see the resultant CO<sub>2</sub> flux across the air-sea interface.</p>
  </div>
  <div class="col-md-2">
    <p class="text-center"><a class="btn btn-primary" id="next" onclick="changeState('next')">Next</a></p>
  </div>
</div>

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
  if ($level=='exploration1') {
    $scripts[] = "javascript/co2_exploration1.js";    
  }
  if ($level=='exploration2') {
    $scripts[] = "javascript/co2_exploration2.js";    
  }
  if ($level=='invention1') {
    $scripts[] = "javascript/co2_invention1.js";    
  }
  if ($level=='invention2') {
    $scripts[] = "javascript/co2_invention2.js";    
  }
  if ($level=='application') {
    $scripts[] = "javascript/co2_application.js";    
  }
?>  


<h3>Data Tips</h3>

<?php if ($level=='exploration1' || $level=='exploration2' || $level=='invention1' || $level=='invention2'): ?>
<p>When the site loads, you are able to see the full dataset of pCO<sub>2</sub> in air and water from the Oregon Shelf Surface Buoy in the Coastal Endurance Array. As you proceed through the exploration, you will be able to see similar data from the ??? Surface Buoy in the Pioneer Array. You can interact with the data by:</p>
<ul>
  <li>Clicking "next" to reveal annotations and additional data</li>
  <li>Turning on and off different oceanic and atmospheric variables to compare their data to the CO<sub>2</sub> data</li>
  <li>Moving the red slider along the data to help you correlate events between graphs</li>
  <li>Zooming in and out of the data to look at different timescales that interest you by changing the width of the highlighted section of the bottom graph (if loads with all the data highlighted)</li>
</ul>

<?php elseif ($level=='application'): ?>
<p>When the site loads, you are able to see the full dataset of pCO<sub>2</sub> in air and water at the mystery site, with comparisons to the Pioneer and Endurance (Oregon) sites. You can interact with the data by:</p>
<ul>
  <li>Clicking "next" to reveal additional data</li>
  <li>Turning on and off different oceanic and atmospheric variables to compare their data to the CO<sub>2</sub> data</li>
  <li>Moving the red slider along the data to help you correlate events between graphs</li>
  <li>Zooming in and out of the data to look at different timescales that interest you by changing the width of the highlighted section of the bottom graph (if loads with all the data highlighted)</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration1' || $level=='exploration2' || $level=='invention1' || $level=='invention2'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What do the units on the axes mean?</li>
      <li>What time period does this data cover?</li>
      <li>How complete is this dataset? Are there gaps or is it relatively continuous?</li>
      <li>Which is greater, the concentration of CO<sub>2</sub> in the atmosphere or in the water? (Does the answer to this question vary?)</li>
      <li>Which is more variable, the concentration of CO<sub>2</sub> in the atmosphere or in the water?</li>
      <li>Where does the concentration of CO<sub>2</sub> in the water increase? Decrease?</li>
      <li>When comparing sites, which (if any) is more variable?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What is the general relationship between flux direction and atmospheric/oceanic CO<sub>2</sub> concentrations? </li>
      <li>What patterns can you observe in each individual dataset? How often do these patterns repeat?</li>
      <li>What does it mean when water CO<sub>2</sub> is rising? How about falling?</li>
      <li>Compare patterns in atmospheric and oceanic variables to patterns in water CO<sub>2</sub> concentration. Which variables are strongly correlated with CO<sub>2</sub>? Which ones are weakly correlated? Which ones seem to have no relationship?</li>
      <li>What atmospheric and oceanic variables are associated with increases in CO<sub>2</sub> concentration in the water?</li>
      <li>What atmospheric and oceanic variables are associated with decreases in CO<sub>2</sub> concentration in the water?</li>
      <li>Where in these graphs is the ocean a source of CO<sub>2</sub>? Where is it a sink? Comparing between sites and/or across time, where are the greatest source and sink events?</li>
      <li>What atmospheric and oceanic variables have the greatest effect on CO<sub>2</sub> exchange between air and sea? (I.e., which ones are most important?)
      <li>How does the relative importance of these variables vary over time and from place to place?</li>
      <li>How can you have a negative CO<sub>2</sub> flux without increasing pCO<sub>2</sub> in the ocean?</li>
      <li>How and why does air-sea flux vary seasonally?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What do the units on the axes mean?</li>
      <li>What time period does this data cover?</li>
      <li>How complete is this dataset? Are there gaps or is it relatively continuous?</li>
      <li>Which is greater, the concentration of CO<sub>2</sub> in the atmosphere or in the water? (Does the answer to this question vary?)</li>
      <li>Which is more variable, the concentration of CO<sub>2</sub> in the atmosphere or in the water?</li>
      <li>Where does the concentration of CO<sub>2</sub> in the water increase? Decrease?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>By examining patterns in multiple datasets for the mystery site, predict when/whether the mystery site is a CO<sub>2</sub> source or sink</li>
      <li>Examine temperature, salinity, wind speed, and chlorophyll concentration for the mystery site. Using what you understand about how these variables affect ocean pCO<sub>2</sub>, predict the pattern in ocean pCO<sub>2</sub> for the final year. (not possible)</li>
      <li>What would happen to the air-sea CO<sub>2</sub> flux if ocean temperature were raised by 2&deg;C? 4&deg;C?</li>
      <li>Compare patterns of CO<sub>2</sub> concentration, CO<sub>2</sub> flux, and environmental variables between all three sites. What region is the mystery site located in? What similarities between sites allowed you to identify this?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<p>TBD</p>


<h3>Dataset Information</h3>
<p class="text-right"><a href="data/co2_data.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>
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
      <a href="co2.php?level=exploration1" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration 1</h4>
        <p class="list-group-item-text">Explore the exchange of CO<sub>2</sub> between the ocean and atmosphere at one site.</p>
      </a>
      <a href="co2.php?level=invention1" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention 1</h4>
        <p class="list-group-item-text">Explore factors that control the concentration of CO<sub>2</sub> in the ocean and exchanges of CO<sub>2</sub> between the ocean and atmosphere.</p>
      </a>
      <a href="co2.php?level=exploration2" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration 2</h4>
        <p class="list-group-item-text">Explore the exchange of CO<sub>2</sub> between the ocean and atmosphere at 2 sites.</p>
      </a>
      <a href="co2.php?level=invention2" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention 2</h4>
        <p class="list-group-item-text">Explore factors that control the concentration of CO<sub>2</sub> in the ocean and exchanges of CO<sub>2</sub> between the ocean and atmosphere.</p>
      </a>
      <a href="co2.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Evaluate whether a mystery site is a source or a sink of CO<sub>2</sub>, discuss the environmental factors that determine this, and predict the location of the mystery site by comparing to known regions.</p>
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
    <a href="co2_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Pierrehumbert, N., Reed, R., Rhew, R., &amp; Lichtenwalner, C. S. (2020). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
