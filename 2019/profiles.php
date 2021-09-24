<?php 
  $lesson_title = 'Profiles of DO and Chlorophyll-a in the Open Ocean';
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
  <li><a href="profiles.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>

<p>Explore how dissolved oxygen and chlorophyll-a change with depth, and how these patterns might relate to photosynthesis in the open ocean.</p>
<!--
<p>Use dissolved oxygen and chlorophyll a profile data from a North Atlantic open ocean site to examine trends with depth.</p>
<ul>
  <li>Explore the graphs below to see what you can observe.</li>
  <li>Describe patterns in dissolved oxygen and chlorophyll a concentrations with depth.</li>
  <li>Recognize seasonal changes in the patterns.</li>
</ul>
-->

<?php endif; ?>


<!-- DATA CHART -->

<?php if ($level=='exploration'): ?>
<div id="chart" style="margin-top: 16px;"></div>

<div style="margin: 14px;" align="left" class="form-inline">
  <label>Select Profile 1: <select id="selectVar1" class="form-control"></select></label> &nbsp;&nbsp;&nbsp;
  <label>Profile 2: <select id="selectVar2" class="form-control"></select></label><br>
  <label>Select Month: <select id="selectMonth" class="form-control"></select></label>
</div>

<?php 
  $scripts[] = "https://d3js.org/d3.v4.js";
  $scripts[] = "https://d3js.org/d3-scale-chromatic.v1.min.js";
  $scripts[] = "https://d3js.org/d3-format.v1.min.js";
  $scripts[] = "javascript/profiles.js";
?>  

<?php endif; ?>

<p class="text-right"><a href="data/rs03axps_profiles.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>When the site loads there will be two blank figures which will show the full depth profiles of dissolved oxygen and chlorophyll a from the Axial Base Shallow Profiler, about 300 miles off the coast of Oregon. You can interact with the data by:</p>
<ul>
  <li>Choosing two different variables to plot side-by-side in the 2 profile plots.</li>
  <li>Exploring how the 2 variables correlate in the right-most graph.</li>
  <li>Comparing changes in the parameters during different times of the year by selecting different months.</li>
</ul>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>Which variables are shown and what are the units used to describe them? </li>
      <li>At which depth(s) is dissolved oxygen at its minimum?  Maximum?</li>
      <li>At which depth(s) is chlorophyll a at its minimum?  Maximum?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>At which depth(s) do you see similarities or differences in the profiles of the two variables?</li>
      <li>Can you identify 2 distinctly different layers through the water column?  Does the appearance or depth of the layers depend on the variable or time of year.</li>
      <li>What process(es) do you think are responsible for the observed relationship(s)?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<?php
  $json_file = file_get_contents('json/profiles.json');  
  $images = json_decode($json_file);
?>
<div class="row">
  <?php foreach ($images as $image): ?>
  <div class="col-xs-6 col-md-3">
    <a href="images_profiles/thumb/<?= $image->file ?>" class="thumbnail" data-toggle="lightbox" data-gallery="gallery" data-title="<?= $image->title ?>" data-footer="<?= htmlspecialchars($image->caption . ' <br><small>[<a href="images_profiles/large/' . $image->file . '" target="_blank">Larger Image</a>]</small>') ?>" class=""><img src="images_profiles/thumb/<?= $image->file ?>" class="img-responsive" alt="" /></a>
  </div>
  <?php endforeach; ?>
</div>


<h3>Dataset Information</h3>
<p>The data for this activity was obtained from the following instruments on the <a href="https://oceanobservatories.org/site/rs03axps/">Axial Base Shallow Profiler Mooring</a>:</p>
<ul>
  <li>CTD & Dissolved Oxygen (<a href="https://ooinet.oceanobservatories.org/plot/#RS03AXPS-SF03A-2A-CTDPFA302">RS03AXPS-SF03A-2A-CTDPFA302</a>)</li>
  <li>3-Wavelength Fluorometer (<a href="https://ooinet.oceanobservatories.org/plot/#RS03AXPS-SF03A-3A-FLORTD301">RS03AXPS-SF03A-3A-FLORTD301</a>)</li>
</ul>
  
<p>Streamed datasets were downloaded for each instrument from the OOI data portal, from the time period 2017-07-31 to 2018-07-03.  These datasets were averaged into half-month profiles every 2m, and then merged into a single file for use in this activity. See this <a href="https://github.com/ooi-data-lab/data-lab-workshops/blob/master/March2019/Activities/DL_March_Profiles_v2_Final.ipynb">Python Notebook</a> for details on how the data for this activity was processed.</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Explore profiles of dissolved oxygen and chlorophyll-a in the open ocean.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="profiles.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">Explore how dissolved oxygen and chlorophyll a change with depth.</p>
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
    <a href="profiles_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>
-->

<?php endif; ?>

<p><strong>Activity Citation:</strong> Anders, T., Long, J., Nuester, J., Weislogel., A, Williams, A., &amp; Lichtenwalner, C. S. (2021). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>


<?php 
  include_once('../footer.php'); 
?>
