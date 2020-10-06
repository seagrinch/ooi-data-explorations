<?php 
  $lesson_title = 'Factors Affecting Primary Production';
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
  <li><a href="production.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('invention','application'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='invention'): ?>
<p>What can you observe about the relationship between light, nutrients, temperature, and primary production in the Southern Hemisphere Polar Pacific Ocean?</p>

<?php elseif ($level=='application'): ?>
<p>Can you predict the pattern of light availability and nutrients based on the primary productivity data in the Southern Hemisphere Polar Pacific Ocean?</p>
<p>Explore the data below to see what you can observe about how primary productivity varies over three years.</p>

<?php endif; ?>


<!-- DATA CHART -->

<?php if ($level=='invention'): ?>
<div id="chart1" style="width:800px; height: 210px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a parameter:</p>
  </div>
  <div class="col-xs-9">
    <label style="font-weight: normal;"><input type="radio" name="second" value="1" onclick="toggle_radio(this)" checked> 
      Water Temperature</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="4" onclick="toggle_radio(this)" > 
      Light</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="3" onclick="toggle_radio(this)" > 
      Nutrients</label><br>
    <label style="font-weight: normal;"><input type="radio" name="second" value="2" onclick="toggle_radio(this)" > 
      Salinity</label><br>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<h4>Variable 1 - Light</h4>
<p>Use your cursor to draw your prediction of how light availability would vary over the same time frame.</p>
<div id="chart1" style="width:800px; height: 210px;"></div>
<div id="chart2" style="width:800px; height: 180px; margin-top: 20px;"></div>

<p style="font-style: italic; margin-top:16px;">Take a look at the above chart.  Use your mouse to draw your prediction for what the rest of the Irradiance dataset should look like.  After you have made your estimate, click the "Check Prediction" box.</p>
<div class="row" style="margin-top:10px;">
  <div class="col-md-8">
  </div>
  <div class="col-md-3">
    <label style="font-weight: normal;"><input type="checkbox" id="showObs" onclick="show_obs2(this)"> Check Prediction</label>
  </div>
  <div class="col-md-1">
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="confirmModal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p><strong>Are you ready to show the actual measured observations?</strong></p>
        <p>If you haven't made a prediction yet, please click "Cancel" and draw your prediction on the graph before showing the results.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="modal_cancel2();">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="modal_confirm2();">Show Observations</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<h4>Variable 2 - Nutrients</h4>
<p>Use your cursor to draw your prediction of how nutrient concentration would vary over the same time frame.</p>
<div id="chart1b" style="width:800px; height: 210px;"></div>
<div id="chart3" style="width:800px; height: 180px; margin-top: 20px;"></div>

<p style="font-style: italic; margin-top:16px;">Take a look at the above charts.  Use your mouse to draw your prediction for what the rest of the Nitrate dataset should look like.  After you have made your estimate, click the "Check Prediction" box.</p>
<div class="row" style="margin-top:10px;">
  <div class="col-md-8">
  </div>
  <div class="col-md-3">
    <label style="font-weight: normal;"><input type="checkbox" id="showObs" onclick="show_obs3(this)"> Check Prediction</label>
  </div>
  <div class="col-md-1">
  </div>
</div>
<p id="note3" class="alert alert-warning collapse">Unfortunately, due to an instrument issue, we do not have a complete record of nitrate data for this location.  However, based on what you can see from the relationship between chlorophyll and nitrate for the periods where we do have data, can you explain your reasoning for your prediction?</p>

<div class="modal fade" tabindex="-1" role="dialog" id="confirmModal3">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p><strong>Are you ready to show the actual measured observations?</strong></p>
        <p>If you haven't made a prediction yet, please click "Cancel" and draw your prediction on the graph before showing the results.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="modal_cancel3();">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="modal_confirm3();">Show Observations</button>
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
  if ($level=='invention') {
    $scripts[] = "javascript/production_invention.js";    
  }
  if ($level=='application') {
    $scripts[] = "../js/moment.js";
    $scripts[] = "javascript/production_application.js";    
  }
?>

<h3>Data Tips</h3>

<?php if ($level=='invention'): ?>
<p>When the site loads, you will be able to see the chlorophyll a concentration dataset from the Global Southern Ocean Apex surface Mooring (12/2018 - 10/2019). You can interact with your data by turning on and off different factors to see if they correlate to the chlorophyll data.</p>

<?php elseif ($level=='application'): ?>
<p>When the site loads, the graph for <strong>Variable 1 - Light</strong> will show the chlorophyll a concentration dataset from the Global Southern Ocean Apex surface Mooring from December 2015 to October 2019. On the graph below, the light availability for December 2018 to October 2019 is also shown.</p>
<ul>
  <li>Using your cursor to make a prediction of what the light availability data would look like from December 2015 to November 2018.</li>
  <li>Select "Show Actual Observations" to compare your predictions against the actual change in light availability data from December 2015 to November 2018.</li>
</ul>
<p>When the site loads, the graph for <strong>Variable 2 - Nutrients</strong> will show the chlorophyll a concentration dataset from the Global Southern Ocean Apex surface Mooring from December 2015 to October 2019. On the graph below, the nutrient concentration for December 2018 to October 2019 is also shown.</p>
<ul>
  <li>Using your cursor to make a prediction of what the light availability data would look like from December 2015 to November 2018.</li>
  <li>Since nutrient concentration data was not available for the selected time frame, check with your instructor for an estimation of the correct pattern.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='invention'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Notice the months and dates along the X-axis.  Think about where this data was obtained. 
        <ul>
          <li>Which months are summer?</li>
          <li>Which months are winter?</li>
        </ul>
      </li>
      <li>Describe the pattern of primary productivity for the time frame shown.</li>
      <li>What abiotic factors do you think will impact primary production?</li>
      <li>Toggle factors on and off to help you understand the relationships between abiotic factors and primary production.</li>
      <li>Examine each data set based on the following:
        <ul>
          <li>Primary Production (chlorophyll a)</li>
          <li>Nutrients (nitrates)</li>
          <li>Light (spectral irradiance)</li>
          <li>Temperature (&deg;C)</li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>Compare primary productivity and nutrients; explain any relationships you observe.</li>
      <li>Compare primary productivity and light; explain any relationships you observe.</li>
      <li>Compare primary productivity and temperature; explain any relationships you observe.</li>
      <li>Synthesize your observations by explaining which factors lead to the pattern of primary productivity shown.</li>
    </ul>
  </div>
</div>

<?php elseif ($level=='application'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Notice the months and dates along the X-axis.  Think about where this data was obtained.
        <ul>
          <li>Which months are summer?</li>
          <li>Which months are winter?</li>
        </ul>
      </li>
      <li>Describe the pattern of primary productivity for the time frame shown.</li>
      <li>Examine each data set based on the following:
        <ul>
          <li>Primary Production (chlorophyll a)</li>
          <li>Nutrients (nitrates)</li>
          <li>Light (spectral irradiance)</li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>How did your prior knowledge of the relationships between primary productivity, light and nutrients inform your predictions of the missing data?</li>
      <li>How well did your predictions match the correct patterns?</li>
      <li>Describe some possible explanations for any discrepancies between the predicted and correct patterns.</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/production.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_production/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_production/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_production/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p class="pull-right"><a href="data/production_invention.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>

<p>The data for this activity was obtained from the following instruments on the <a href="https://oceanobservatories.org/site/gs01sumo/">Global Souther Ocean Surface Mooring</a>.</p>
<ul>
  <li><a href="https://oceanobservatories.org/instrument-class/fluor/">Fluorometer</a> (<a href="https://ooinet.oceanobservatories.org/plot/#GS01SUMO-RID16-02-FLORTD000">GS01SUMO-RID16-02-FLORTD000</a>)</li>
  <li><a href="https://oceanobservatories.org/instrument-class/nutnr/">Nitrate</a> (<a href="https://ooinet.oceanobservatories.org/plot/#GS01SUMO-RID16-07-NUTNRB000">GS01SUMO-RID16-07-NUTNRB000</a>)</li>
  <li><a href="https://oceanobservatories.org/instrument-class/spkir/">Spectral Irradiance</a> (<a href="https://ooinet.oceanobservatories.org/plot/#GS01SUMO-RID16-08-SPKIRB000">GS01SUMO-RID16-08-SPKIRB000</a>)</li>
  <li><a href="https://oceanobservatories.org/instrument-class/ctd/">CTD</a> (<a href="https://ooinet.oceanobservatories.org/plot/#GS01SUMO-RID16-03-CTDBPF000">GS01SUMO-RID16-03-CTDBPF000</a>)</li>
</ul>

<p>Telemetered datasets were downloaded from the OOI data portal, and then daily (mean) averages of temperature, salinity, chlorophyll-a, salinity-corrected-nitrate and downwelling spectral irradiance were calculated and merged together into a single file.</p>

<p>See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/July2019/DL_July_Productivity_v1.ipynb">Jupyter Notebook</a> for details on how the data for this activity was processed.</p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore the effect of abiotic factors on primary production.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="production.php?level=invention" class="list-group-item">
        <h4 class="list-group-item-heading">Concept Invention</h4>
        <p class="list-group-item-text">Explore the effect of abiotic factors, such as nutrient concentration, light availability, and temperature, on primary productivity.</p>
      </a>
      <a href="production.php?level=application" class="list-group-item">
        <h4 class="list-group-item-heading">Application</h4>
        <p class="list-group-item-text">Explore the effect of abiotic factors, such as nutrient concentration, light availability, and temperature, on primary productivity.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_CA.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<div class="row">
  <div class="col-md-3">
    <a href="production_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>

<p><strong>Activity Citation:</strong> Anastasia, J., DiSantis, D., Iacchei, M., &amp; Lichtenwalner, C. S. (2020). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<?php 
  include_once('../footer.php'); 
?>
