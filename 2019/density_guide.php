<?php 
  $page = 'instructors';
  $page_title = 'Drivers of Seawater Density - Instructor\'s Guide';
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="density.php">Drivers of Seawater Density </a></li>
  <li>Instructor's Guide</li>
</ol>

<div class="page-header">
  <h2><?= $page_title?><br>
    <small>Drafted January, 2020</small></h2>
</div>

<h3>Summary</h3>
<a href="density.php"><img data-src="holder.js/250x150?text=<?=$page_title?>" alt="<?=$page_title?>" width="250" height="150" class="pull-right thumbnail"></a>
<p>This activity explores three data sets consisting of density, salinity and temperature from three different marine stations: Station Papa, the Coastal Endurance Array, and the Global Irminger Sea Array.  Pieces of the exercise can be used as appropriate for the instructor goals.</p>
<ul>
  <li>Several ideas are given for having students access their previous learning on Temperature, Salinity and Density, or give students enough background knowledge to start the exercise (invitation).</li>
  <li>The tie-in to stratification in the ocean is quite compelling. Some data are presented and students are asked to draw some conclusions (exploration).</li>
  <li>Several types of data are presented, some as time series data with an interactive widget, and students are asked to speculate on the relationships between the Temperature, Salinity and Density (concept invention).</li>
  <li>After coming to a conclusion of the cause of the density variation students are challenged to apply what they have learned to another situation (application).</li>
  <li>This case requires students to reflect on the interaction between Temperature, Salinity, Density, Stratification, and Mixing, so at the conclusion students are asked to think about what they have learned about this complexity (reflection).</li>


<h3>Learning Goals</h3>
<p>Enduring Understanding: Whereas temperature typically controls density offshore in the open ocean, salinity plays a larger role in coastal waters.</p>

<p>Students who complete this unit will: </p>
<ul>
  <li>Observe temperature, salinity and density data at three locations.</li>
  <li>Make a prediction about whether density is controlled by temperature or salinity </li>
  <li>Interpret the result of a numerical experiment</li>
  <li>Describe how temperature and salinity controls density in coastal and open ocean locations.</li>
</ul>

<h3>Context for Use</h3>
<p>This exercise could be used for either lower level or upper level students depending on their depth of understanding of density variations. For an introductory course, the activity could be used  to drive the concept of density in the ocean and how temperature and salinity influences it.  For upper level courses such as a Physical Oceanography class, it might be a more stand-alone activity, where students can use this concept of variation of density and relate it to circulation, mixing, or even biological production in the ocean.</p>

<h3>Teaching Notes</h3>
<p>Students should be familiar with concepts from earlier in the course including: Temperature, salinity, density, thermocline, halocline, pycnocline and how these parameters vary with seasons and regions. However, the activity could also be used to introduce these concepts to be followed by instruction on salinity, temperature and density.</p>
<p>At any level, this activity requires synthesis of temperature, salinity and density concepts that may not have been considered together previously. While the hope is to guide students to the correct answer, the broader learning goal is in making these connections. The context of density changing with either temperature or salinity variation provides a motivation for students to make this effort. After the activity is over, discussion could center around the difference between onshore and offshore stations, how climate change might affect coastal and open ocean regions differently and how life in the ocean could be affected. Specifically, this activity provides the linkage between warming and freshening of the ocean and stratification.</p>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Invitation:</strong> As an introductory activity, you can:</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Prior to the start of the exercise, describe or revisit the way that temperature, salinity and density vary with depth. If these concepts have been covered already, ask students to describe vertical profiles of T, S, density and how they relate to each other.</li>
      <li>Discuss how oceanographers measure salinity, temperature, and density. (Salinity is calculated from seawater conductivity. Temperature is measured using a thermistor. Density is calculated from temperature, salinity and pressure using a complicated formula called the Equation of State.)</li>
      <li>Discuss or revisit the concept of stratification and how it is influenced by density and mixing processes</li>
      <li>Ask students how they would expect these properties and processes would vary over the course of a year. This could occur as a think-pair-share activity, or as a larger group discussion.</li>
      <li>Make a concept map relating temperature, salinity, density, stratification, and mixing.</li>
      <li>Introduce students to the three regions in the activity and ask them to consider whether similar processes will occur at these different locations.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Exploration:</strong></h3>
  </div>
  <div class="panel-body">
    <a href="density.php?level=exploration"><img data-src="holder.js/250x150?text=Exploration" alt="Exploration Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>?	Have students examine the data sets from the three locations. And, based on the patterns they observe, make predictions about which factor (salinity or temperature) will be most important in determining density.</li>
      <li>Working in groups, have students perform the numerical experiment in which one parameter (temperature or salinity) is fixed at the mean value and density is recalculated. Students should discuss the results of the experiment and share their interpretations. </li>
      <li>At the end of the activity, student groups share their interpretation of the experiment with the rest of the class.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Concept Invention:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Ask students how the three stations differed. Then ask, "Why?"</li>
      <li>Ask students how climate change might affect the three regions differently
        <ul>
          <li>Station Papa is thermally stratified whereas Coastal Oregon is salinity stratified. The Irminger Sea is close to the sub Arctic, where ice melt is increasing</li>
        </ul>
      </li>
      <li>These would be a good questions for think-pair-share</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Application:</strong></h3>
  </div>
  <div class="panel-body">
    <a href="density.php?level=application"><img data-src="holder.js/250x150?text=Application" alt="Application Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>Compare the three locations of this study. The Station Papa site is an open ocean location compared to the Coastal Endurance Array that is influenced by coastal dynamics of the ocean. The Global Irminger Sea location represents a more polar water mass where ice melt dynamics play an important role.  </li>
      <li>Compare and contrast the relative importance of temperature and salinity in influencing density stratification. </li>
      <li>Discuss the various processes that cause changes in temperature and salinity and hence density. </li>
      <li>Discuss the limitation of moored CTD observation versus a CTD profile in evaluating density variations.</li>
      <li>Consider the implications for marine productivity if temperature continues to increase and water becomes more density stratified, reducing mixing that brings nutrient rich waters to the surface. (May require some additional background either introduced here or prior to this exercise.)</li>
      <li>Consider what changes in stratification might occur with predicted changes to climate and human activities. (This may require some background either introduced here or prior to this exercise.)</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Reflection:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Students revisit the concept map they created at the beginning of the activity. Based on their discoveries, students can revise the relationships between variables or identify which connections are most important in coastal waters versus the open ocean.</li>
      <li>Ask the students to consider how they learned and how much they learned and applied their learning through one or more of the following:
        <ul>
          <li>What new skills did you learn that helped you to figure out what was causing the observed density patterns?</li>
          <li>What concepts did you need to learn more about in order to figure out the relative importance of salinity versus temperature?</li>
          <li>What new connections between concepts did you make?</li>
          <li>In what ways did these connections help you to understand the concepts better?</li>
          <li>What was the most difficult part of this activity/unit/challenge for you? Why? What helped you to figure it out?</li>
        </ul>
      </li>
      <li>Students might be curious about why some of the seawater properties vary so much during certain periods. If appropriate, you can discuss the importance of the vertical distribution of these properties and the way the mixed layer depth fluctuates over time. Since the data are from fixed-depth moorings (at 7 m and 50 m), much of the variability is likely due to the mixed layer moving above and below the depth of sensor at certain times of the year. This is particularly evident in the Station Papa dataset. </li>
    </ul>
  </div>
</div>


<h3>Subject / Topics</h3>
<p>Introduction to Oceanography</p>


<h3>Grade Level</h3>
<p>Undergraduate students in Introduction to Oceanography courses (for either marine science majors or non-science majors).</p>


<h3>Data Scope</h3>
<p>Our scope in exploring ways to use professionally-collected data in our teaching by:</p>
<ul>
  <li>Using professionally-collected data in teaching of concepts</li>
  <li>Visualizing data in a user-friendly and authentic way</li>
  <li>Enabling students to interactively engage with data in their learning to see the patterns and understand the concepts</li>
</ul>


<h3>Quantitative Skills</h3>
<p>Two quantitative skills are used in this exercise.</p>
<ul>
  <li>Reading and interpreting graphs: 
    <ul>
      <li>Students will observe correlations among variables in this dataset. There is also a clear cause-and-effect relationship between salinity and temperature (cause) and density (effect).</li>
      <li>Vertical profiles of temperature, salinity, and density are also provided from two stations. These profiles will provide some insight into why T, S, and density vary over time at the three stations.</li>
    </ul>
  </li>
  <li>Interpreting the results of a simple numerical experiment: Students will need to infer the relative importance of the two factors (temperature and salinity) on density based on the results of an experiment in which students hold one variable constant and allow the other to vary. </li>
</ul>
<p>For more information on using quantitative skills in higher education, please see: <a href="https://serc.carleton.edu/quantskills/issues/issues.html">Teaching Quantitative Skills in the Geosciences</a></p>


<h3>Science Explanation</h3>
<p>TBD</p>


<?php 
  include_once('../footer.php'); 
?>