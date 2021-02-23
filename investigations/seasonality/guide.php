<?php 
  $page_title = 'Seasonality in the Ocean';
  $page = 'investigation';
  
  $base_url = '../../';
  include_once($base_url . 'header_llb.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="../index.php">Investigations</a></li>
  <li><?= $page_title ?></li>
</ol>

<div class="page-header">
    <h2><?= $page_title ?></h2>
</div>

<h3>Instructor Notes</h3>
<p class="pull-right"><a href="index.php" class="btn btn-primary">Go to Investigation</a></p>
<p>This investigation uses sea surface temperature (SST) and ocean color maps to introduce students to the concept that there are temporal and spatial changes in ocean primary production and water temperature in the ocean. The students analyze SST, chlorophyll, and water temperature data from the Eastern U.S. to describe the patterns and trends in the data.</p>

<h4>Instructional Tips</h4>
<p>The goal of this investigation is to introduce the concept that there is seasonality in the ocean, higher primary production and water temperatures along the coast than offshore, and that there are spatial differences in the water temperature along the East Coast of the United States. In addition to seasonality and spatial differences in the ocean, this investigation can be used to as an introduction to spring blooms and heat capacity as well as can be incorporated into lessons that address nutrient availability, runoff and upwelling.</p>

<h4>Preconceptions and Lecture Questions</h4>
<p><strong>Lecture Questions</strong>: You may want to review how to read a SST or chlorophyll image. Additionally, you may want to ask the following questions:</p>
<ul>
  <li>What is phytoplankton?</li>
  <li>How do phytoplankton perform photosynthesis?</li>
  <li>What role do phytoplankton play in the environment (i.e. the food web and carbon cycle)?</li>
</ul>
<p><strong>Misconceptions</strong>: The students may believe that most of the primary production in the ocean occurs during the summer and that ocean water temperatures mimic air temperatures (ignoring the differences in heat capacity).</p>

<h4>Resources</h4>
<ul>
  <li><a href="http://rucool.marine.rutgers.edu/">RU COOL</a> is a source for a wider array of both real time and older ocean data.</li>
</ul>

<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
