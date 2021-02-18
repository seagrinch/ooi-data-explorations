<?php 
  $page_title = 'Ocean-Atmosphere Interaction During Storms';
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
<p>In this activity, students will analyze data from gliders and buoys to identify the physical features of the ocean that changed during Hurricane Irene and Superstorm Sandy. They will examine water temperature, wind, wave and backscatter data to describe the temporal and spatial responses to these storms.</p>

<h4>Instructional Tips</h4>
<p>This activity focuses on ocean mixing and the impact of storms on the ocean. It can be included in a hurricane lecture or on a lecture on mixed layer depth and mixing. Students gather information by analyzing and interpreting data on water temperature, waves, wind, and backscatter.</p>

<h4>Preconceptions and Lecture Questions</h4>
<p><strong>Lecture Questions</strong>: You may want to review how hurricanes are formed and the definition of mixed layer depth using the following questions:</p>
<ul>
  <li>How do the ocean and atmosphere interact to form a hurricane?</li>
  <li>What is the mixed layer depth? How is the mixed layer depth formed?</li>
</ul>
<p><strong>Misconceptions</strong>: The students may believe that hurricanes only impact the sea surface and do not affect the lower layers.</p>

<h4>Resources</h4>
<ul>
  <li><a href="http://earthobservatory.nasa.gov/NaturalHazards/event.php?id=79504">Earth Observatory Natural Hazards</a></li>
  <li><a href="http://www.nnvl.noaa.gov/SandyGallery.php">NOAA Environmental Laboratory Hurricane Sandy Gallery</a></li>
</ul>


<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
