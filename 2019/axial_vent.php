<?php 
  $lesson_title = 'Changes in a hydrothermal vent community over time';
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
  <li><a href="axial_vent.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('exploration'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h4 style="color:red;">This activity is under construction!</h4>

<h3>Your Objective</h3>
<?php if ($level=='exploration'): ?>
<p>Use HD video to characterize the changes in a hydrothermal vent community over time.  Make comparisons with earthquake count and seawater temperature data to explore potential connections between the geology, chemistry, and biology of a hydrothermal vent ecosystem. </p>
<ol>
  <li>Sample HD video imagery to characterize a hydrothermal vent community and study changes in that community over time.</li>
  <li>Explore data connected to geological processes (earthquake counts) and chemical processes (seawater temperature) to investigate potential correlations between the datasets.</li>

<?php endif; ?>


<!-- DATA CHART -->
<div id="chart1" style="width:800px; height: 250px;"></div>
<div id="chart2" style="width:745px; height: 210px; margin-top: 20px;"></div>


<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "../js/dygraph-synchronizer.js";

  if ($level=='exploration') {
    $scripts[] = "javascript/axial_vent.js";
  }
?>  

<p class="text-right"><a href="data/axial_vent.csv" class="btn btn-sm btn-primary">Download this Dataset</a></p>


<h3>Data Tips</h3>

<?php if ($level=='exploration'): ?>
<p>You can go through the video clips using the slider bar above.  Graphs of the temperature data will only use some of the sensors, not all 24.  The data may be averaged by day, 3-day or 5-day intervals.</p>

<?php endif; ?>


<h3>Questions for Thought</h3>

<?php if ($level=='exploration'): ?>
<div class="row">
  <div class="col-md-6">
    <strong>Orientation Questions</strong>
    <ul>
      <li>What organisms live at hydrothermal vents?</li>
      <li>What environmental factors may influence where animals live at hydrothermal vents?</li>
      <li>What is the time period covered in the video sequence?</li>
      <li>Where are the instruments located in relation to each other?</li>
    </ul>
  </div>
  <div class="col-md-6">
    <strong>Interpretation Questions</strong>
    <ul>
      <li>What changes or patterns did you observe in the video of the hydrothermal vent community?</li>
      <li>What might account for the changes (or lack of changes) observed?</li>
      <li>Are the earthquake counts or seawater temperature correlated to changes observed in the hydrothermal vent community?  Why or why not?</li>
    </ul>
    <strong>Synthesis Questions</strong>
    <ul>
      <li>Describe the relationships between the earthquake counts or seawater temperature data to changes observed in the hydrothermal vent community?  How does this add to your understanding of hydrothermal vent communities?</li>
    </ul>
  </div>
</div>

<?php endif; ?>


<h3>Background Information</h3>
<p>Click on the images below to learn more about where and how the dataset above was collected.</p>
<p>TBD</p>

<h3>Dataset Information</h3>
<p>TBD</p>


<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Observe changes in a hydrothermal vent community over time and compare with characteristics of the chemical and geological environment.</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="axial_vent.php?level=exploration" class="list-group-item">
        <h4 class="list-group-item-heading">Exploration</h4>
        <p class="list-group-item-text">TBD</p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <h4 class="text-center">Learning Cycle Phases Supported</h4>
    <img src="../images/Learning_Cycle_E.png" alt="Learning Cycle Diagram" usemap="#lcmap"/>
  </div>
</div>

<map name="lcmap">
  <area shape="rect" coords="244,36,379,129" href="axial_vent.php?level=exploration" alt="Exploration">
<!--   <area shape="rect" coords="257,152,392,245" href="axial_vent.php?level=invention" alt="Invention"> -->
<!--   <area shape="rect" coords="116,211,251,304" href="axial_vent.php?level=application" alt="Application"> -->
</map>

<p><strong>Citation:</strong> Cho, W., &amp; Lichtenwalner, C.S. (2019). <?= $lesson_title ?>. <em>OOI Data Labs Collection</em>.</p>

<div class="row">
  <div class="col-md-3">
    <a href="axial_vent_guide.php" class="btn btn-primary">Instructor's Guide</a>
  </div>
  <div class="col-md-9">
    <p>If you are a professor and are interested in more information about ways to utilize these Data Explorations, check out the Instructor's Guide for these activities.</p>
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>
