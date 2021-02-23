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
                    <li><a href="#dataset0" data-toggle="tab">Seasonal Chlorophyll Concentrations</a></li>
                    <li><a href="#dataset1" data-toggle="tab">Seasonal Sea Surface Temperature</a></li>
                    <li><a href="#dataset2" data-toggle="tab">Water Temperatures Off the Coast of FL, NJ & ME</a></li>
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
                            <a href="images/satellites.jpg" target="_blank"><img src="images_sm/satellites.jpg" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>These NASA satellites are used to collect data on various features on Earth. Some of the satellites shown are no longer functioning.</p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/buoy.jpg" target="_blank"><img src="images_sm/buoy.jpg" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Buoys like this one from the National Oceanographic and Atmospheric Administration (NOAA) are deployed throughout the ocean. They monitor the ocean and atmosphere over time at a fixed location. Credit: <a href="http://www.ndbc.noaa.gov/station_page.php?station=44032">NOAA</a></p>
                            </div>
                        </div>

                    </div><!-- /.carousel-inner -->
                    <!-- Controls -->
                     <a class="left carousel-control" href="#carousel-intro" role="button" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#carousel-intro" role="button" data-slide="next"> <span class="sr-only">Next</span></a>
                </div><!-- /.carousel -->

                <div class="field field-name-field-introductory-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Remotely sensing systems, such as satellites and remote buoys, allow us to collect data about the ocean without experiencing seasickness and/or the overwhelming costs of sending out a research vessel. The information collected using this technology can be used in many ways, from disaster management to weather monitoring to locating optimal fishing zones. More specifically, satellites and buoys can be used together to gain information on the primary productivity and temperature of the ocean.</p>
                            <p>Water temperature and primary productivity are of great importance to both scientists and non-scientist alike. Primary producers in the ocean (i.e. phytoplankton) produce huge amounts of oxygen on Earth, play a major role in the Carbon Cycle and are a fundamental link in the marine food web. Likewise, water temperature is not only important to those of us who want to go swimming, but is also important in how it effects density and ocean circulation. Because water temperature and primary productivity are so important, it is important that we monitor how they change over time and space as well as what causes these changes.</p>
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
                                <a href="images/iceland_sea_2004224.jpg" target="_blank"><img src="images_sm/iceland_sea_2004224.jpg" width="480" height="320" alt="" title=""></a>
                                <div class="carousel-caption">
                                    <p>An example comparing a true color image (the data collected by the satellite) and the false color image that was created to visualize the data. Credit: <a href="http://earthobservatory.nasa.gov/IOTD/view.php?id=4753">NASA</a></p>
                                </div>
                            </div>
                            <div class="item">
                                <a href="images/wavelength_figure.jpg" target="_blank"><img src="images_sm/wavelength_figure.jpg" width="480" height="320" alt="" title=""></a>
                                <div class="carousel-caption">
                                    <p>Sea surface temperature is determined using the infrared radiation from the ocean surface. This figure provides information on the wavelength of infrared radiation and shows where it falls on the electromagnetic spectrum. Credit: NASA</p>
                                </div>
                            </div>
                            <div class="item">
                                <a href="images/diatoms.jpg" target="_blank"><img src="images_sm/diatoms.jpg" width="480" height="320" alt="" title=""></a>
                                <div class="carousel-caption">
                                    <p>Microscopic phytoplankton, like these diatoms, contain the photosynthetic pigment chlorophyll. Credit: <a href="http://en.wikipedia.org/wiki/File:Diatoms_through_the_microscope.jpg">Wikipedia</a></p>
                                </div>
                            </div>
                        </div><!-- /.carousel-inner -->
                        <!-- Controls -->
                         <a class="left carousel-control" href="#carousel-background" role="button" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#carousel-background" role="button" data-slide="next"> <span class="sr-only">Next</span></a>
                    </div><!-- /.carousel -->
                </div>

                <div class="field field-name-field-background-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Ocean color is a satellite measure of how much chlorophyll is in the ocean. Since chlorophyll is a photosynthetic pigment found in primary producers like phytoplankton, scientists use this an indicator of the amount of primary production in the ocean. The data collected by satellites on ocean color are often converted into a false color map. False color maps are created as a visual tool to observe patterns and differences within the data. These maps are not in true-life color nor are they photographs/pictures.</p>
                            <p>Satellites are also used to measure Sea Surface Temperature (SST). The satellites record the infrared radiation from the ocean surface in several different wavelengths to get the temperature. Like chlorophyll, these data are also presented as a false color map.</p>
                            <p>Along with satellite data, scientists also rely on data collected by buoys in the water to gather information. The National Data Buoy Center (NDBC), an agency within the National Weather Service (NWS) of the National Oceanic and Atmospheric Administration (NOAA), has deployed over 100 buoys off the coast of the United States. These buoys continuously measure atmospheric and oceanic properties, including water temperature, at fixed locations.</p>
                            <blockquote>Question 1: Do you think that there would a change in the amount of primary production in the ocean throughout the year at a location? If so, why?</blockquote>
                            <blockquote>Question 2: Do you think that there would a change in the temperature in the ocean throughout the year at a location? If so, why?</blockquote>
                            <blockquote>Question 3: Would the amount of primary production and ocean temperature be the same everywhere in the ocean at the same point in time?</blockquote>

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
                                <a href="images/satellite-images-temperature.png" target="_blank"><img src="images_sm/satellite-images-temperature.png" width="480" height="320" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>Seasonal Sea Surface Temperature</p>
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
                                <p>In this activity, you will look at seven-year composites for January, April, July, and October of Sea Surface Temperature (SST) and ocean color (chlorophyll concentrations) in the Mid-Atlantic Bight region. Each month was chosen to represent a season. You will also investigate data collected by buoys in three different locations. Analyze these data to describe any trends or patterns that you see in ocean primary productivity and water temperature by season and among the three locations.</p>
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
                            <p>Analyze the datasets below to determine the changes in primary productivity and water temperature in the ocean. Investigate each piece of evidence and answer the investigation questions for each dataset. After viewing all of the data, continue to the Explanation page for instructions on how to answer the Challenge question. You will need to justify your answers based on the evidence you review here.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset0" data-toggle="tab"><img src="images_sm/satellite-images-chl_sm.png" width="270" height="116" alt="Seasonal Chlorophyll Concentrations" title="Seasonal Chlorophyll Concentrations"></a>

                            <div class="caption">
                                <a href="#dataset0" data-toggle="tab">Seasonal Chlorophyll Concentrations</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset1" data-toggle="tab"><img src="images_sm/satellite-images-temperature_sm.png" width="270" height="116" alt="Seasonal Sea Surface Temperature" title="Seasonal Sea Surface Temperature"></a>

                            <div class="caption">
                                <a href="#dataset1" data-toggle="tab">Seasonal Sea Surface Temperature</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset2" data-toggle="tab"><img src="images_sm/thumb_watertemps.png" width="270" height="116" alt="Water Temperatures Off the Coast of FL, NJ & ME" title="Water Temperatures Off the Coast of FL, NJ & ME"></a>

                            <div class="caption">
                                <a href="#dataset2" data-toggle="tab">Water Temperatures Off the Coast of FL, NJ & ME</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p>When you're done investigating each dataset, continue to the last section.</p><button type="button" class="btn btn-success" data-toggle="tab" data-target="explanation" onclick="jQuery('#llbnav a[href=#explanation]').tab('show');">Next</button>
            </div>

            <div class="tab-pane" id="dataset0">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Seasonal Chlorophyll Concentrations</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/satellite-images-chl.png"><img src="images/satellite-images-chl.png" width="886px" alt="These satellite images show the concentration of chlorophyll during 4 different months of the year."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                  <p>These satellite images show the concentration of chlorophyll during 4 different months of the year.</p>
                </div>
                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>Within each month, is the amount of chlorophyll the same everywhere? If not, where are the areas with higher chlorophyll levels? Lower chlorophyll levels?</li>
                            <li>Compare the amount of chlorophyll between the four months. Which month has the highest chlorophyll levels?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset1">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Seasonal Sea Surface Temperature</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/satellite-images-temperature.png"><img src="images/satellite-images-temperature.png" width="886px" alt="These satellite images show the temperature at the sea surface during 4 different months of the year."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>These satellite images show the temperature at the sea surface during 4 different months of the year.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>Within each month, is the temperature the same everywhere? If not, what areas are warmer? Cooler?</li>
                            <li>Compare the temperature between the four months. Which month has the highest temperature levels? Lowest temperature levels?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset2">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Water Temperatures Off the Coast of FL, NJ & ME</h3>

                <p><iframe frameborder="0" width="100%" height="500" src="seasonality1.php"></iframe></p>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>The interactive above allows you to investigate water temperature measured at NOAA buoys deployed off the coast of Florida (41112), New Jersey (44065), and Maine (44033). Use the interactive to investigate the water temperature data throughout 2013.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>1) What is the water temperature range during January, April, July, and October in the three locations?</li>
                            <li>2) What 3 months, or season, have the highest and lowest water temperatures at each location?</li>
                            <li>3) What relationship, if any, do you see between the water temperature data and the location throughout the year?</li>
                            <li>4) Were there any values in the data at the three locations that you thought might be anomalies (irregular or unexpected)? Why?</li>
                            <li>5) What could account for anomalies in the data?</li>
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
                                            <p>In this activity, you will look at seven-year composites for January, April, July, and October of Sea Surface Temperature (SST) and ocean color (chlorophyll concentrations) in the Mid-Atlantic Bight region. Each month was chosen to represent a season. You will also investigate data collected by buoys in three different locations. Analyze these data to describe any trends or patterns that you see in ocean primary productivity and water temperature by season and among the three locations.</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>

                        <p>As you consider the data you just investigated, consider the following questions:</p>

                        <div class="control-group">
                            <ol>
                                <li>What trends or patterns did you observe in ocean primary productivity and water temperature throughout the year? Was there a relationship between these two factors?</li>
                                <li>What trends or patterns did you observe in ocean primary productivity and water temperature within each month? Was there a relationship between these two factors?</li>
                                <li>Throughout each season, what similarities/differences did you observe in the water temperature off the coast of North Carolina, New Jersey, and Maine?</li>
                                <li>How may these data compare to the air temperature and levels of primary production that you would expect to see on land during these months?</li>
                                <li>What other data could you look at that would show changes in seasons in the ocean?</li>
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
                                        <p>Using the datasets provided, describe how the primary production and water temperature changes throughout the year. Cite evidence from the chlorophyll, Sea Surface Temperature maps, and buoy data in your answer. Also, include an analysis of any spatial differences of water temperatures within each month and among locations (off the coast of North Carolina, New Jersey, and Maine).</p>
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

<p class="text-right"><a href="guide.php">Instructor Notes</a></p>

<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
