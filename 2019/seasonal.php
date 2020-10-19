<?php 
  $lesson_title = 'Seasonal Variability In The Mixed Layer';
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
  <li><a href="seasonal.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','invention','application','application2'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use water temperature observations and atmospheric data (wind and solar heating) from the North Atlantic Ocean to identify patterns and gain insights about interactions between the atmosphere and surface ocean:</p>
<ol>
  <li>Investigate seasonal wind and solar irradiance patterns in the North Atlantic</li>
  <li>Make predictions about how surface winds and solar radiation affect mixing and the temperature structure of the surface ocean.</li>
</ol>

<?php elseif ($level=='invention'): ?>
<p>Use water temperature observations and atmospheric data (wind and solar irradiance) from the North Atlantic Ocean to describe how mixed layer depth varies throughout the year and:</p>
<ol>
  <li>Investigate seasonal wind and solar irradiance patterns in the North Atlantic</li>
  <li>Determine mixed layer depth from time series of temperature</li>
  <li>Derive a conceptual model for the physical forcing of mixed layer dynamics </li>
</ol>

<?php elseif ($level=='application'): ?>
<p>Below are solar irradiance, wind speed and water temperature data from the surface ocean in the North Atlantic Ocean. Apply what you have learned about stratification and the mixed layer from the North Atlantic Ocean to another location.  Toggle on the same data sets collected in the North Pacific Ocean to identify patterns and gain insights about the interaction of various processes:</p>
<ol>
  <li>Investigate seasonal wind and solar irradiance patterns from Ocean Station Papa in the North Pacific Ocean. This station is in a different ocean basin, AND sits at a latitude that is 10 degrees south of the Irminger Array.</li>
  <li>Make predictions about how the interaction of surface ocean processes (wind and solar radiation) will affect the temperature of the ocean at various depths.</li>
</ol>

<?php elseif ($level=='application2'): ?>
<p>Look for patterns in primary productivity in the surface of the North Atlantic Ocean (specifically at the Irminger Sea Array), and relate those patterns to seasonal mixed layer dynamics.</p>

<?php endif; ?>


<!-- DATA CHART -->
<?php if ($level=='exploration'): ?>
<div id="chart1" style="width:800px; height: 160px;"></div>
<div id="chart2" style="width:800px; height: 140px; margin-top: 0px;"></div>
<div id="chart3" style="width:800px; height: 210px; margin-top: 0px;"></div>
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
    <p class="text-right">Specify temperature depths to plot:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="surface" onclick="toggle_lines('surface')" checked> 
      Surface (0-60m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="mid" onclick="toggle_lines('mid')" > 
      Midwater (90-250m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="deep" onclick="toggle_lines('deep')" > 
      Deep (350-1000m)</label> &nbsp;&nbsp;
  </div>
</div>

<?php elseif ($level=='invention'): ?>
<div id="chart1" style="width:800px; height: 160px;"></div>
<div id="chart2" style="width:800px; height: 140px; margin-top: 0px;"></div>
<div id="chart3" style="width:800px; height: 210px; margin-top: 0px;"></div>
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
    <p class="text-right">Specify temperature depths to plot:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="surface" onclick="toggle_lines('surface')" checked> 
      Surface (0-60m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="mid" onclick="toggle_lines('mid')" > 
      Midwater (90-250m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="deep" onclick="toggle_lines('deep')" > 
      Deep (350-1000m)</label> &nbsp;&nbsp;
  </div>
</div>


<?php elseif ($level=='application'): ?>
<div id="chart1" style="width:800px; height: 140px;"></div>
<div id="chart2" style="width:800px; height: 140px; margin-top: 0px;"></div>
<div id="chart3" style="width:800px; height: 120px; margin-top: 0px;"></div>
<div id="chart4" style="width:800px; height: 210px; margin-top: 0px;"></div>
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
    <p class="text-right">Specify temperature depths to plot:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="surface" onclick="toggle_lines('surface')" checked> 
      Surface (0-60m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="mid" onclick="toggle_lines('mid')" > 
      Midwater (90-250m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="deep" onclick="toggle_lines('deep')" > 
      Deep (350-1000m)</label> &nbsp;&nbsp;
  </div>
</div>

<div class="row">
  <div class="col-xs-4">
    <p class="text-right">Show:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="GI" onclick="toggle_lines('GI')" checked> 
      Irminger Sea (North Atlantic)</label><br />
    <label style="font-weight: normal;"><input type="checkbox" id="GP" onclick="toggle_lines('GP')" > 
      Station Papa (North Pacific)</label>
  </div>
</div>


<?php elseif ($level=='application2'): ?>
<div id="chart1" style="width:800px; height: 160px;"></div>
<div id="chart2" style="width:733px; height: 120px; margin-top: 0px;"></div>
<div id="chart3" style="width:733px; height: 120px; margin-top: 0px;"></div>
<div id="chart4" style="width:733px; height: 210px; margin-top: 0px;"></div>
<link rel="stylesheet" href="../js/dygraph-2.1.0/dygraph.css" />
<style type="text/css">
  .dygraph-legend {
    left: 477px !important;
  }
  .dygraph-label.dygraph-ylabel {
    margin-top: -14px;
  }
  #chart1 .dygraph-ylabel {color:#ffd86d;}
  #chart1 .dygraph-y2label {color:#7fc4fb;}
</style>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-4">
    <p class="text-right">Specify temperature depths to plot:</p>
  </div>
  <div class="col-xs-8">
    <label style="font-weight: normal;"><input type="checkbox" id="surface" onclick="toggle_lines('surface')" checked> 
      Surface (0-60m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="mid" onclick="toggle_lines('mid')" > 
      Midwater (90-250m)</label> &nbsp;&nbsp;
    <label style="font-weight: normal;"><input type="checkbox" id="deep" onclick="toggle_lines('deep')" > 
      Deep (350-1000m)</label> &nbsp;&nbsp;
  </div>
</div>

<?php endif; ?>


<?php 
  $scripts[] = "../js/dygraph-2.1.0/dygraph.js";
  $scripts[] = "../js/dygraph-2.1.0/synchronizer.js";
  if ($level=='exploration') {
    $scripts[] = "javascript/seasonal_exploration.js";    
  } elseif ($level=='invention') {
    $scripts[] = "javascript/seasonal_invention.js";
  } elseif ($level=='application') {
    $scripts[] = "javascript/seasonal_application1.js";
  } elseif ($level=='application2') {
    $scripts[] = "javascript/seasonal_application2.js";
  }
?>  


<h3>Data Tips</h3>

<?php if (in_array($level, array('exploration','invention','application2'))): ?>
<p>The plots above show wind, solar irradiance and water temperature (at various depths) data for a multi-year period from the Irminger Sea Array in the North Atlantic Ocean.  Specifically we are using surface meteorological data from the ECMWF reanalysis model, and CTD data from Flanking Mooring B. You can interact with these data by:</p>
<ul>
  <li>Turning on and off water temperature time-series from different depths (surface, mid, deep)</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph</li>
  <li>Hovering over data points to show data values for a specific time</li>
  <li>Hovering over the temperature timeseries to show the corresponding depth profile plot to the right.</li>
</ul>
<?php endif; ?>

<?php if ($level=='application'): ?>
<p>The plots above show wind, solar radiation and water temperature (at various depths) data for a multi-year period from the Ocean Papa Array in the North Pacific Ocean, together with the same data types from the Irminger Sea Array in the North Atlantic Ocean.  Specifically we are using surface meteorological data from the ECMWF reanalysis model, and CTD data from Flanking Mooring B. You can interact with these data by:</p>
<ul>
  <li>Turning on and off water temperature time-series from different depths (surface, mid, deep)</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph</li>
  <li>Hovering over data points to show data values for a specific time</li>
  <li>Hovering over the temperature timeseries to show the corresponding depth profile plot to the right.</li>
</ul>
<?php endif; ?>

<?php if ($level=='application2'): ?>
<p>Additionally, the bottom plot show Chlorophyl-A Concentration measured at 30m depth from a nearby mooring.  Chlorophyll-A Concentration can be used as a proxy for primary productivity.</p>
<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What variables can you investigate in these graphs? What are their units?</li>
      <li>Which of the variables shown here were collected in the ocean? </li>
      <li>When was the data first collected and when was the data last collected? Give these answers in month and year.</li>
      <li>How was the temperature data collected? What do the different colors represent?</li>
      <li>What is the overall range of wind speeds at this site? In what season is windspeed typically highest?  In what season is it typically low?</li>
      <li>What is the overall range of solar irradiance at this site? In what season is irradiance typically high?  In what season is it typically low?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>At which depth is there a larger seasonal range in temperatures (i.e. difference between winter and summer temp), 0 m or 1000 m?</li>
      <li>What does it mean, in terms of ocean stratification, when the temperature values at all depths on a given day are approximately the same (i.e. all the colored lines are squished together)? In what season does this happen?</li>
      <li>What does it mean, in terms of ocean stratification, when the temperature values are quite different on a given day (i.e. the colored lines are spaced far apart)? In what season does this happen?</li>
      <li>What patterns did you observe for wind and solar irradiance above the surface of the ocean at this site?</li>
      <li>What relationship do you observe between wind speed and water column stratification? Consider seasonality. Is the relationship direct or is there a lag time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='invention'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you investigate in these graphs? What are their units?</li>
      <li>Which of the variables shown here were collected in the ocean? </li>
      <li>When was the data first collected and when was the data last collected? Give these answers in month and year.</li>
      <li>How was the temperature data collected? What do the different colors represent?</li>
      <li>What is the overall range of wind speeds at this site? In what season is windspeed typically highest?  In what season is it typically low?</li>
      <li>What is the overall range of solar irradiance at this site? In what season is irradiance typically high?  In what season is it typically low?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>The mixed layer depth is the depth in the water column to which water is actively mixed by surface processes. Can you identify the mixed layer depth at various different points in the year using the data provided here? Compare the late summer to late winter.</li>
      <li>Describe the annual cycle of mixed layer depth at this location.</li>
      <li>How does the annual cycle in wind speed and solar irradiance relate to the mixed layer cycle?</li>
      <li>Draw a conceptual diagram explaining the atmospheric forcing of the mixed layer.</li>
      <li>What questions do you still have about what drives seasonal variability in the mixed layer?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you investigate in these graphs?</li>
      <li>Which of the variables shown here were collected in the ocean?</li>
      <li>When was the data first collected and when was the data last collected? Give these answers in month and year.</li>
      <li>What is the overall range of wind speeds at this site? In the winter? In the summer? How about the range for solar irradiation?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>How do the range of values for the parameters measured at Station Papa differ from the Irminger Sea?</li>
      <li>What patterns do you observe for wind and solar irradiance at Station Papa?</li>
      <li>How does temperature vary over time? How does temperature vary with depth? Are the patterns that you observe here consistent with your conceptual model?</li>
      <li>Is the water column at Station Papa stratified in the upper 1000 m for the full year?  What about at the Irminger Array?</li>
      <li>How do the differences in stratification at the two stations relate to differences in the atmospheric forcing?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application2'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What did you find interesting about what you observed in the data about chlorophyll-a concentration from near the Polar Zones in the Ocean?</li>
      <li>Did you observe any patterns? If so, what were the patterns and for which variables?</li>
      <li>During what time of year is solar radiation the highest?</li>
      <li>During what time of year is the mixed layer depth the shallowest?</li>
      <li>What questions do you still have about chlorophyll-a concentration from near the Polar Zones in the Ocean?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>How does the chlorophyll-a concentration vary over time near the Polar Zones of the Ocean?</li>
      <li>Does there seem to be a connection to mixing processes/mixed layer depth at this site?</li>
      <li>Does this align with your understanding on the limitations of primary production?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  if ($level=='application') {
    $json_file = file_get_contents('json/seasonal2.json');  
  } else { //All other versions
    $json_file = file_get_contents('json/seasonal1.json');    
  }
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_seasonal/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_seasonal/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_seasonal/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h5>What is <em>stratification</em>?</h5>

<h5>What is <em>solar irradiance</em>?</h5>

<?php if (in_array($level, array('application','application2'))): ?>
<h5>What is the <em>Mixed Layer Depth</em> (MLD)?</h5>
<p>This is the depth of mixing in the surface ocean that results in a uniform temperature as you move down in the water column from the surface.  The mixed layer depth can be identified by looking for the depth range of the surface ocean where temperature is relatively constant (above the thermocline). This constant temperature indicates active mixing processes are at work.</p>
<p>The MLD is determined by physical processes such as wind and water density (controlled by temperature and salinity). At this site the major driver of variations in water density are the large temperature variations that happen between winter and summer  temperature during the winter months, while a combination of salinity and temperature drive water density during the summer months. </p>
<p>For this data lab we are viewing these mixed layer dynamics as being a fairly simple function of mechanical wind mixing and energy transfer at the surface (we ignore the impact of salinity). There are other factors, but we are keeping it simple.</p>
<?php endif; ?>

<?php if ($level=='application2'): ?>
<h5>What is <em>primary production</em>?</h5>
<p>Primary production refers here to the process by which phytoplankton in the surface ocean use light from the sun to convert carbon from dissolved carbon dioxide to sugars for cellular growth. Primary production can not be measured directly, but Chlorophyll-a concentrations in the water are measured by instruments and are a "proxy" for estimates of primary production.</p>
<?php endif; ?>


<h3>Dataset Information</h3>
<p class="pull-right"><a href="data/seasonal.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<?php if ($level=='application'): ?>
<p>The <a href="https://oceanobservatories.org/instrument-class/ctd/">CTD</a> data for this activity was obtained from the instruments deployed at <a href="https://datareview.marine.rutgers.edu/sites/view/GI03FLMB">Irminger Sea Flanking Mooring B</a> and <a href="https://datareview.marine.rutgers.edu/sites/view/GP03FLMB">Station Papa Flanking Mooring B</a>.</p>
<?php else: ?>
<p>The <a href="https://oceanobservatories.org/instrument-class/ctd/">CTD</a> data for this activity was obtained from the instruments deployed at <a href="https://datareview.marine.rutgers.edu/sites/view/GI03FLMB">Irminger Sea Flanking Mooring B</a>.</p>
<?php endif; ?>

<p>Because the timeseries for the global Surface Moorings at each array is rather gappy, due to harsh weather conditions and instrument failures, we used the <a href="https://www.ecmwf.int/en/forecasts/datasets/reanalysis-datasets/era5">ERA5 Reanalysis Model</a> from ECMWF to provide sea surface temperatures (0m), wind speed and irradiance data for each mooring.</p>

<p>Recovered datasets for each CTD (from 30m to 1,000m) were downloaded from the OOI data portal, cleaned, and then daily (mean) averaged, before being combined with the model reanalysis dataset and averaged again into weekly values in order to showcase seasonal cycles instead of daily variabilty.</p>

<?php if ($level=='application2'): ?>
<p>For this activity, we also included chlorophyll-a data, as measured by the <a href="https://oceanobservatories.org/instrument-class/fluor/">Fluorometers</a> on both Flanking Moorings, primarily <a href="https://ooinet.oceanobservatories.org/plot/#GI03FLMA-RIS01-05-FLORTD000">GI03FLMA-RIS01-05-FLORTD000</a>.</p>
<?php endif; ?>

<?php if (in_array($level, array('application','application2'))): ?>
<p>To calculate the estimated Mixed-Layer Depth for each time step, we interpolated the measured temperature profile and then found the depth that was 0.5&deg;C less than the surface temperature.</p>
<?php endif; ?>


<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/August2019/DL_August_Seasonal_MLD_v2.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore seasonal changes in water column stratification</small></h2>
</div>
<p>Across much of the ocean's surface wind actively mixes a thin layer of water. This mixing results in constituents like temperature and salinity being evenly distributed within this layer.  The factors that contribute to the characteristics of that mixed layer (e.g. wind and solar irradiance) vary in location and time, especially over seasons, leading to variations in space and time in the depth of that well mixed layer.  This data lab will allow students to examine real data from two locations in the ocean to study these interacting processes, and how they influence the depth and characteristics of the mixed layer.</p>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="seasonal.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">How does solar radiation and wind speed relate to temperature variations and stratification in the surface ocean?</p>
      </a>
      <a href="seasonal.php?level=invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">What is a mixed layer and how is it influenced by irradiance and wind speed?</p>
      </a>
      <a href="seasonal.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application #1</h4>
        <p class="list-group-item-text">Develop a simple conceptual model for how wind and solar heating control surface mixing in the ocean, and apply them at a different location.</p>
      </a>
      <a href="seasonal.php?level=application2" class="list-group-item">
        <h4 class="list-group-item-heading">Application #2</h4>
        <p class="list-group-item-text">How do mixed layer dynamics interact with primary production in the surface ocean?</p>
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
    <a href="seasonal_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Eveleth, R., Lemkau, K., Miller, I., Smith, S., &amp; Lichtenwalner, C. S. (2020). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
