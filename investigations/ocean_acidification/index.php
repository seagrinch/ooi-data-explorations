<?php 
  $page_title = 'Ocean Acidification';
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
                    <li><a href="#dataset0" data-toggle="tab">Atmosphere CO<sub>2</sub> and pH</a></li>
                    <li><a href="#dataset1" data-toggle="tab">pH and Oceanic Dissolved Carbon Dioxide</a></li>
                    <li><a href="#dataset2" data-toggle="tab">Dissolved CO<sub>2</sub>, H2CO<sub>3</sub>, HCO<sub>3</sub><sup>-</sup>, CO<sub>3</sub><sup>2-</sup> and pH</a></li>
                    <li><a href="#dataset3" data-toggle="tab">Atmospheric CO<sub>2</sub> over time</a></li>
                    <li><a href="#dataset4" data-toggle="tab">Species Response to Increasing CO<sub>2</sub></a></li>
                    <li><a href="#dataset5" data-toggle="tab">Coccolithophores and Elevated CO<sub>2</sub> levels</a></li>
                    <li><a href="#dataset6" data-toggle="tab">M. mercenaria Grown Under Different CO<sub>2</sub> Concentrations</a></li>
                    <li><a href="#dataset7" data-toggle="tab">Net Calcification, CO<sub>2</sub>, Carbonate, and pH</a></li>
                </ul>
            </li>
            <li><a href="#explanation" data-toggle="tab">Explanation</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="intro">
                <h3>Introduction</h3>
                
                <div class="field field-name-field-introductory-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                            <p>Carbon dioxide (CO<sub>2</sub>) is a greenhouse gas, that humans are releasing into the atmosphere at rates exceeding historical values. In 2011, CO<sub>2</sub> accounted for 84% of all greenhouse gas emissions, and between 1990 and 2011 emissions had increased by 10%. We know that the release of greenhouse gases are increasing air temperatures. However, this increase is not only affecting the atmosphere, it is also having an impact on the ocean as well. CO<sub>2</sub> in the atmosphere mixes with the ocean via gas exchange. This causes a chemical reaction to occur in the ocean that is causing changes in both biological and physical properties of the ocean. These changes can have a serious impact on life as we know it.</p>
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
                                <a href="images/prior.png" target="_blank"><img src="images/prior.png" width="480" height="466" alt="" title=""></a>

                                <div class="carousel-caption">
                                    <p>How will changes in CO<sub>2</sub> impact organisms like these?</p>
                                </div>
                            </div>
                        </div><!-- /.carousel-inner -->
                    </div><!-- /.carousel -->
                </div>
                
                <div class="field field-name-field-background-content field-type-text-long field-label-hidden">
                    <div class="field-items">
                        <div class="field-item even">
                          
                          <p>Human activities, such as the burning of fossil fuels for energy, are increasing the amount of carbon dioxide (CO<sub>2</sub>). This is having an impact on the ocean, most notably to the types of organisms pictured to the right.</p>
                          <p>Take a moment and answer the following questions about this image.</p>
                          <ul>
                            <li>Question 1: What are some things that these organisms have in common?</li>
                            <li>Question 2: How do these organisms build their shells?</li>
                            <li>Question 3: Where do you think the carbon in their shells comes from?</li>
                            <li>Question 4: How do scientist make predictions about what future conditions might look like?</li>
                          </ul>
                          
                        </div>
                    </div>
                </div><button type="button" class="btn btn-success" data-toggle="tab" data-target="challenge" onclick="jQuery('#llbnav li:eq(2) a').tab('show');">Next</button>
            </div><!-- /#background -->

            <div class="tab-pane" id="challenge">
                <h3>Challenge</h3>

                <p>In this activity you will investigate the following research challenge...</p>

                <blockquote>
                    <div class="field field-name-field-challenge-content field-type-text-long field-label-hidden">
                        <div class="field-items">
                            <div class="field-item even">
                                <p>What relationship is there, if any, between increased levels of carbon dioxide in the atmosphere and the physiological changes that are occurring in calcifying organisms.</p>
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
                            <p>Analyze the datasets below to learn more about Ocean Acidification.  Investigate each piece of evidence and answer the investigation questions for each dataset. After viewing all of the data, continue to the Explanation page for instructions on how to answer the Challenge question. You will need to justify your answers based on the evidence you review here.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset0" data-toggle="tab"><img src="images_sm/data1.png" width="270" height="116" alt="Atmosphere CO2 and pH" title="Atmosphere CO2 and pH"></a>

                            <div class="caption">
                                <a href="#dataset0" data-toggle="tab">Atmosphere CO<sub>2</sub> and pH</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset1" data-toggle="tab"><img src="images_sm/data2.png" width="270" height="116" alt="pH and Oceanic Dissolved Carbon Dioxide" title="pH and Oceanic Dissolved Carbon Dioxide"></a>

                            <div class="caption">
                                <a href="#dataset1" data-toggle="tab">pH and Oceanic Dissolved Carbon Dioxide</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset2" data-toggle="tab"><img src="images_sm/data3.png" width="270" height="116" alt="Dissolved CO2, H2CO3, HCO3-, CO32- and pH" title="Dissolved CO2, H2CO3, HCO3-, CO32- and pH"></a>

                            <div class="caption">
                                <a href="#dataset2" data-toggle="tab">Dissolved CO<sub>2</sub>, H2CO<sub>3</sub>, HCO<sub>3</sub><sup>-</sup>, CO<sub>3</sub><sup>2-</sup> and pH</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset3" data-toggle="tab"><img src="images_sm/data4.png" width="270" height="116" alt="Atmospheric CO2 over time" title="Atmospheric CO2 over time"></a>

                            <div class="caption">
                                <a href="#dataset3" data-toggle="tab">Atmospheric CO<sub>2</sub> over time</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset4" data-toggle="tab"><img src="images_sm/data5.png" width="270" height="116" alt="Species Response to Increasing CO2" title="Species Response to Increasing CO2"></a>

                            <div class="caption">
                                <a href="#dataset4" data-toggle="tab">Species Response to Increasing CO<sub>2</sub></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset5" data-toggle="tab"><img src="images_sm/data6.png" width="270" height="116" alt="Coccolithophores and Elevated CO2 levels" title="Coccolithophores and Elevated CO2 levels"></a>

                            <div class="caption">
                                <a href="#dataset5" data-toggle="tab">Coccolithophores and Elevated CO<sub>2</sub> levels</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset6" data-toggle="tab"><img src="images_sm/data7.png" width="270" height="116" alt="M. mercenaria Grown Under Different CO2 Concentrations" title="M. mercenaria Grown Under Different CO2 Concentrations"></a>

                            <div class="caption">
                                <a href="#dataset6" data-toggle="tab">M. mercenaria Grown Under Different CO<sub>2</sub> Concentrations</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="thumbnail">
                            <a href="#dataset7" data-toggle="tab"><img src="images_sm/data8.png" width="270" height="116" alt="Net Calcification, CO2, Carbonate, and pH" title="Net Calcification, CO2, Carbonate, and pH"></a>

                            <div class="caption">
                                <a href="#dataset7" data-toggle="tab">Net Calcification, CO<sub>2</sub>, Carbonate, and pH</a>
                            </div>
                        </div>
                    </div>

                </div>

                <p>When you're done investigating each dataset, continue to the last section.</p><button type="button" class="btn btn-success" data-toggle="tab" data-target="explanation" onclick="jQuery('#llbnav a[href=#explanation]').tab('show');">Next</button>
            </div>

            <div class="tab-pane" id="dataset0">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Atmosphere CO<sub>2</sub> and pH</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data1.png"><img src="images/data1.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                  <p>The graph above shows different scenarios based upon population, economic growth, etc. as predicted by the IPCC (Intergovernmental Panel on Climate Change) The top chart shows projected CO<sub>2</sub> levels from 2000 to 2100, the bottom global pH levels for the same timeframe. The different lines represent different emission scenarios. (credit <a href="http://www.ipcc.ch/publications_and_data/ar4/wg1/en/ch10s10-4-2.html">IPCC</a>).</p>
                </div>
                
                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>1. According to the IS92a scenario by how much is atmospheric CO<sub>2</sub> levels expected to change between 2010 and 2080? What is the projected change in global ocean pH for the same time period?</li>
                            <li>2. Which scenarios show the most dramatic change in terms of pH? What are the conditions of this scenario?</li>
                            <li>3. Why is a small change in pH so large?</li>
                        </ul>
                    </div>
                </div>
                
            </div>

            <div class="tab-pane" id="dataset1">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>pH and Oceanic Dissolved Carbon Dioxide</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data2.png"><img src="images/data2.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>This graph combines historical data with predictions made using models to show pH and oceanic dissolved carbon dioxide over time.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>4. What trend do you notice in pH over time, is it different than the trend in dissolved CO<sub>2</sub> over time?</li>
                            <li>5. What is the projected change in pH from the years 1850 to 2050?</li>
                            <li>6. Using the pH colorbar above, by the year 2100 what solution will our ocean's waters most be like?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset2">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Dissolved CO<sub>2</sub>, H2CO<sub>3</sub>, HCO<sub>3</sub><sup>-</sup>, CO<sub>3</sub><sup>2-</sup> and pH</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data3.png"><img src="images/data3.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>This graph is known as a Bjerrum plot. It shows the proportion of dissolved carbon dioxide (CO<sub>2</sub>), bicarbonate (HCO<sub>3</sub><sup>-</sup>), and carbonate (CO<sub>3</sub><sup>2-</sup>) at different pH levels in a solution at equilibrium.</p>
                    <p>Credit/Source: TBD</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>7. According to this graph, under acidic conditions, what are the dominate (most prevalent) forms of carbon in solution?</li>
                            <li>8. How does the proportion of CO<sub>3</sub><sup>2-</sup> (carbonate) change as pH decreases? Describe this change in terms of the rate of change (i.e. Slope: change in y-axis over change in x-axis)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset3">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Atmospheric CO<sub>2</sub> over time</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data4.png"><img src="images/data4.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>The graph above shows Atmospheric carbon dioxide levels from the 1800's to predicted levels in 2300. Two different IPCC models are used in this graph. IS92a with carbon concentrations increasing at 1% per year after 1990 and is what would be predicted if we continue emitting CO<sub>2</sub> at the same rate we do today. S650 is a stabilization scenario, where we begin to decrease CO<sub>2</sub> emissions and eventually Atmospheric CO<sub>2</sub> levels stabilize.</p>
                </div>
                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>9. If atmospheric CO<sub>2</sub> concentrations were to continue to increase by 1% per year, what is the projected level of CO<sub>2</sub> in 2100?</li>
                            <li>10. If CO<sub>2</sub> levels are stabilized, when will CO<sub>2</sub> concentrations begin to level off?</li>
                            <li>11. What are some ways that CO<sub>2</sub> levels could begin to stabilize?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset4">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Species Response to Increasing CO<sub>2</sub></h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data5.png"><img src="images/data5.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>A number of different species from each of the different major group were subjected to increased CO<sub>2</sub> levels. The species response was then recorded as either: a. negative, b. positive, c. static, or d. parabolic (responded in a non-linear fashion, the species had a negative response both above and below present day CO<sub>2</sub> levels). (table edited from: Doney et. al., 2009.) Note: The numbers for each species response do not add always add up because this information was taken from a review of data collected from multiple experiments, and in some cases a species could have shown multiple responses in different studies, depending on technique and experiment parameters.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>12. Do all species respond the same to increased levels of CO<sub>2</sub> in terms of calcification?</li>
                            <li>13. How do the majority of species studied in this table respond to increasing CO<sub>2</sub>?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset5">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Coccolithophores and Elevated CO<sub>2</sub> levels</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data6.png"><img src="images/data6.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>Above are scanning electron microscopy (SEM) images of coccolithophores. The coccolithophores were subjected to different levels of CO<sub>2</sub> (described in the table on the right).</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>14. Describe the physical differences you see between Emiliania Huxleyi under lower CO<sub>2</sub> levels verse higher CO<sub>2</sub> levels.</li>
                            <li>15. Do both species respond similarly to increased CO<sub>2</sub> levels?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset6">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>M. mercenaria Grown Under Different CO<sub>2</sub> Concentrations</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data7.png"><img src="images/data7.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>The images above are scanning electron microscopy (SEM) of M. mercenaria (a type of saltwater clam) for 36 days. They were grown under different CO<sub>2</sub> levels ranging from 250 ppm to 1500 ppm.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>16. As CO<sub>2</sub> levels increase, what trend do you notice in the growth of M. mercenaria?</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="dataset7">
                <!--                     <button type="button" class="btn btn-success btn-success-green" data-toggle="tab" data-target="exploration" onclick="jQuery('#llb2 li:eq(0) a').tab('show');">Return to Exploration</button> -->

                <h3>Net Calcification, CO<sub>2</sub>, Carbonate, and pH</h3>

                <div class="clearfix">
                    <center>
                        <a href="images/data8.png"><img src="images/data8.png" width="640px" alt=""></a>
                    </center>
                </div>

                <p>&nbsp;</p>

                <div class="well well-sm">
                    <p>The graphs above show the relationship between net calcification and Partial Pressure of CO<sub>2</sub>, Concentration of carbonate ions, and pH for two different species, mytilus edulis (blue mussel) and crassostrea gigas (pacific oyster). Net calcification is given in &micro;mol CaCO<sub>3</sub> g FW-1h-1 or how much calcium carbonate will be lost per hour.</p>
                </div>

                <div>
                    <div>
                        <h4>Interpretation Questions</h4>

                        <ul>
                            <li>17. By how much does net calcification decrease when you go from a pH of 8.1 to a pH of 7.5 for blue mussels? What about pacific oysters?</li>
                            <li>18. By how much does net calcification change of mussels when you increase partial pressure of CO<sub>2</sub> from 1000 to 2000 ppmv?</li>
                            <li>19. Is it better to have a carbonate ion concentration of .15 mmol kg<sup>-1</sup> or 0.05 mmol kg<sup>-1</sup>?</li>
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
                                            <p>What relationship is there, if any, between increased levels of carbon dioxide in the atmosphere and the physiological changes that are occurring in calcifying organisms.</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>

                        <p>As you consider the data you just investigated, consider the following questions:</p>

                        <div class="control-group">
                            <ol>
                                <li>Create a conceptual model making a connection between CO<sub>2</sub> emissions and marine organism calcification.</li>
                                <li>Does your data support a link between CO<sub>2</sub> levels and calcification rates in marine organisms? Explain this link?</li>
                                <li>Explain in words, the connection between Atmospheric CO<sub>2</sub> levels and a change in ocean pH.</li>
                                <li>Based on the IPCC scenario IS92a what are predicted ocean conditions and how will this effect calcifying marine organisms?</li>
                                <li>What effect will increased CO<sub>2</sub> levels have on the food web in the ocean?</li>
                                <li>What effect will increased CO<sub>2</sub> levels have on human industries such as fisheries and tourism?</li>
                                <li>In your opinion, what else do scientists need to investigate in order to better understand the link between CO<sub>2</sub> and calcifying organisms?</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <p><strong>Assessment</strong></p>

                        <div class="control-group">
                            <div class="field field-name-field-desired-assessment field-type-list-text field-label-hidden">
                                <div class="field-items">
                                    <div class="field-item even">
                                        The goal of this investigation is to develop a conceptual model or diagram that explains the given evidence
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p><strong>Additional Instructions</strong></p>

                        <div class="control-group">
                            <div class="field field-name-field-explanation-content field-type-text-long field-label-hidden">
                                <div class="field-items">
                                    <div class="field-item even">
                                        <p>As you take into account the data you just viewed, consider questions #1-3 as you try to summarize what you have learned. Then consider questions #4-7 and try to extrapolate your knowledge based on what you have learned.</p>
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
