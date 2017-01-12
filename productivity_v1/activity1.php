<?php 
  $page = 'home';
  $page_title = 'Activity 1';
  $base_url = '../';
  include_once('../header.php'); 
?>

<h2><small>Data Activity 1</small><br> Primary Productivity Exploration</h2>

<h3>Your Objective</h3>
<p>Explore primary productivity by looking at 3-wavelength fluorometer data from the Northern Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).
</p>

<!--   <a href="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" data-toggle="lightbox" data-gallery="gallery" data-footer="Coastal Endurance is one of the seven OOI arrays throughout the Pacific and Atlantic Oceans." class="col-sm-4"><img src="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" class="img-responsive" /></a> -->

<div class="row">
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" data-toggle="lightbox" data-gallery="gallery" data-footer="Coastal Endurance is one of the seven OOI arrays throughout the Pacific and Atlantic Oceans." class=""><img src="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Coastal Endurance is one of the seven OOI arrays throughout the Pacific and Atlantic Oceans.</em></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/Endurance_WA_2015-10-07_ver_3-00.png" data-toggle="lightbox" data-gallery="gallery" data-footer="Schematic of the instruments and moorings at the Coastal Endurance Washington Offshore station in the Pacific Ocean. Data in this activity were collected from the Shelf Surface Mooring (D)." class=""><img src="images/Endurance_WA_2015-10-07_ver_3-00.png" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Schematic of the instruments and moorings at the Coastal Endurance Washington Offshore station in the Pacific Ocean. Data in this activity were collected from the Shelf Surface Mooring (D).</em></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/CE_WA_Shelf_Surface_Mooring.png" data-toggle="lightbox" data-gallery="gallery" data-footer="Schematic of the different elements of the Coastal Endurance Washington Offshore Shelf Surface Mooring. The 3-wavelength flourometer is on the Instrument Package in 7m of water." class=""><img src="images/CE_WA_Shelf_Surface_Mooring.png" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Schematic of the different elements of the Coastal Endurance Washington Offshore Shelf Surface Mooring. The 3-wavelength flourometer is on the Instrument Package in 7m of water.</em></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/eco-triplet.jpg_0.jpeg" data-toggle="lightbox" data-gallery="gallery" data-footer='Wetlabs ECO Triplet <a href="http://wetlabs.com/eco-triplet">3-wavelength flourometer</a> instrument collected the data for this activity.' class=""><img src="images/eco-triplet.jpg_0.jpeg" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Wetlabs ECO Triplet <a href="http://wetlabs.com/eco-triplet">3-wavelength fluorometer</a> instrument collected the data for this activity.</em></div>
    </div>
  </div>
</div>

<h3>Challenge</h3>
<p>What kind of patterns can we observe in data we collect about primary productivity?</p>

<h3>Exploration</h3>
<p>Select another variable (in addition to the blue plotted <em>Chlorophyll-a Concentration</em> data) to explore the data in ways that interest you. Zoom in and out of the data to look at different time scales that interest you.</p>

<div id="chart" style="width:800px; height: 400px;"></div>
<style>
  #chart .dygraph-ylabel {color:#00457C;}
  #chart .dygraph-y2label {color:#DBA53A;}
</style>
  
<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select the second parameter:</p>
  </div>
  <div class="col-xs-9">
    <select class="form-control" onchange="change_var2(this)">
      <option value="1">Colored Dissolved Organic Matter (CDOM)</option>
      <option value="2">Total Volume Scattering Coefficient (TVSC)</option>
      <option value="3">Optical Backscatter (OBS)</option>
      <option value="4">Total Scattering Coefficient of Pure Seawater (TSCPS)</option>
    </select>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/activity1.js";
?>  

<h3>Explanation</h3>
<p>Recall that the research challenge you are trying to address is: What kind of patterns can we observe in data we collect about primary productivity?</p>
<p>As you consider the data you are investigating, write a reflection on the following questions:</p>
<ul>
  <li>What did you find interesting about the patterns you observed in the primary productivity data? </li>
  <li>What questions do you still have about primary productivity and data of primary productivity? </li>
</ul>

<?php 
  include_once('../footer.php'); 
?>