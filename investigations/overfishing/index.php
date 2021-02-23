<?php 
  $page_title = 'Is Overfishing Creating a Population Bottleneck?';
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
                    <li><a href="#dataset0" data-toggle="tab">Average Allelic Richness by Fish Grouping (Seabreams, Tunas, & Flounders)</a></li>
                    <li><a href="#dataset1" data-toggle="tab">Average Allelic Richness by Fish Grouping (Rockfishes, Groupers, & Snappers)</a></li>
                    <li><a href="#dataset2" data-toggle="tab">Average Allelic Richness by Fish Grouping (All Fish Groupings)</a></li>
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
                            <a href="images/Cheetah_with_cubs_SiddharthMaheshwari.jpg" target="_blank"><img src="images_sm/Cheetah_with_cubs_SiddharthMaheshwari.jpg" width="480" height="320" alt="" title=""></a>

                            <div class="carousel-caption">
                                <p>Cheetah mother with cubs. (Photo courtesy of Siddharth Maheshwari)</p>
                            </div>
                        </div>
                    </div><!-- /.carousel-inner -->
                    <!-- Controls -->
                     <a class="left carousel-control" href="#carousel-intro" role="button" data-slide="prev"> <span class="sr-only">Previous</span></a> <a class="right carousel-control" href="#carousel-intro" role="button" data-slide="next"> <span class="sr-only">Next</span></a>
                </div><!-- /.carousel -->

                <div class="field field-name-field-introductory-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Evolution is due to changes in the allelic frequency in a population over time. The speed with which these changes happen can be dramatically increased when a population bottleneck occurs (due to environmental events or human activities). For example, Cheetahs experienced a large decline in population size due to changing climates ~10,000 years ago initially and then due to over-hunting in Africa over the past few centuries. Therefore, cheetahs now have some of the lowest genetic diversity of organisms on Earth today; approximately 99% of genes are the same in related Cheetahs as opposed to on average 80% for other organisms.</p>
                            <p>But how do we know that a population bottleneck is happening and what factors may contribute to this change in genetic diversity?</p>
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
                                <a href="images/Sixfinger_threadfin_school_NOAA.jpg" target="_blank"><img src="images_sm/Sixfinger_threadfin_school_NOAA.jpg" width="480" height="320" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>Pelagic fish in schooling pattern. (Photo courtesy of NOAA)</p>
                                </div>
                            </div>
                        </div><!-- /.carousel-inner -->
                    </div><!-- /.carousel -->
                </div>

                <div class="field field-name-field-background-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>As highlighted in the previous Cheetah example, human activities can produce a population bottleneck, scientists became interested in looking at whether overfishing was having an impact on the genetic diversity of fish. Early studies used a Before-After approach to investigate the question of a relationship between genetic diversity and overfishing. Some studies found a decrease in genetic diversity after overfishing, while other studies found no change in the genetic diversity of fish populations after overfishing. Unfortunately, the experimental design of previous studies meant that they had low statistical power and thus may not have been able to see an effect even if one existed.</p>
                            <p>Therefore, Pinsky & Palumbi (2013) used a Control-Impact approach to look at 11,000+ <a href="http://ghr.nlm.nih.gov/glossary=microsatellite">microsatellites</a> (rather than 5-10) across 140 species (rather than 1) to determine if there was a relationship between overfishing and genetic diversity, or if overfishing was producing a population bottleneck. Pinsky & Palumbi (2013) grouped fish populations by genus or family and into overfished and not overfished categories to conduct the analyses on both <a href="http://ghr.nlm.nih.gov/glossary=heterozygosity">heterozygosity</a> and allelic richness (the number of alleles per locus, which is the data included in this investigation).</p>
                            <blockquote>Question 1: Why, or why not, would overfishing have an impact on the genetic diversity of a fish population?</blockquote>
                            <blockquote>Question 2: If overfishing is producing a population bottleneck, what patterns or relationship would you look for in the data?</blockquote>
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
                                <a href="images/Sixfinger_threadfin_school_NOAA.jpg" target="_blank"><img src="images_sm/Sixfinger_threadfin_school_NOAA.jpg" width="480" height="320" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>Pelagic fish in schooling pattern. (Photo courtesy of NOAA)</p>
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
                                <p>Use the data to construct a written explanation of the relationship between overfishing and genetic diversity to determine if overfishing results in a population bottleneck.</p>
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
                            <p>Analyze the data below to determine the impacts of overfishing on genetic diversity. Investigate each piece of evidence and answer the investigation questions for each dataset. It is recommended that you observe the data from the two subsets, which each have only three fish groupings, before looking at the overall (All Fish Groupings) data. After viewing all of the data, continue to the Explanation page for instructions on how to complete the Challenge. You will need to justify your answer based on the evidence you review here.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset0" data-toggle="tab"><img src="images_sm/AverageAllelicRichnessbyFishGrouping_NotOverHigher_140109.png" width="270" height="116" alt="Average Allelic Richness by Fish Grouping (Seabreams, Tunas, & Flounders)" title="Average Allelic Richness by Fish Grouping (Seabreams, Tunas, & Flounders)"></a>

                            <div class="caption">
                                <a href="#dataset0" data-toggle="tab">Average Allelic Richness by Fish Grouping (Seabreams, Tunas, & Flounders)</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset1" data-toggle="tab"><img src="images_sm/AverageAllelicRichnessbyFishGrouping_NoDif_140110_0.png" width="270" height="116" alt="Average Allelic Richness by Fish Grouping (Rockfishes, Groupers, & Snappers)" title="Average Allelic Richness by Fish Grouping (Rockfishes, Groupers, & Snappers)"></a>

                            <div class="caption">
                                <a href="#dataset1" data-toggle="tab">Average Allelic Richness by Fish Grouping (Rockfishes, Groupers, & Snappers)</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset2" data-toggle="tab"><img src="images_sm/AverageAllelicRichnessbyFishGrouping_All_140109.png" width="270" height="116" alt="Average Allelic Richness by Fish Grouping (All Fish Groupings)" title="Average Allelic Richness by Fish Grouping (All Fish Groupings)"></a>

                            <div class="caption">
                                <a href="#dataset2" data-toggle="tab">Average Allelic Richness by Fish Grouping (All Fish Groupings)</a>
                            </div>
                        </div>
                    </div>
                </div>

                <p>When you're done investigating each dataset, continue to the last section.</p><button type="button" class="btn btn-success" data-toggle="tab" data-target="explanation" onclick="jQuery('#llbnav a[href=#explanation]').tab('show');">Next</button>
            </div>

            <div class="tab-pane" id="dataset0">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Average Allelic Richness by Fish Grouping (Seabreams, Tunas, & Flounders)</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/AverageAllelicRichnessbyFishGrouping_NotOverHigher_140109.png"><img src="images/AverageAllelicRichnessbyFishGrouping_NotOverHigher_140109.png" width="886px" alt="The average allelic richness, with standard error, for overfished and not overfished fish populations within Subset A fish groupings: Pagrus (Seabreams), Scombridae (Tunas), and Pleuronectidae (Flounders)."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                  <p>This data visualization represents the average allelic richness for overfished and not overfished species within three fish groupings (Seabreams, Tunas, and Flounders) with the standard error.</p>
                </div>
                
                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>What relationship is there between overfished and not overfished Seabreams? Tunas? Flounders?</li>
                            <li>What do these data overall illustrate about the relationship between overfishing and genetic diversity?</li>
                            <li>How do these data influence your conclusions about the relationship between overfishing and genetic diversity?</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="dataset1">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Average Allelic Richness by Fish Grouping (Rockfishes, Groupers, & Snappers)</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/AverageAllelicRichnessbyFishGrouping_NoDif_140110_0.png"><img src="images/AverageAllelicRichnessbyFishGrouping_NoDif_140110_0.png" width="886px" alt="The average allelic richness, with standard error, for overfished and not overfished fish populations within Subset B fish groupings: Sebastes (Rockfishes), Serranidae (Groupers), and Lutjanus (Snappers)."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>This data visualization represents the average allelic richness for overfished and not overfished species within three fish groupings (Rockfishes, Groupers, and Snappers) with the standard error.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>What relationship is there between overfished and not overfished Rockfishes? Groupers? Snappers?</li>
                            <li>What do these data overall alone illustrate about the relationship between overfishing and genetic diversity?</li>
                            <li>How do these data influence your conclusions about the relationship between overfishing and genetic diversity?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset2">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Average Allelic Richness by Fish Grouping (All Fish Groupings)</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/AverageAllelicRichnessbyFishGrouping_All_140109.png"><img src="images/AverageAllelicRichnessbyFishGrouping_All_140109.png" width="886px" alt="The average allelic richness, with standard error, for overfished and not overfished fish populations within each of the twelve fish groupings analyzed."></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>This data visualization represents the average allelic richness for overfished and not overfished species within all twelve fish groupings with the standard error. The fish groupings analyzed include: Seabreams, Tunas, Flounders, Herrings, Drums, Cods, Turbots, Rockfishes, Groupers, Snappers, Jack Mackerels, and Smelts.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>What conclusions do you draw from this figure of the entire dataset?</li>
                            <li>What does all the data illustrate about the relationship between overfishing and genetic diversity?</li>
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
                                            <p>Use the data to construct a written explanation of the relationship between overfishing and genetic diversity to determine if overfishing results in a population bottleneck.</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>

                        <p>As you consider the data you just investigated, consider the following questions:</p>

                        <div class="control-group">
                            <ol>
                                <li>What was the relationship between overfishing and genetic diversity overall?</li>
                                <li>Was the relationship between overfishing and genetic diversity the same for all fish groupings?</li>
                                <li>Were the overall observed patterns in the data what you expected in terms of the relationship between overfishing and genetic diversity? Why or why not?</li>
                                <li>Were the results from each fish group what you expected? Why or why not?</li>
                                <li>Does overfishing result in a population bottleneck?</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Assessment</strong></p>

                        <div class="control-group">
                            <div class="field field-name-field-desired-assessment field-type-list-text field-label-hidden">
                                <div class="field-items">
                                    <div class="field-item even">
                                        The goal of this investigation is to construct a written explanation of the observed phenomena seen in the data
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p><strong>Additional Instructions</strong></p>

                        <div class="control-group">
                            <div class="field field-name-field-explanation-content field-type-text-long field-label-hidden">
                                <div class="field-items">
                                    <div class="field-item even">
                                        <p>Using the data provided, describe the relationship between overfishing and genetic diversity in fish populations. Provide a written explanation of this relationship incorporating your data analysis, identifying the evidence you used, and addressing the summary questions below.</p>
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
