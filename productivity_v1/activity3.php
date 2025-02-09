<?php 
  $page = 'home';
  $page_title = 'Activity 3';
  $base_url = '../';
  include_once('../header.php'); 
?>

<h2><small>Data Activity 3</small><br> Chlorophyll Patterns in Polar Oceans Concept Invention</h2>

<h3>Your Objective</h3>
<p>Use chlorophyll-a concentration data, from the 3-wavelength fluorometer, over time to investigate patterns in chlorophyll-a concentrations, as a proxy for phytoplankton biomass, in the polar Atlantic Ocean (<a href="http://oceanobservatories.org/array/global-argentine-basin/">Global Argentine Basin Array</a>) and Pacific Ocean (<a href="http://oceanobservatories.org/array/global-southern-ocean/">Global Southern Ocean Array</a>).</p>

<div class="row">
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" data-toggle="lightbox" data-gallery="gallery" data-footer="Global Argentine Basin and Global Southern Ocean are two of the seven OOI arrays throughout the Pacific and Atlantic Oceans." class=""><img src="images/OOI-Station-Map_Cabled_Array_2015-01-121.jpg" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Global Argentine Basin and Global Southern Ocean are two of the seven OOI arrays throughout the Pacific and Atlantic Oceans.</em></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/Global_Southern_2015-10-07_ver_5-00.png" data-toggle="lightbox" data-gallery="gallery" data-footer="Schematic of the instruments and moorings at the Global Southern Ocean station in the Pacific Ocean. Data in this activity were collected from the Subsurface Flanking Mooring A (C)." class=""><img src="images/Global_Southern_2015-10-07_ver_5-00.png" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Schematic of the instruments and moorings at the Global Southern Ocean station in the Pacific Ocean. Data in this activity were collected from the Subsurface Flanking Mooring A (C).</em></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/Global_Argentine_2015-10-07_ver_5-00.png" data-toggle="lightbox" data-gallery="gallery" data-footer="Schematic of the instruments and moorings at the Global Argentine Basin station in the Atlantic Ocean. Data in this activity were collected from the Subsurface Flanking Mooring A (C)." class=""><img src="images/Global_Argentine_2015-10-07_ver_5-00.png" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Schematic of the instruments and moorings at the Global Argentine Basin station in the Atlantic Ocean. Data in this activity were collected from the Subsurface Flanking Mooring A (C).</em></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/Southern_Ocean_Flanking_Mooring.png" data-toggle="lightbox" data-gallery="gallery" data-footer="Schematic of the different elements of the Global Southern Ocean Subsurface Flanking Mooring. The 3-wavelength flourometer is on the Sub-Surface Buoy in 30m of water." class=""><img src="images/Southern_Ocean_Flanking_Mooring.png" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Schematic of the different elements of the Global Southern Ocean Subsurface Flanking Mooring. The 3-wavelength fluorometer is on the Sub-Surface Buoy in 30m of water.</em></div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="thumbnail">
      <a href="images/Argentine_Flanking_Mooring.png" data-toggle="lightbox" data-gallery="gallery" data-footer="Schematic of the different elements of the Global Argentine Basin Subsurface Flanking Mooring. The 3-wavelength flourometer is on the Sub-Surface Buoy in 30m of water." class=""><img src="images/Argentine_Flanking_Mooring.png" class="img-responsive" alt="" /></a>
      <div class="caption"><em>Schematic of the different elements of the Global Argentine Basin Subsurface Flanking Mooring. The 3-wavelength fluorometer is on the Sub-Surface Buoy in 30m of water.</em></div>
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
<p>What happens to the primary productivity in Polar Oceans over time? </p>

<h3>Exploration</h3>
<p>Investigate the <em>Chlorophyll-a Concentration</em> data over time from each station in the Polar Oceans.</p>

<div id="chart" style="width:800px; height: 400px;"></div>

<div class="row" style="margin-top:10px;">
  <div class="col-xs-3">
    <p class="text-right">Include datasets:</p>
  </div>
  <div class="col-xs-9">
  <label style="font-weight: normal;"><input type="checkbox" id="0" onclick="toggle_visibility(this)" checked> 
    Polar Pacific Ocean (Southern Ocean)</label><br>
  <label style="font-weight: normal;"><input type="checkbox" id="1" onclick="toggle_visibility(this)" checked> 
    Polar Atlantic Ocean (Argentine Basin)</label>
  </div>
</div>

<?php 
  $scripts[] = "../js/dygraph-combined-dev.js";
  $scripts[] = "javascript/activity3.js";
?>  

<h3>Explanation</h3>
<p>Recall that the research challenge you are trying to address is: What happens to the primary productivity in Polar Oceans over a year?</p>
<p>As you consider the data you are investigating, write a reflection on the following questions:</p>
<ul>
  <li>What did you learn about patterns in primary productivity in the Polar Oceans over time? </li>
  <li>What questions do you still have about primary productivity in the Polar Oceans? </li>
</ul>

<?php 
  include_once('../footer.php'); 
?>