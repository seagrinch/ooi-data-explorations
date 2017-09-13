<?php 
  $lesson_title = 'Geologic Features of a Seamount';
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
  <li><a href="activity2.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration','application1','application2'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use depth and angle (tilt from side to side) data of the seafloor from 3 locations on the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) to look if there are patterns over 7 months in 2015.</p>
<ul>
  <li>Make a prediction about what kind of changes or patterns in seafloor depth and angle you may observe over time.</li>
  <li>Explore the data below to see what you can observe.</li>
</ul>

<?php elseif ($level=='application1'): ?>
<p>Use depth and angle (tilt from side to side) data of the seafloor, along with maps of the seafloor from the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) to determine if there are relationships over 4 days in 2015.</p>
<ul>
  <li>Make a prediction about what kind of changes or patterns in seafloor depth, angle, and overall shape you may observe over time.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships over time.</li>
</ul>

<?php elseif ($level=='application2'): ?>
<p>Use depth and angle (tilt from side to side) data of the seafloor along with temperature data from the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) to determine if there are relationships around an eruption event.</p>
<ul>
  <li>Make a prediction about what kind of changes or patterns in seafloor depth, angle, and temperature you may observe over time.</li>
  <li>Compare patterns in the data below to determine what and if there are relationships among the variables.</li>
</ul>

<?php endif; ?>


<?php if ($level=='application1'): ?>
<div id="imgslider">
 <div><img alt="before" src="data/axial_2013.jpg" width="600" height="590" /></div>
 <div><img alt="after" src="data/axial_2015.jpg" width="600" height="590" /></div>
</div>
<?php 
  $scripts[] = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js";
  $scripts[] = "../js/beforeafter/jquery.beforeafter-1.4.min.js";
  $scripts[] = "javascript/geology2_bathy.js";
?>
<?php endif; ?>


<!-- DATA CHARTS -->
<div id="chart1" style="width:730px; height: 250px;"></div>
<div id="chart2" style="width:800px; height: 250px; margin-top: 20px;"></div>
<?php if ($level=='application2'): ?>
<div id="chart3" style="width:730px; height: 250px; margin-top: 20px;"></div>
<?php endif; ?>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include datasets:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)"> 
    International District Vent Field 2 (ID)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)"> 
    Eastern Caldera (EC)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="2" onclick="toggle_visibility(this)" checked> 
    Central Caldera (CC)</label><br>
  </div>
</div>
<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "../js/dygraph-synchronizer.js";

  if ($level=='exploration') {
    $scripts[] = "javascript/geology2e.js";    
  } elseif ($level=='application1') {
    $scripts[] = "javascript/geology2a1.js";
  } elseif ($level=='application2') {
    $scripts[] = "javascript/geology2a2.js";
  }
?>  


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads, you are able to see the seafloor depth and angle (tilt) in the X (east-west) and Y (north-south) directions from 7 months in 2015 at the Axial Seamount. You can interact with the data by:</p>
<ul>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Adding a different location of instruments at the seamount by selecting the other locations.</li>
</ul>
<p>Note - Tilt values are in microradians. One microradian is the amount of angle you'd get if you lifted one end of a straight line that is 1 km long by 1 mm.</p>

<?php elseif ($level=='application1'): ?>
<p>When the site loads, you are able to compare the bathymetry (map of seafloor) in September 2013 or July 2015. You also can see the seafloor depth and angle (tilt) in the X (east-west) and Y (north-south) directions four days in April 2015 at the Axial Seamount. </p>
<p>You can interact with the map by:</p>
<ul>
  <li>Using the green slider at the center of the map to move between the Sep 2013 and Jul 2015 maps as you are interested. </li>
  <li>Selecting the category buttons below to "Show only before" or "Show only after."</li>
</ul>
<p>You can interact with the graphs by:</p>
<ul>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Adding a different location of instruments at the seamount by selecting the other locations.</li>
</ul>
<p>Note - Tilt values are in microradians. One microradian is the amount of angle you'd get if you lifted one end of a straight line that is 1 km long by 1 mm.</p>

<?php elseif ($level=='application2'): ?>
<p>When the site loads, you are able to see the seafloor depth and angle (tilt) in the X (east-west) and Y (north-south) directions, as well as temperature recorded from inside the seafloor sensor, from 7 months in 2015 at the Axial Seamount. You can interact with the data by:</p>
<ul>
  <li>Zooming in and out of the data to look at different time scales that interest you by changing the width of the highlighted section of the bottom graph (it loads with all of the data highlighted). </li>
  <li>Selecting a different part of the time series to explore the data in ways that interest you by moving the highlighted section of the bottom graph to the right or left.</li>
  <li>Adding a different location of instruments at the seamount by selecting the other locations.</li>
</ul>
<p>Note - Tilt values are in microradians. One microradian is the amount of angle you'd get if you lifted one end of a straight line that is 1 km long by 1 mm.</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time period are you able to observe depth and angle (tilt from side to side) data of the seafloor in these graphs? </li>
      <li>What is the first month there are data?</li>
      <li>What is the last month there are data?</li>
      <li>In what direction (North, South, East, or West) is the angle of the seafloor when there is a negative X-tilt? A negative Y-tilt?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in seafloor depth over this time period at the Axial Seamount? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What changes or patterns did you observe in seafloor angle over this time period at the Axial Seamount? </li>
      <li>When did you see these changes or patterns?</li>
      <li>What questions do you still have about why the depth and angle of the seafloor changes over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application1'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what depth range is the seafloor around the Axial Seamount?</li>
      <li>Across what time period are you able to observe depth and angle (tilt from side to side) data of the seafloor in these graphs? 
        <ul>
          <li>What is the first day there are data?</li>
          <li>What is the last day there are data?</li>
        </ul>
      </li>
      <li>In what direction (North, South, East, or West) is the angle of the seafloor when there is a negative X-tilt? A negative Y-tilt?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>In general, what changes did you observe in the seafloor shape from before (Sep 2013) and after (Jul 2015) the event?</li>
      <li>What changes or patterns did you observe in seafloor depth over this time period at the Axial Seamount? 
        <ul>
          <li>When did you see these changes or patterns?</li>
          <li>What is your evidence?</li>
        </ul>
      </li>
      <li>What changes or patterns did you observe in seafloor angle over this time period at the Axial Seamount? 
        <ul>
          <li>When did you see these changes or patterns?</li>
          <li>What is your evidence?</li>
        </ul>
      </li>
      <li>What questions do you still have about why the depth, angle, and shape of the seafloor changes over time?</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application2'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Across what time period are you able to observe depth and angle (tilt from side to side) data of the seafloor in these graphs? 
      What is the first day there are data?
      What is the last day there are data?</li>
      <li>In what direction (North, South, East, or West) is the angle of the seafloor when there is a negative X-tilt? A negative Y-tilt?</li>
      <li>Across what range are you able to observe temperature data of the water, as measured from inside the seafloor sensor?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>When did the eruption event occur?</li>
      <li>What changes or patterns did you observe in depth and angle of the seafloor occurred during the eruption event at the Axial Seamount? 
        <ul>
          <li>When did you see these changes or patterns?</li>
          <li>What is your evidence?</li>
        </ul>
      </li>
      <li>What changes or patterns did you observe in the temperature data around the time of the eruption event?
        <ul>
          <li>When did you see these changes or patterns?</li>
          <li>What is your evidence?</li>
          <li>Why do you think theses changes or patterns occurred?</li>
        </ul>
      </li>
      <li>What questions do you still have about why the depth and angle of the seafloor as well as surrounding water temperature changes during an eruption event?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('images_json/geology2.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_small/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption) ?>" class=""><img src="images_small/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>

<h4>Additional Resources</h4>
<ul>
  <li>Want to convert microradians into degrees? You can use an <a href="https://www.convertunits.com/from/microradian/to/degree">online unit converter</a>.</li>
  <li>Learn how the <a href="http://oceanobservatories.org/instrument-class/botpt/">Bottom Pressure and Tilt sensor</a> measures changes in the seafloor in this <a href="https://www.youtube.com/watch?v=SvoP4LF-Y0M&index=9&list=PLgxHFq3fMoN_C84DULsWyYsDEU80ip52P">Video Blog #9 "Pressure Measurements"</a> from the NOAA Earth-Oceans Interaction Program 2015 cruise to Axial Seamount. </li>
</ul>

<h4>Dataset Information</h4>
<p>The data for this activity was obtained from the following <a href="http://oceanobservatories.org/instrument-class/botpt/">Bottom Pressure and Tilt</a> instruments on the <a href="http://oceanobservatories.org/array/cabled-axial-seamount/">Cabled Axial Seamount</a> array:</p>
<ul>
  <li>Central Caldera  (<a href="https://ooinet.oceanobservatories.org/data_access/?search=RS03CCAL-MJ03F-05-BOTPTA301#RS03CCAL-MJ03F-05-BOTPTA301/streamed_botpt-nano-sample-15s">RS03CCAL-MJ03F-05-BOTPTA301</a>)</li>
  <li>Eastern Caldera (<a href="https://ooinet.oceanobservatories.org/data_access/?search=RS03CCAL-MJ03F-05-BOTPTA301#RS03ECAL-MJ03E-06-BOTPTA302/streamed_botpt-nano-sample-15s">RS03ECAL-MJ03E-06-BOTPTA302</a>)</li>
  <li>International District Vent Field 2 (<a href="https://ooinet.oceanobservatories.org/data_access/?search=RS03CCAL-MJ03F-05-BOTPTA301#RS03INT2-MJ03D-06-BOTPTA303/streamed_botpt-nano-sample-15s">RS03INT2-MJ03D-06-BOTPTA303</a>)</li>
</ul>
<p class="text-center"><a href="data/BOTPT_data.zip" class="btn btn-sm btn-primary">Download this Dataset</a></p>
<p>The above datasets were downloaded from the OOI data portal and downsampled to simplify the datasets for plotting.  Special thanks to William Chadwick for assistance in the processing these data.  For more information about these data and past events, please check out NOAA PMEL's site on <a href="https://www.pmel.noaa.gov/eoi/rsn/index.html">Bottom Pressure and Tilt instruments at Axial Seamount</a>.</p>


<?php if ($level=='exploration'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo2e" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application1'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo2a1" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php elseif ($level=='application2'): ?>
<p class="text-right">Finished the activity?  Please take our quick <a href="https://rutgers.qualtrics.com/jfe/form/SV_9yRCJd5d9smZtCR?Lesson=geo2a2" class="btn btn-sm btn-warning">Student Survey</a></p>
<?php endif; ?>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Help students understand how seamounts are actively changing at mid-ocean ridges by working with seafloor and oceanic data at the Axial Seamount, North Pacific Ocean.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="activity2.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Use depth and angle (tilt from side to side) data of the seafloor from 3 locations on the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) to look if there are patterns over 7 months in 2015.</p>
      </a>
      <a href="activity2.php?level=application1" class="list-group-item">
        <h4 class="list-group-item-heading">Application #1 - Event-in-Detail</h4>
        <p class="list-group-item-text">Use depth and angle (tilt from side to side) data of the seafloor, along with maps of the seafloor from the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) to determine if there are relationships over 4 days in 2015.</p>
      </a>
      <a href="activity2.php?level=application2" class="list-group-item">
        <h4 class="list-group-item-heading">Application #2 - Event Impacts</h4>
        <p class="list-group-item-text">Use depth and angle (tilt from side to side) data of the seafloor along with temperature data from the Axial Seamount in the Northeast Pacific Ocean (Cabled Axial Seamount) to determine if there are relationships around an eruption event.</p>
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
