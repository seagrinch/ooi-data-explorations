<?php 
  $page = 'home';
  $page_title = 'Activity 4A';
  $base_url = '../';
  include_once('../header.php'); 
?>

<h2><small>Data Activity 4A</small><br> Comparing Regional Chlorophyll Patterns Over a Year Application Data Activity</h2>

<h3>Your Objective</h3>
<p>Explore chlorophyll-a concentration data, from the 3-wavelength fluorometer, over time at different locations to investigate regional differences and similarities in primary productivity. </p>

<div class="row">
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" data-toggle="lightbox" data-gallery="gallery" data-footer="There are seven OOI arrays throughout the Pacific and Atlantic Oceans." class=""><img src="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" class="img-responsive" alt="" /></a>
      <div class="caption"><em>There are seven OOI arrays throughout the Pacific and Atlantic Oceans.</em></div>
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
      <div class="caption"><em>Schematic of the different elements of the Coastal Endurance Washington Offshore Shelf Surface Mooring. The 3-wavelength fluorometer is on the Instrument Package in 7m of water.</em></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/eco-triplet.jpg_0.jpeg" data-toggle="lightbox" data-gallery="gallery" data-footer='Wetlabs ECO Triplet <a href="http://wetlabs.com/eco-triplet">3-wavelength flourometer</a> instrument collected the data for this activity.' class=""><img src="images/eco-triplet.jpg_0.jpeg" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Wetlabs ECO Triplet <a href="http://wetlabs.com/eco-triplet">3-wavelength fluorometer</a> instrument collected the data for this activity.</em></div>
    </div>
  </div>
</div>

<h3>Challenge A</h3>
<p>How does primary productivity vary over a year?</p>

<h3>Exploration</h3>
<p>Investigate the "Chlorophyll-a Concentration" data among the seasons in the Temperate Pacific Ocean (<a href="http://oceanobservatories.org/array/coastal-endurance/">Coastal Endurance Array</a>).</p>

<div id="chart" style="width:800px; height: 400px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Select a season to zoom to see:</p>
  </div>
  <div class="col-xs-9">
  <p>
    <button class="btn btn-primary btn-sm" onclick="date_button('spring');">Spring</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('summer')">Summer</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('fall')">Fall</button>
    <button class="btn btn-primary btn-sm" onclick="date_button('winter')">Winter</button>
  </p>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/activity4a.js";
?>  

<h3>Explanation</h3>
<p>Recall that the research challenge you are trying to address is: How does primary productivity vary over a year?</p>
<p>As you consider the data you are investigating, write a reflection on the following question:</p>
<ul>
  <li>What similarities and differences can you find in patterns of primary productivity over the year?  </li>
</ul>

<?php 
  include_once('../footer.php'); 
?>