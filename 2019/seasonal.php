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
<?php if (in_array($level, array('exploration','invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use water temperature and atmospheric data from the North Atlantic Ocean to identify patterns and study the interaction between the atmosphere and surface ocean:</p>
<ol>
  <li>Investigate seasonal wind and solar radiation patterns in the North Atlantic</li>
  <li>Make predictions about how surface winds and solar radiation lead to changes in mixing and temperature structure of the ocean.</li>
</ol>

<?php elseif ($level=='invention'): ?>
<p>Use water and atmospheric conditions (above the surface ocean) data collected across different time periods from the North Pacific Ocean to identify patterns and study the interaction of various processes:</p>
<ol>
  <li>Investigate seasonal wind and solar radiation patterns from Ocean Station Papa in the North Pacific Ocean (10 degrees south of the Irminger Array)</li>
  <li>Make predictions about how the interaction of surface ocean processes (wind and solar radiation) leads to changes in the temperature of the ocean at various depths.</li>
</ol>

<?php elseif ($level=='application'): ?>
<p>Look for patterns in the "Chlorophyll-a Concentration" data at each of the stations near the Polar Zones of the Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-irminger-sea/">Irminger Sea Array</a>).</p>

<?php endif; ?>


<!-- DATA CHART -->
<?php if ($level=='exploration'): ?>
<div id="chart1" style="width:800px; height: 180px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 210px; margin-top: 20px;"></div>
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
<div id="chart1" style="width:800px; height: 180px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div id="chart3" style="width:800px; height: 210px; margin-top: 20px;"></div>
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
    <label style="font-weight: normal;"><input type="checkbox" id="GP" onclick="toggle_station('GP')" > 
      Station Papa (North Pacific)</label><br />
    <label style="font-weight: normal;"><input type="checkbox" id="GI" onclick="toggle_station('GI')" > 
      Irminger Sea (North Atlantic)</label>
  </div>
</div>


<?php elseif ($level=='application'): ?>
<div id="chart1" style="width:800px; height: 210px;"></div>
<div id="chart2" style="width:733px; height: 180px; margin-top: 20px;"></div>
<div id="chart3" style="width:733px; height: 180px; margin-top: 20px;"></div>
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
    $scripts[] = "javascript/seasonal_application.js";
  }
?>  


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<?php elseif ($level=='invention'): ?>
<?php elseif ($level=='application'): ?>
<?php endif; ?>

<p>When the site loads, you are able to see the full dataset of wind, solar radiation and water temperature (at various depths) from the Irminger Sea Array.  Specifically we are using Surface Met Data from the Surface buoy, and CTD data from Flaking Mooring B.  You can interact with these data by:</p>
<ul>
  <li>Turning on and off water temperature time-series from different depths (surface, mid, deep)</li>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted).</li>
  <li>Hovering over data points to show data values at a specific time </li>
  <li>Hovering over the temperature timeseries to show the corresponding  depth profile plot to the right.</li>
</ul>

<p><strong>What is the mixed layer depth? </strong></p>
<p>This is the depth of mixing in the surface ocean that results in a consistent temperature profile across upper depths of the oceans. The mixed layer depth can be identified by looking for the depth range of the surface ocean where temperature is relatively constant (above the thermocline). This constant temperature indicates mixing processes.</p>
<p>The MLD is determined by physical processes such as wind and water density (controlled by temperature and salinity) at this site the major driver of water density is temperature during the winter months, while a combination of salinity and temperature drive water density during the summer months. Here we note that we are viewing these mixed layer dynamics as being a fairly simple function of mechanical wind mixing and energy transfer at the surface (we ignore the impact of salinity).  There are other factors, but we are keeping it simple to enhance learning.</p>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you investigate in these graphs? What are their units?</li>
      <li>Which of the variables shown here were collected in the ocean?  Which were collected in the atmosphere?</li>
      <li>What is the timeframe of the data shown?</li>
      <li>What is the shallowest depth that water temperature data were collected?  Are these surface measurements?</li>
      <li>What is the overall range of wind speeds at this site?  In the winter?  In the summer?  How about for solar irradiation?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What patterns did you observe for wind and solar radiation above the surface of the ocean at this site?</li>
      <li>When do you see these changes or patterns?</li>
      <li>How does temperature vary over time?  How does temperature vary with depth?</li>
      <li>The mixed layer depth is the depth in the water column that is actively mixed by surface processes.  Can you identify the mixed layer depth at various different points in the year using the data provided here?</li>
      <li>What questions do you still have about what drives seasonal variability in the mixed layer?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='invention'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What oceanic or atmospheric variables can you investigate in these graphs?</li>
      <li>Which of the variables shown here were collected in the ocean?  Which were collected in the atmosphere?</li>
      <li>Across what time periods are you able to observe oceanic or atmospheric variables in these graphs?
        <ul>
          <li>What is the first month and year there are data?</li>
          <li>What is the last month and year there are data?</li>
        </ul>
      </li>
      <li>What is the overall range of wind speeds at this site?  In the winter?  In the summer?  How about for solar irradiation?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>How do the range of parameters measured at this site differ from the other location that you examined in the "Exploration"?</li>
      <li>What patterns did you observe for wind and solar radiation above the surface of the ocean at this site?</li>
      <li>When did you see these changes or patterns?</li>
      <li>How does temperature vary over time?  How does temperature vary with depth?  Are the patterns that you observe here consistent with your conceptual model?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
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
<p>TBD</p>


<h3>Dataset Information</h3>
<p>TBD</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>SHORT DESCRIPTION</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="seasonal.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">How and why does the mixed layer depth in the ocean vary?</p>
      </a>
      <a href="seasonal.php?level=invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">Develop a simple conceptual model of the controls on surface mixing in the ocean, and apply them at a different location.</p>
      </a>
      <a href="seasonal.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">How do mixed layer depth dynamics interact with primary production in the surface ocean? </p>
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

<p><strong>Activity Citation:</strong> Eveleth, R., Lemkau, K., Miller, I., Smith, S., &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
