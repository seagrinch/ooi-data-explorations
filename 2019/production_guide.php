<?php 
  $page = 'instructors';
  $title = 'Factors affecting Primary Production';
  $page_title = $title . 'Instructor\'s Guide';
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="production.php"><?=$title?></a></li>
  <li>Instructor's Guide</li>
</ol>

<div class="page-header">
  <h2><?= $page_title?><br>
    <small>Published ???, 2019</small></h2>
</div>

<h3>Summary</h3>
<a href="co2.php"><img data-src="holder.js/250x150?text=<?=$title?>" alt="Generic placeholder image" width="250" height="150" class="pull-right thumbnail"></a>
<p>These activities were developed to assist with students' understanding of how primary productivity varies throughout the year in the Southern Ocean, and examines how multiple abiotic factors correlate with primary production.</p>
<p>This collection consists of 2 sets of activities. Part One is focused on the Concept Invention phase of the Learning Cycle.  The Concept Invention phase introduces abiotic factors, including light levels, nutrient concentrations and temperature, that may influence primary productivity. This set of data includes a six-month period spanning December 2018 to July 2019. Students are able to view patterns in primary productivity in conjunction with single abiotic factors or multiple abiotic factors in combination to find patterns and make connections between the parameters.</p>
<p>Part Two is focused on the Application phase of the Learning Cycle. The Application phase prompts students to use the knowledge gained in the Concept Invention phase to predict how two abiotic factors will vary over a three year period of primary productivity data. </p>

<h3>Learning Goals</h3>
<p>After engaging with this Data Exploration a student will be able to: </p>
<ul>
  <li>Describe patterns in individual data sets and correlations between the different data types presented.</li>
  <li>Interpret the provided data.</li>
  <li>Explain the relationship between primary productivity, nutrient concentration, light availability, and temperature in the Southern Ocean using evidence and relevant scientific concepts to support her hypotheses.</li>
  <li>Apply knowledge gained from a small subset of data to make predictions over longer time series.</li>
</ul>


<h3>Context for Use</h3>
<p>These data explorations were designed for implementation in an introductory oceanography course (majors and/or non-majors). These activities would be appropriate for use in learning how to read graphs and interpret the data within graphs, as well as examining patterns of primary productivity in the Southern Ocean and understanding the abiotic factors that affect primary production.</p>

<h3>Teaching Notes</h3>
<p>Students will need to be familiar with concepts from earlier in the semester including: the definition of primary productivity, chlorophyll a concentration is used as a proxy for primary production, nitrate is one of multiple nutrients required for primary production.</p>
<p>In upper division courses (300/400-level college courses) student knowledge may be enhanced with an introduction to how a fluorometer collects chl a data, the use of chl a as a proxy for primary production, and the caveats for this type of proxy. Students may also benefit from information on the different forms of nitrogen in the ocean and their bioavailability to different organisms. Students may want to explore variations in other nutrients, such as phosphate, that are not included in this dataset. Students? broader understanding of these concepts could be extended by looking at vertical profiles of these factors.</p>
<p>The Data Exploration activities require access to an internet-ready computer or tablet. Ideally each student group would have a computer or tablet to use to engage with the activity. Alternatively, if no internet access is available for students, graphs of the specific time periods of interest and variables could be printed onto plastic overlays for each student or group of students.</p>
<p>Note, the Data Explorations use authentic raw data. Many of the datasets have been downsampled for simplicity and to ensure that the interactives load quickly in your browser. However, this means that many of the datasets retain their natural variability and some sampling side-effects. The goal of these activities is for students to analyze authentic data, not smooth averages. Effort has been taken to maintain as much of the data and to keep the variation of the data as true as possible, but make the activity user-friendly and browser-friendly. </p>


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Invitation:</strong> As an introductory activity, you can:</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Prior to this exercise, explore general concepts of primary production using the Data Exploration focused on <a href="https://datalab.marine.rutgers.edu/explorations/productivity/activity0.php?level=invitation">Primary Production in General</a>. Students will make a concept map to brainstorm about how primary production varies across time and space and hypothesize which factors may covary across these scales.</li>
      <li>Spark students? interest by asking them to think about how patterns in primary production impact higher trophic levels.</li>
      <li>Give students a pre-quiz to assess their prior knowledge.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Exploration:</strong> To help students recognize that salinity changes over time you can:</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Depending on student's prior knowledge and your teaching objective, explore variations in primary production:
        <ul>
          <li><a href="https://datalab.marine.rutgers.edu/explorations/productivity/activity3.php">Across latitudes</a></li>
          <li><a href="https://datalab.marine.rutgers.edu/explorations/productivity/activity5.php">Within Climactic Zones - Temperate</a></li>
          <li><a href="https://datalab.marine.rutgers.edu/explorations/productivity/activity4.php">Within Climactic Zones - Polar</a></li>
          <li><a href="https://datalab.marine.rutgers.edu/explorations/productivity/activity2.php">Across a year at one location</a></li>
          <li><a href="">Inshore versus offshore</a></li>
          <li><a href="https://datalab.marine.rutgers.edu/explorations/productivity/activity6.php"></a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Concept Invention:</strong> To help students understand the processes that affect salinity you could:</h3>
  </div>
  <div class="panel-body">
    <a href="production.php?level=exploration"><img data-src="holder.js/250x150?text=Concept Invention" alt="Concept Invention Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>In small groups, have students brainstorm what factors influence primary productivity</li>
      <li>Direct the students or groups to predict how each of the factors vary across a year locally and then how they may vary in a Polar region.</li>
      <li>Use the widget to examine and describe the relationships among nutrient concentration, light availability, temperature, and primary productivity.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Application:</strong> To help students link their observations of salinity changes in one location to global changes, you could:</h3>
  </div>
  <div class="panel-body">
    <a href="production.php?level=application"><img data-src="holder.js/250x150?text=Application" alt="Application Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>Use the second widget to predict seasonal patterns of light availability and nutrient concentrations when given primary productivity data.</li>
      <li>Lead a class discussion about how their predicted patterns for nutrient concentration, light availability, and primary production compared to actual patterns.</li>
      <li>Have students extend their understanding of these relationships by drawing hypothesized seasonal patterns of abiotic factors at different latitudes. Ask students to predict how primary productivity would vary with these factors at each latitudinal range (tropics, temperate, polar).</li>
      <li>Students could also compare absolute magnitudes/ranges of the variables across different latitudes to get an idea of how these factors vary across the globe. Some satellite data could be incorporated to for example visualize an overview of the chl a. Advanced courses could cover the benefits/disadvantages of the satellite versus fluorometer measures of chl a.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Reflection:</strong> You could...</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Give students a post-quiz to assess how this exercise improved their knowledge of primary production. Have students compare their pre and post quiz results so they can see where their knowledge has improved.</li>
      <li>Have the students revisit their concept maps if they created one at the beginning of the exercise and have them make changes to reflect what they have learned in this activity.</li>
      <li>Pose some of these questions (possibly in a student survey): What new skills did you learn that helped you to figure out what was happening? What concepts did you need to learn more about in order to understand the graphs? What new connections between concepts did you make? In what ways did these connections help you to understand the concepts better? What was the most difficult part of this activity/unit/challenge for you? Why? What helped you to figure it out?</li>
    </ul>
  </div>
</div>


<h3>Subject / Topics</h3>
<p>Introduction to Oceanography</p>
<ul>
  <li>This exercise could have students revisit learned concepts, such as seasonal patterns in primary productivity, particularly in polar regions. </li>
  <li>This activity focuses on understanding which abiotic factors influence primary productivity in these regions.  </li>
  <li>If these topics have not yet been covered, this example can provide the impetus to learn about them.</li>
  <li>This lesson also requires students to apply concepts learned to a new data set in order to gain a more complete understanding of the processes involved.  </li>
  <li>More advanced students may be asked to apply concepts to a different region of the Ocean.</li>
</ul>


<h3>Grade Level</h3>
<p>Undergraduate students in Introduction to Oceanography courses (for either marine science majors or non-science majors)</p>


<h3>Data Scope</h3>
<p>Our scope in exploring ways to use professionally-collected data in our teaching:</p>
<ul>
  <li>Using professionally-collected data in teaching of concepts</li>
  <li>Visualizing data in a user-friendly and authentic way</li>
  <li>Enabling students to interactively engage with data in their learning to see the patterns as they are learning the why</li>
</ul>


<h3>Quantitative Skills</h3>
<p>Most of the quantitative reasoning in this exercise revolves around reading and interpreting graphs.</p>
<ul>
  <li>Primary productivity is observed by interpreting a graph of chlorophyll a concentrations taken over the span of six months. Students are asked to read the graph to determine if there is a pattern.</li>
  <li>With the help of the widget, students will examine time series of primary productivity, nitrate concentrations, light availability and  sea surface temperature. They should determine whether or not there is a correlation between any of the abiotic variables and primary productivity.</li>
  <li>With the help of the widget, students will predict seasonal patterns of light availability and nutrient concentrations when given primary productivity data.</li>
</ul>


<h3>Science Explanation</h3>
<p>TBD</p>


<?php 
  include_once('../footer.php'); 
?>