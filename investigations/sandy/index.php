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
                    <li><a href="#dataset0" data-toggle="tab">How did Sandy form? Was it like Katrina?</a></li>
                    <li><a href="#dataset1" data-toggle="tab">Hurricane Sandy Winds, Waves and Air Pressure</a></li>
                    <li><a href="#dataset2" data-toggle="tab">Water Levels During Hurricane Sandy</a></li>
                    <li><a href="#dataset3" data-toggle="tab">The Winds of Sandy</a></li>
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
                            <a href="images/intro1.png" target="_blank"><img src="images_sm/intro1.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>This image, from Suomi NPP, acquired at 1:35 pm ET on October 29, 2012, shows Hurricane Sandy as it approaches the U.S. coastline.</p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/intro2.png" target="_blank"><img src="images_sm/intro2.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Blackout in NJ and NY following Hurricane Sandy</p>
                            </div>
                        </div>

                        <div class="item">
                            <a href="images/intro3.png" target="_blank"><img src="images_sm/intro3.png" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Damage to the barrier island by Hurricane Sandy in Mantoloking, NJ</p>
                            </div>
                        </div>

                    </div><!-- /.carousel-inner -->
                    <!-- Controls -->
                     <a class="left carousel-control" href="#carousel-intro" role="button" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#carousel-intro" role="button" data-slide="next"> <span class="sr-only">Next</span></a>
                </div><!-- /.carousel -->

                <div class="field field-name-field-introductory-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Hurricanes are intense low-pressure weather systems that form in tropical waters. Hurricanes are classified by wind speeds in categories ranging from 1 with wind speeds of 74 mph to 5 with wind speeds in excess of 155 mph. Hurricanes are very powerful storms that can cause widespread damages to communities in their paths. The images on the right show Hurricane Sandy, which hit the Mid-Atlantic coast in October of 2012, as well as its impact.</p>
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
                                <a href="images/background.png" target="_blank"><img src="images_sm/background.png" width="480" height="320" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>Sandy as seen from above, just as it made landfall.</p>
                                </div>
                            </div>
                        </div><!-- /.carousel-inner -->
                    </div><!-- /.carousel -->
                </div>

                <div class="field field-name-field-background-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Hurricane Season begins on June 1st and continues through November 30th. Hurricanes being as an area of low pressure known as a disturbance, if circulation becomes more organized the storm is upgraded to a tropical storm and when sustained winds reach 74 mph it is classified as a hurricane. Hurricanes can cause catastrophic damage to areas in their paths. Take a moment and answer the following questions, to recall some information you may previously learned about hurricanes.</p>
                            <blockquote>Question 1: Winds from a hurricane can be very destructive; can you name and describe another factor of the storm that can also be destructive, maybe even more so than winds?</blockquote>
                            <blockquote>Question 2: Name and give a brief description of the three main parts of a hurricane, which is typically the most destructive?</blockquote>
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
                                <a href="images/challenge.png" target="_blank"><img src="images_sm/challenge.png" width="480" height="320" alt="" title=""></a>

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
                                <p>Analyze data from several buoys to describe how waves and sea level respond to a passing hurricane.</p>
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
                            <p>Analyze the datasets below to determine the impacts Hurricane Sandy had on the coast of New Jersey. Investigate each piece of evidence and answer the investigation questions on each page. After viewing all of the data, continue to the Explanation page for instructions on how to answer the Challenge question. You will need to justify your answer based on the evidence you review here.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset0" data-toggle="tab"><img src="images_sm/cm_sandy.png" width="270" height="116" alt="How did Sandy form? Was it like Katrina?" title="How did Sandy form? Was it like Katrina?"></a>

                            <div class="caption">
                                <a href="#dataset0" data-toggle="tab">How did Sandy form? Was it like Katrina?</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset1" data-toggle="tab"><img src="images_sm/Single_Time_Series.png" width="270" height="116" alt="Hurricane Sandy Winds, Waves and Air Pressure" title="Hurricane Sandy Winds, Waves and Air Pressure"></a>

                            <div class="caption">
                                <a href="#dataset1" data-toggle="tab">Hurricane Sandy Winds, Waves and Air Pressure</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset2" data-toggle="tab"><img src="images_sm/Single_Time_Series.png" width="270" height="116" alt="Water Levels During Hurricane Sandy" title="Water Levels During Hurricane Sandy"></a>

                            <div class="caption">
                                <a href="#dataset2" data-toggle="tab">Water Levels During Hurricane Sandy</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset3" data-toggle="tab"><img src="images_sm/winds_0.png" width="270" height="116" alt="The Winds of Sandy" title="The Winds of Sandy"></a>

                            <div class="caption">
                                <a href="#dataset3" data-toggle="tab">The Winds of Sandy</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p>When you're done investigating each dataset, continue to the last section.</p><button type="button" class="btn btn-success" data-toggle="tab" data-target="explanation" onclick="jQuery('#llbnav a[href=#explanation]').tab('show');">Next</button>
            </div>

            <div class="tab-pane" id="dataset0">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>How did Sandy form? Was it like Katrina?</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/cm_sandy.png"><img src="images/cm_sandy.png" width="886px" alt="Concept map, developed by Annette deCharon (University of Maine), that describes the general aspects of Hurricane Sandy and how it compared to Hurricane Katrina."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                  <p>This concept map, developed by Annette deCharon at the University of Maine, details some of the differences between Hurricane Sandy and Hurricane Katrina.</p>
                </div>
            </div>

            <div class="tab-pane" id="dataset1">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Hurricane Sandy Winds, Waves and Air Pressure</h3>

                <p><iframe frameborder="0" width="100%" height="500" src="sandy1.php"></iframe></p>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>This visualization shows the air pressure, waves and winds at 2 buoys off the New Jersey coast, during the week when Hurricane Sandy hit.</p>
                    <p><strong>Stations</strong></p>
                    <ul>
                      <li>44065 NY Harbor</li>
                      <li>44009 Delaware</li>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>Compare the timing of the air pressure lows between the two stations.</li>
                            <li>Compare the maximum wave heights reached at the two stations.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset2">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Water Levels During Hurricane Sandy</h3>

                <p><iframe frameborder="0" width="100%" height="500" src="sandy2.php"></iframe></p>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>This visualization shows the measured and predicted tides at several locations along the mid-Atlantic coast, during the week when Hurricane Sandy hit.</p>
                    <p><strong>Stations</strong></p>
                    <ul>
                      <li>8570283 Maryland</li>
                      <li>8534720 Atlantic City</li>
                      <li>8531680 Sandy Hook</li>
                      <li>8518750 NYC Battery</li>
                    </ul>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>Which stations have higher maximums? Which have lower ones?</li>
                            <li>What is the difference in water heights between the maximum reached during Sandy and a typical maximum for each station?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset3">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>The Winds of Sandy</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/winds_0.png"><img src="images/winds_0.png" width="886px" alt="The image above shows the strength and direction of SandyÕs ocean surface winds on October 28, 2012."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>The image above shows the strength and direction of Sandy's ocean surface winds on October 28, 2012. Wind speeds above 65 kilometers (40 miles) per hour are yellow; above 80 kmph (50 mph) are orange; and above 95 kmph (60 mph) are dark red. For tropical cyclones in the northern hemisphere, the strongest winds are usually just east of the eye amidst a ring of violent thunderstorms called the eyewall. However, for Sandy the weakest winds are to the East, which was a result of the cyclone interacting with another storm system. (Credit: <a href="http://earthobservatory.nasa.gov/IOTD/view.php?id=79626">NASA Earth Observatory</a>)</p>
                </div>


                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>On which side of the storm are the winds heading towards the coast?</li>
                            <li>How might this impact sea level?</li>
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
                                            <p>Analyze data from several buoys to describe how waves and sea level respond to a passing hurricane.</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>

                        <p>As you consider the data you just investigated, consider the following questions:</p>

                        <div class="control-group">
                            <ol>
                                <li>What were the atmospheric responses to Hurricane Sandy?</li>
                                <li>How did the ocean respond?</li>
                                <li>How did the response differ based on which side of the storm a station was on?</li>
                                <li>How should emergency response managers take this information into account when planning evacuations for future storms?</li>
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
                                        <p>Using the datasets provided, describe how waves and sea level along the coast of New Jersey responded as Hurricane Sandy approached. Include an analysis of how the response varied along the coast, and how that variation compared with the location of the storm.</p>
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
