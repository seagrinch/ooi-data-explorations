<?php 
  $lesson_title = 'Ecosystem Vertical Structure';
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
  <li><a href="ecosystems.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>

<p>Explore profiles of biotic and abiotic factors, to describe the vertical structure of ocean ecosystems.  Biotic factors include chlorophyll and oxygen, while abiotic factors include light and temperature.</p>

<?php endif; ?>


<!-- DATA CHART -->

<?php if ($level=='exploration'): ?>
<style>
    .dot:hover {
      opacity:1;
    }
</style>
<div id="chart" style="margin-top: 16px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right"><strong>Select locations:</strong></p>
  </div>
  <div class="col-xs-9">
    <label style="color: #4e79a7"><input type="checkbox" class="siteBox" value='gp05' checked > Papa Glider</label> &nbsp;&nbsp;&nbsp;
    <label style="color: #edc949"><input type="checkbox" class="siteBox" value='rs01' > Oregon Slope</label> &nbsp;&nbsp;&nbsp;
    <label style="color: #e15759"><input type="checkbox" class="siteBox" value='cp02' > Pioneer Offshore</label> 
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right"><strong>Select variables:</strong></p>
  </div>
  <div class="col-xs-9">
      <label>Left<select id="selectVar1" class="form-control"></select></label> 
      <label>Center<select id="selectVar2" class="form-control"></select></label> 
      <label>Right<select id="selectVar3" class="form-control"></select></label>
  </div>
</div>
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right"><strong>Select depth range:</strong></p>
  </div>
  <div class="col-xs-9">
      <label><select id="selectDepth" class="form-control"></select></label> 
  </div>
</div>


<?php 
  $scripts[] = "https://d3js.org/d3.v4.js";
  $scripts[] = "https://d3js.org/d3-scale-chromatic.v1.min.js";
  $scripts[] = "https://d3js.org/d3-format.v1.min.js";
  $scripts[] = "javascript/ecosystems.js";
?>  

<?php endif; ?>

<p class="text-right"><a href="data/ecosystem_profiles.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When this page first loads, you will see profiles of 3 different variables from the same location.  Take note of the variables displayed and the x and y axis limits for each.  For example, the graphs will initially show only the top 50 meters of the water column.</p>
<p>You can interact with the full dataset by:</p>
<ul>
  <li>Changing the depth range (y axis) to zoom to specific vertical regions, including the shallow/photic layer or the full measured profiles.</li>
  <li>Selecting different variables to display on each of the profile plots to compare.</li>
  <li>Choosing up to 3 different locations to include on the graphs. Each location is color coded.</li>
</ul>

<p><strong>Variable Descriptions</strong></p>
<ul>
  <li>Photosynthetically Active Radiation (PAR) is the measure of the density of photons per unit area that are in the spectral range of light (400-700 nanometers) that primary producers use for photosynthesis.</li>
  <li>Fluorometric Chlorophyll-a Concentration is an estimate of phytoplankton biomass using fluorescence. The fluorometer emits light at a specific wavelength that is absorbed by chlorophyll and re-emitted as light at a different wavelength. By measuring the intensity of the re-emitted wavelength of light the chlorophyll-a concentration in the surrounding seawater can be estimated. Chlorophyll-a concentrations can be used as a proxy for phytoplankton biomass as it is a dominant photosynthetic pigment.</li>
  <li>Dissolved Oxygen Concentration from the Stable Response Dissolved Oxygen Instrument is a measure of the concentration of gaseous oxygen mixed in seawater. This data product is corrected for salinity, temperature, and depth.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Which variables are shown and what are the units used to describe them? </li>
      <li>How do oceanographers measure light, chlorophyll a and dissolved oxygen?</li>
      <li>At which depth(s) is PAR (light) at its minimum?  Maximum?</li>
      <li>At which depth(s) is chlorophyll a at its minimum?  Maximum?</li>
      <li>At which depth(s) is dissolved oxygen at its minimum?  Maximum?</li>
      <li>At which depth does light disappear?  Do you think it makes sense to use light sensors deeper than 200m?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>Why does light decrease with depth?</li>
      <li>Compare the chlorophyll values between the 3 profiles and describe the patterns you see.</li>
      <li>At which depths do the patterns of chlorophyll and dissolved oxygen match at each array? Where don't they match?</li>
      <li>Are there specific depths where the variables change rapidly?</li>
      <li>At which depth(s) do you see similarities or differences in the profiles between the variables?</li>
      <li>Why do the chlorophyll levels vary with depth?</li>
      <li>How do abiotic factors impact ocean ecosystems (for example, why is light important for life)?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/ecosystems.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_ecosystems/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_ecosystems/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_ecosystems/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p>The data for this activity was obtained from the following instruments and locations.  Click the column and row headers for information on each instrument or location.  Click on the icons to go to the OOI data portal. </p>
<table class="table">
  <thead>
  <tr>
    <th></th>
    <th><a href="https://oceanobservatories.org/instrument-class/ctd/">CTD</a> & <a href="https://oceanobservatories.org/instrument-class/do2/">Dissolved Oxygen</a></th>
    <th><a href="https://oceanobservatories.org/instrument-class/parad//">PAR</a></th>
    <th><a href="https://oceanobservatories.org/instrument-class/fluor/">Fluorometer</a></th>
  </tr>
  </thead>
  <tr>
    <td><a href="https://oceanobservatories.org/site/GP05MOAS/">Global Papa Glider 575</a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#GP05MOAS-PG575-02-DOSTAM000"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#GP05MOAS-PG575-06-PARADM000"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#PG575-03-FLORTM000"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
  </tr>
  <tr>
    <td><a href="https://oceanobservatories.org/site/RS01SBPS/">Oregon Slope Base Shallow Profiler Mooring</a> (2,906m)</td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#RS01SBPS-SF01A-2A-CTDPFA102"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#RS01SBPS-SF01A-3C-PARADA101"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#RS01SBPS-SF01A-3A-FLORTD101"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
  </tr>
  <tr>
    <td><a href="https://oceanobservatories.org/site/CP02PMUO/">Pioneer Upstream Offshore Profiler Mooring</a> (452m)</td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#CP02PMUO-WFP01-02-DOFSTK000"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#CP02PMUO-WFP01-05-PARADK000"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
    <td><a href="https://ooinet.oceanobservatories.org/plot/#CP02PMUO-WFP01-04-FLORTK000"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a></td>
  </tr>
</table>  

<p>Recovered datasets from 2 days after 2018-08-01 for the Oregon and Pioneer locations, and 2016-07-01 for the Papa Glider were downloaded for each instrument from the OOI data portal.  The profiles were then averaged into 20m bins and then merged into a single file for use in this activity.</p>
<p> You can check out this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/March2019/Activities/DL_March_Ecosystems_v3.ipynb">Python Notebook</a> for more information on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore vertical profiles of light, chlorophyll-a and other variables at several locations</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="ecosystems.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore how various variables change with depth and location.</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<!--
<div class="row">
  <div class="col-md-3">
    <a href="ecosystems_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>
-->

<?php endif; ?>

<p><strong>Activity Citation:</strong> Navarro, M., Tuaillon, C., &amp; Lichtenwalner, C. S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>


<?php 
  include_once('../footer.php'); 
?>
