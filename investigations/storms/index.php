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

<div style="border: 1px solid #0195bd;padding:23px;margin-bottom:20px;" class="clearfix">
    <!-- datasets data array -->

    <div class="tabbable">
        <ul id="llbnav" class="nav nav-tabs">
            <li class="active"><a href="#intro" data-toggle="tab">Introduction</a></li>
            <li><a href="#background" data-toggle="tab">Background</a></li>
            <li><a href="#challenge" data-toggle="tab">Challenge</a></li>
            <li id="llb2" class="dropdown">
                <a href="#" class="dropdown-toggle" id="exploration_tab" data-toggle="dropdown">Exploration</a>
                <ul class="dropdown-menu">
                    <li><a href="#exploration" data-toggle="tab">Exploration</a></li>
                    <li><a href="#dataset0" data-toggle="tab">Gliders: Sea-going drones</a></li>
                    <li><a href="#dataset1" data-toggle="tab">Glider Data from Hurricane Irene</a></li>
                    <li><a href="#dataset2" data-toggle="tab">Glider Day from Superstorm Sandy</a></li>
                    <li><a href="#dataset3" data-toggle="tab">Buoys: Oceanic weather stations</a></li>
                    <li><a href="#dataset4" data-toggle="tab">NOAA buoy observations of Hurricane Irene</a></li>
                    <li><a href="#dataset5" data-toggle="tab">NOAA buoy observations of Superstorm Sandy</a></li>
                </ul>
            </li>
            <li><a href="#explanation" data-toggle="tab">Explanation</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="intro">
                <h3>Introduction</h3>

                <div id="carousel-intro" class="carousel slide pull-right" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <a href="images/intro1.png" target="_blank"><img src="images/intro1.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Spatial extent of Hurricane Irene, August 27, 2011.</p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/intro2.png" target="_blank"><img src="images/intro2.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>National Weather Service tracks for hurricanes Irene (purple) and Sandy (orange).</p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/intro3.png" target="_blank"><img src="images/intro3.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Sediment in NY Harbor following Hurricane Irene. Credit: <a href="http://earthobservatory.nasa.gov/NaturalHazards/view.php?id=51975">NASA</a></p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/intro4.png" target="_blank"><img src="images/intro4.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Blackout in NJ and NY following Hurricane Sandy</p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/intro5.png" target="_blank"><img src="images/intro5.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Damage to the barrier island by Hurricane Sandy in Mantoloking, NJ. Credit: <a href="http://earthobservatory.nasa.gov/NaturalHazards/view.php?id=79622">NASA</a></p>
                            </div>
                        </div>
                    </div><!-- /.carousel-inner -->
                    <!-- Controls -->
                     <a class="left carousel-control" href="#carousel-intro" role="button" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#carousel-intro" role="button" data-slide="next"> <span class="sr-only">Next</span></a>
                </div><!-- /.carousel -->

                <div class="field field-name-field-introductory-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Hurricanes can cause catastrophic damage to areas in their path. Atlantic hurricanes have strong impacts predominately in the Gulf Coast region and the eastern seaboard. Two devastating storms that hit the East Coast in the start of the 21st century are Hurricane Irene and Superstorm Sandy. Hurricane Irene made landfall on August 27, 2011 in North Carolina with sustained winds of approximately 137 km/h (85 mph). The storm resulted in 40 deaths and flooding records for 26 rivers. Superstorm Sandy made land fall on October 29, 2012 in New Jersey and resulted in 117 deaths. At the time of landfall Sandy had a maximum sustained winds of 130km/h (81mph). The storm surge created by Sandy was most dramatic along the New York/New Jersey coasts. The National Hurricane Center lists Sandy as the second costliest hurricane in history with damages totaling $60+ billion. To help predict and prepare for future storms, we must collect data on both atmospheric and oceanic conditions.</p>
                        </div>
                    </div>
                </div><button type="button" class="btn btn-success" data-toggle="tab" data-target="background" onclick="jQuery('#llbnav li:eq(1) a').tab('show');">Next</button>
            </div><!-- /#intro -->

            <div class="tab-pane" id="background">
                <h3>Background</h3>

                <div class="pull-right">
                    <div id="carousel-background" class="carousel slide pull-right" data-ride="carousel">
                        <!-- class of slide for animation -->

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <a href="images/sandy_vir_2012302.jpg" target="_blank"><img src="images/sandy_vir_2012302.jpg" width="480" height="320" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>The Length of Hurricane Sandy</p>
                                </div>
                            </div>
                        </div><!-- /.carousel-inner -->
                    </div><!-- /.carousel -->
                </div>

                <div class="field field-name-field-background-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>The ocean plays a key role in the formation of hurricanes and is also impacted by these storms. Therefore, to help us better predict the intensity and path of future storms, scientists collect data on both the atmosphere and ocean throughout the storms. Ocean observing robots allow us to collect oceanographic data during storm events without putting scientists into harms way. The following exercise uses data that were collected in the ocean and atmosphere as Hurricane Irene and Superstorm Sandy were passing directly overhead. Data were collected by stationary buoys and free floating gliders, monitoring chances in the ocean and atmosphere. Together, these data allow us to directly observe how ocean and atmosphere interact and how the ocean responds in real time.</p>
                        </div>
                    </div>
                </div><button type="button" class="btn btn-success" data-toggle="tab" data-target="challenge" onclick="jQuery('#llbnav li:eq(2) a').tab('show');">Next</button>
            </div><!-- /#background -->

            <div class="tab-pane" id="challenge">
                <h3>Challenge</h3>

                <div class="pull-right">
                    <div id="carousel-thumbnail" class="carousel slide pull-right" data-ride="carousel">
                        <!-- class of slide for animation -->

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <a href="images/challenge.png" target="_blank"><img src="images/challenge.png" width="480" height="320" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>GOES View of Hurricane Sandy</p>
                                </div>
                            </div>
                        </div><!-- /.carousel-inner -->
                    </div><!-- /.carousel -->
                </div>

                <p>In this activity you will investigate the following research challenge...</p>

                <blockquote>
                    <div class="field field-name-field-challenge-content field-type-text-long field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even">
                                <p>Analyze data from the gliders and buoys to identify the physical features of the ocean that changed during Hurricane Irene and Superstorm Sandy.</p>
                            </div>
                        </div>
                    </div>
                </blockquote><button type="button" class="btn btn-success" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Next</button>
            </div><!-- /#challenge -->

            <div class="tab-pane" id="exploration">
                <h3>Explore the Data</h3>

                <div class="field field-name-field-guidance-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Analyze the datasets below to determine the impacts that Hurricane Irene and Superstorm Sandy had on the ocean. Investigate each piece of evidence and answer the investigation questions for each dataset. After viewing all of the data, continue to the Explanation page for instructions on how to answer the Challenge question. You will need to justify your answers based on the evidence you review here.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset0" data-toggle="tab"><img src="images/Glider%20with%20diver_sm.jpg" width="270" height="116" alt="Gliders: Sea-going drones" title="Gliders: Sea-going drones"></a>

                            <div class="caption">
                                <a href="#dataset0" data-toggle="tab">Gliders: Sea-going drones</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset1" data-toggle="tab"><img src="images/data1.png" width="270" height="116" alt="Glider Data from Hurricane Irene" title="Glider Data from Hurricane Irene"></a>

                            <div class="caption">
                                <a href="#dataset1" data-toggle="tab">Glider Data from Hurricane Irene</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset2" data-toggle="tab"><img src="images/data2.png" width="270" height="116" alt="Glider Day from Superstorm Sandy" title="Glider Day from Superstorm Sandy"></a>

                            <div class="caption">
                                <a href="#dataset2" data-toggle="tab">Glider Day from Superstorm Sandy</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset3" data-toggle="tab"><img src="images/buoy_0_sm.jpg" width="270" height="116" alt="Buoys: Oceanic weather stations" title="Buoys: Oceanic weather stations"></a>

                            <div class="caption">
                                <a href="#dataset3" data-toggle="tab">Buoys: Oceanic weather stations</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset4" data-toggle="tab"><img src="images/vis_ndbc_irene.png" width="270" height="116" alt="NOAA buoy observations of Hurricane Irene" title="NOAA buoy observations of Hurricane Irene"></a>

                            <div class="caption">
                                <a href="#dataset4" data-toggle="tab">NOAA buoy observations of Hurricane Irene</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset5" data-toggle="tab"><img src="images/vis_ndbc_sandy.png" width="270" height="116" alt="NOAA buoy observations of Superstorm Sandy" title="NOAA buoy observations of Superstorm Sandy"></a>

                            <div class="caption">
                                <a href="#dataset5" data-toggle="tab">NOAA buoy observations of Superstorm Sandy</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p>When you're done investigating each dataset, continue to the last section.</p><button type="button" class="btn btn-success" data-toggle="tab" data-target="explanation" onclick="jQuery('#llbnav a[href=#explanation]').tab('show');">Next</button>
            </div>

            <div class="tab-pane" id="dataset0">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Gliders: Sea-going drones</h3>

                <p></p>

                <div class="clearfix">
                    <center>
                        <a href="images/Glider%20with%20diver.jpg"><img src="images/Glider%20with%20diver.jpg" width="886px" alt="Gliders: Sea-going drones"></a>
                    </center>
                </div>

                <p></p>

                <div class="well well-sm">
                  <p>Image: A free floating glider with diver for scale.</p>
                  <p>During Hurricane Irene and Superstorm Sandy, scientists from Rutgers University sent out gliders, underwater robots, to take measurements in the ocean before, during, and after the storms. The gliders collected many types of data, including water temperature, salinity, and the number of particles dissolved in the water (backscatter) and sent it back via an iridium phone to Rutgers scientists safe on the shore.</p>
                  <p>Check out the link below to watch a short video explaining how gliders work and how they have revolutionized oceanographic data collection:</p>
                  <p>For more, check out <a href="https://www.nytimes.com/2013/11/12/science/earth/ocean-drones-plumb-new-depths.html">NY Times: Ocean Drones Plumb New Depths</a>, and this <a href="https://www.nytimes.com/video/science/100000002525812/exploring-the-ocean.html?action=click&gtype=vhs&version=vhs-heading&module=vhs&region=title-area&cview=true&t=57" target="_blank">NY Times Video: Exploring the Ocean.</a></p>
                </div>
            </div>

            <div class="tab-pane" id="dataset1">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Glider Data from Hurricane Irene</h3>

                <p></p>

                <div class="clearfix">
                    <center>
                        <a href="images/data1.png"><img src="images/data1.png" width="886px" alt="Glider Data from Hurricane Irene"></a>
                    </center>
                </div>

                <p></p>

                <div class="well well-sm">
                    <p>The graph on the left shows the track taken by an underwater glider called RU16 as it travelled along the coast of New Jersey before, during and after Hurricane Irene passed through the area.</p>

                    <p>The graph on the right shows the temperature section for the portion of the glider track marked in green. Think of this section as a slice taken out of the ocean, where the y-axis is the depth of the water, the x-axis is the time the measurement was taken (which corresponds to the travel path of the glider) and the temperature of the water at each point is colored.</p>

                    <p>The black line is the depth of the surface mixed layer.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>How did the water temperature in the ocean change as the storm passed? Did it change similarly for all depths?</li>

                            <li>How did the mixed layer depth change?</li>

                            <li>What factors might have played a role in these changes?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset2">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Glider Day from Superstorm Sandy</h3>

                <p></p>

                <div class="clearfix">
                    <center>
                        <a href="images/data2.png"><img src="images/data2.png" width="886px" alt="Glider Day from Superstorm Sandy"></a>
                    </center>
                </div>

                <p></p>

                <div class="well well-sm">
                    <p>The graph on the left above shows the track taken by an underwater glider called RU23 as it travelled along the coast of New Jersey before, during and after Hurricane Sandy passed through the area.</p>

                    <p>The graph on the right shows the temperature and backscatter data collected by the glider for the portion of the glider track marked in green.</p>

                    <p>The black line is the depth of the surface mixed layer.</p>

                    <p>Backscatter is a measure of the amount of small particles suspended in the water column. They could be inorganic material like sediment, or organic like phytoplankton.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>How did the water temperature in the ocean change as the storm passed? Did it change similarly for all depths?</li>

                            <li>How did the mixed layer depth change?</li>

                            <li>How did the backscatter change over time?</li>

                            <li>What factors might have played a role in these changes?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset3">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Buoys: Oceanic weather stations</h3>

                <p></p>

                <div class="clearfix">
                    <center>
                        <a href="images/buoy_0.jpg"><img src="images/buoy_0.jpg" width="886px" alt="Buoys: Oceanic weather stations"></a>
                    </center>
                </div>

                <p></p>

                <div class="well well-sm">
                    <p><br>
                    Scientists from the National Oceanic and Atmospheric Administration (NOAA) have placed buoys in the water along the entire U.S. east coast, which continuously measure atmospheric and oceanic properties. These buoys took measurements throughout both Irene and Sandy.</p>

                    <p>Check out this link for more information about the NOAA buoy network:</p><a href="http://www.ndbc.noaa.gov/" target="_blank">Click here for NOAA's National Data Buoy Center.</a>

                    <p><br>
                    <br>
                    Image: A moored (stationary) NOAA buoy, collecting data from the ocean and atmosphere.</p>
                </div>
            </div>

            <div class="tab-pane" id="dataset4">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>NOAA buoy observations of Hurricane Irene</h3>

                <p><iframe frameborder="0" width="100%" height="500" src="storm1.php"></iframe></p>

                <div class="well well-sm">
                    <p>The interactive feature above allows you to investigate several variables measured by NOAA buoys deployed off the Mid-Atlantic coast. The two buoys we will examine for Hurricane Irene are:<br>
                    <br>
                    44065 Offshore NY/NJ,<br>
                    44009 Delaware</p>

                    <p>Use the interactive feature to investigate the oceanic and atmospheric conditions before, during and after Hurricane Irene traveled through the region. Note, data may not be available for all buoys at all times.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>As the storm passes over each mooring, what happens to each variable (wind, waves, and water temperature) before, during and after the storms?</li>

                            <li>What relationships are there, if any, between wind, waves, and water temperature?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset5">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>NOAA buoy observations of Superstorm Sandy</h3>

                <p><iframe frameborder="0" width="100%" height="500" src="storm2.php"></iframe></p>

                <div class="well well-sm">
                    <p>The feature interactive above allows you to investigate several variables measured by NOAA buoys deployed off the Mid-Atlantic coast. For Superstorm Sandy we have data from four buoys (from North to South):<br>
                    <br>
                    44027 Jonesport, Maine,<br>
                    44025 NY Harbor Entrance,<br>
                    44065 Offshore NY/NJ,<br>
                    44009 Delaware</p>

                    <p>Use the interactive feature to investigate the oceanic and atmospheric conditions before, during and after Superstorm Sandy traveled through the region. Note, data may not be available for all buoys at all times.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>As the storm passes over each mooring, what happens to each variable (wind, waves, and water temperature) before, during and after the storms?</li>

                            <li>What relationships are there, if any, between wind, waves, and water temperature?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="explanation">
                <h3>Develop an Explanation</h3>

                <div class="row-fluid control-group">
                    <div class="col-md-6">
                        <p>Recall that the research challenge you are trying to address is:</p>

                        <div class="control-group">
                            <blockquote>
                                <div class="field field-name-field-challenge-content field-type-text-long field-label-hidden">
                                    <div class="field-items">
                                        <div class="field-item even">
                                            <p>Analyze data from the gliders and buoys to identify the physical features of the ocean that changed during Hurricane Irene and Superstorm Sandy.</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>

                        <p>As you consider the data you just investigated, consider the following questions:</p>

                        <div class="control-group">
                            <ol>
                                <li>As Hurricane Irene moved closer to shore, what changes did you notice in the ocean?</li>

                                <li>As Superstorm Sandy moved closer to shore, what changes did you notice in the ocean?</li>

                                <li>Based on your observations, what is the relationship between storms and the ocean?</li>

                                <li>Explain the differences in mixed layer depths between the two storms as they moved closer to land. Why are they different?</li>

                                <li>If Hurricane Sandy had occurred a couple weeks earlier in the season when atmospheric temperatures were warmer, how do you think the storm would have been different?</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Assessment</strong></p>

                        <div class="control-group">
                            <div class="field field-name-field-desired-assessment field-type-list-text field-label-hidden">
                                <div class="field-items">
                                    <div class="field-item even">
                                        The goal of this investigation is to write up a description and analysis of the provided datasets
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p><strong>Additional Instructions</strong></p>

                        <div class="control-group">
                            <div class="field field-name-field-explanation-content field-type-text-long field-label-hidden">
                                <div class="field-items">
                                    <div class="field-item even">
                                        <p>Using the datasets provided, describe the impact that Hurricane Irene and Superstorm Sandy had on the ocean. Include an analysis of how the oceanic response varied between the two storms.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /#explanation -->
        </div><!-- /.tab-content -->
    </div><!-- /.tabbable -->
</div>

<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
