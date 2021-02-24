<?php 
  $page_title = 'The Spatial Response from Hurricane Sandy';
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
<p>In this activity, students will study the ocean's response to Hurricane Sandy as it passed through the Mid-Atlantic and made landfall. Students will analyze air pressure, winds, waves and sea level to describe the temporal and spatial responses.</p>

<h4>Instructional Tips</h4>
<p>This activity focuses on ocean mixing and the impact of storms on the ocean. It can be included in a hurricane lecture or on a lecture on mixed layer depth and mixing. Students gather information by analyzing and interpreting data on water temperature, waves, wind, and backscatter.</p>

<h4>Preconceptions and Lecture Questions</h4>
<p>You may want to review how sea level is impacted by both tides and winds.</p>

<h4>Resources</h4>
<ul>
  <li><a href="https://earthobservatory.nasa.gov/images/event/79504">NASA Earth Observatory Hurricane Sandy Gallery</a></li>
  <li><a href="https://www.nesdis.noaa.gov/search/content/sandy">NOAA Environmental Laboratory Hurricane Sandy Collection</a></li>
</ul>

<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
