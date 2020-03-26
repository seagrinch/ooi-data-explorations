<?php 
  $lesson_title = 'Seasonal Variability In The Mixed Layer';
  $page_title = $lesson_title.' - Instructor\'s Guide';
  $page = 'instructors';

  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="seasonal.php"><?=$lesson_title?></a></li>
  <li>Instructor's Guide</li>
</ol>

<div class="page-header">
  <h2><?= $page_title?><br>
    <small>Drafted January, 2020</small></h2>
</div>

<h3>Summary</h3>
<a href="seasonal.php"><img data-src="holder.js/250x150?text=<?=$lesson_title?>" alt="<?=$lesson_title?>" width="250" height="150" class="pull-right thumbnail"></a>
<p>This exercise is designed to facilitate learning about surface mixing in the ocean. Pieces of the exercise can be used as appropriate for the instructor goals.  The collection consists of 3 sets of activities. Part One is focused on data exploration activities, to be used during the Exploration phase of the Learning Cycle. Part Two is focused on the Concept Invention phase of the Learning Cycle. Part Three is focused on the Application phase of the Learning CycleThese activities were developed to assist with students' understanding of mixed layer dynamics, in part because surface ocean dynamics are foundational in Oceanography and cut across numerous Ocean Literacy principles, and also because wind-driven surface mixing in particular is widespread, easily observed in a variety of systems and with tractable dynamics that make it suitable for introductory oceanography instruction. We have also focused the data lab on a location distant from the coast, and specifically on temperature variations that are driven by mechanical surface mixing (due to wind) and solar irradiance. The influence of salinity on mixed layer dynamics (due to buoyancy) is not considered.</p>
<p>The Exploration phase introduces students to time-series data and allows for the interpretation of data patterns, focusing on wind, solar irradiation and water temperature at a single station in the North Atlantic Ocean. The Concept Invention phase asks students to consider the same atmospheric data types and predict the resulting water temperature patterns for a location in the North Pacific. The use of a different location prompts the student to find patterns and make connections between the various parameters. The Application phase asks the students to connect the physical processes that they've explored in the Exploration phase to primary production.  </p>
<p>This data exploration takes students from a very basic introduction to time-series data, through more complex examinations of ocean/atmospheric connections, and eventually application of the conceptual model they have developed at other locations, and to other processes.</p>


<h3>Learning Goals</h3>
<p>Students who complete this unit will be able to: </p>
<ul>
  <li>Read time-series and depth profile plots and communicate that information in words</li>
  <li>Make observations of the seasonal (and interanual) variability of stratification at one location</li>
  <li>Describe patterns in individual data sets and correlations between the different data types presented</li>
  <li>Describe how atmospheric processes mix surface water and alter thermal structure of the sub-polar North Atlantic Ocean</li>
  <li>Generate hypotheses about how physical mixed layer processes influence biological productivity</li>
  <li>Apply mechanistic understanding gained at one location to a new location</li>
</ul>

<p>We believe that this data lab also supports two ocean literacy principles, which we interpret as being enduring understanding benchmarks for students':</p>
<ul>
  <li>Ocean Literacy Principle 1:  The Earth has one big ocean with many features, and in particular: <em>Throughout the ocean there is one interconnected circulation system powered by wind, tides, the force of the Earth's rotation (Coriolis effect), the Sun, and water density differences. The shape of ocean basins and adjacent land masses influence the path of circulation. This "global ocean conveyor belt" moves water throughout all of the ocean's basins, transporting energy (heat), matter, and organisms around the ocean. Changes in ocean circulation have a large impact on the climate and cause changes in ecosystems.</em></li>
  <li>Ocean Literacy Principle 3:  <em>The ocean is a major influence on weather and climate.</em></li>
</ul>
<p>Ultimately, the enduring understanding from this exploration is that the oceans are dynamic, and processes are interconnected and tractable, and these processes that we can investigate at a particular location roll-up into global scale climate controls and productivity controls</p>


<h3>Context for Use</h3>
<p>This data exploration was designed for use in an introductory oceanography course (majors and/or non-majors). These activities provide an opportunity for students to practice reading graphs, making observations and interpretations of data and examine foundational concepts of seawater properties and their controls. This particular topic is also useful as an introduction for students to the interaction of various processes, for example this may set the stage for discussion of deepwater formation and thermohaline circulation, phytoplankton blooms or carbon cycling.</p>


<h3>Teaching Notes</h3>
<p>Students may benefit from familiarity with ancillary concepts, notably:</p>
<ul>
  <li>The processes that lead to variation in density in ocean water (perhaps using the <a href="">Drivers of Seawater Density</a> Data Exporation, </li>
  <li>patterns and controls on productivity in the ocean (perhaps using a Data Exploration from the <a href="../productivity/">Productivity collection</a>), </li>
  <li>and patterns and processes of heat fluxes between the atmosphere and surface ocean (this <a href="https://earthobservatory.nasa.gov/global-maps/CERES_NETFLUX_M">animation</a> might be useful). </li>
</ul>
<p>This activity requests that students consider the relative influence of a variety of processes on different depths in the water column.  While the hope is to guide students to the correct understanding of mixed layer dynamics, there is also benefit associated with conceptually understanding this interaction of processes.</p>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Invitation:</strong> As an introductory activity, you can:</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Show a picture of a cuddly seal, to emphasize that most of the productivity in the ocean occurs in the very surface "skim", and the dynamics there are important to understand</li>
      <li>Show a clip of high sea state in the North Atlantic to raise interest in the problem.</li>
      <li>Show or demonstrate in class the influence of mechanical wind mixing (youtube video) and encourage students to think about how mixing is most efficient in the mixed layer, since its density is uniform with depth</li>
      <li>Show an animation of Chl in the N. Atl (<a href="https://www.cambridge.org/gb/files/8713/6680/6076/natl_chlvel_q5.mp4">option #1,</a>, <a href="https://www.youtube.com/watch?v=EKwiXWMDen0">option #2</a>,  or an <a href="https://www.nasa.gov/centers/goddard/images/content/94129main_Image2m.jpg">annual chlorophyll surface map of the globe</a>, to show how productive the North Atlantic is on a seasonal basis, and pose the question, "Why is that?"</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Exploration:</strong></h3>
  </div>
  <div class="panel-body">
    <a href="seasonal.php?level=exploration"><img data-src="holder.js/250x150?text=Exploration" alt="Exploration Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>Have the students examine a map of the data collection locations at the Irminger array.  Talk through some of the special considerations about this location - latitude, proximity to Greenland, overall climate, etc.  For example, something like <a href="https://upload.wikimedia.org/wikipedia/commons/6/60/Global_Annual_10m_Average_Wind_Speed.png">this wind speed picture</a>, to emphasize how unique the wind climate is at this location might be useful.</li>
      <li>Have the students examine stacked wind observations and solar irradiation data for the Irminger array, and in particular guide them towards recognizing the clear seasonal pattern by paying attention to the time labels on the x-axis.</li>
      <li>Have the students examine a stacked set of temperature time-series from different depths at the Irminger array. Emphasize to them that it is important to pay attention to, and think about, the depths at which these sensors are collected.  Possible reference the <a href="https://oceanobservatories.org/wp-content/uploads/2015/09/GI03FLMA_Irminger_Flanking_Mooring-1.jpg">mooring schematic</a>. </li>
      <li>Encourage the students to turn off and on temperature time-series for different depths, to try to figure out how different combinations of wind forcing and solar forcing lead to changes in temperature at different depths.  </li>
      <li>Do the patterns they identify reveal something about the mixed layer dynamics throughout the season?  Overall stratification of the water column?</li>
      <li>You could choose to have students draw a depth profile of temperature for a representative winter month and a summer month, thus practicing translating the time-series of temperature at all depths to a snap-shot of stratification at two time points. This might help students understand and interpret the data and also how to read depth profiles. Do this before revealing the feature that allows them to scroll the time series and see the accompanying depth profile in the widget.</li>
      <li>Encourage students to actually extract a mixed layer depth for a representative time period (weekly or monthly) and plot it as a time-series.</li>
      <li>Is there anything they are wondering about having studied the data that they might not yet be able to explain? What more information do they want or need?</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Concept Invention:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>The overall idea behind this concept invention step is to encourage students to examine a wind/solar irradiance time-series from a different location (Station Papa in the North Pacific Ocean), and make predictions about temperature patterns at different depths based on what they've learned from the North Atlantic.</li>
      <li>Use the widget to examine and describe the relationship between wind speed and solar irradiance at this site.  Discuss correlations between these variables, and in particular if there are any notable differences between the patterns here and at the Irminger Array.</li>
      <li>Encourage the students to make (i.e. draw) or verbally describe a conceptual model to a partner regarding the interaction of wind and solar irradiance and its consequences for water temperature at different depths.  
        <ul>
          <li>One possible resource for visualizing complex systems is Loopy. Below is <a href="https://ncase.me/loopy/v1.1/?data=[[[1,319,138,0,%22Irradiance%22,2],[2,324,443,1,%22Wind%22,4],[3,524,443,1,%22MLD%22,1],[4,750,459,1,%22Nutrients%22,0],[5,1003,329,0,%22Chl%2520a%22,3],[8,745,159,0,%22Light%2520Availability%22,2]],[[1,3,87,-1,0],[2,3,-56,1,0],[3,4,-62,1,0],[4,5,58,1,0],[5,4,90,-1,0],[8,5,97,1,0],[1,8,91,1,0],[3,8,-30,-1,0]],[],13%5D">one version</a> based on this exercise. These concept maps can be made by students or provided to students for them to play with and explore. </li>
        </ul>
      </li>
      <li>Encourage students to apply their conceptual model to predicting temperature patterns</li>
      <li>Students then turn on and off temperature time-series at different locations to test their prediction.</li>
      <li>You could prompt students to think about deepwater formation and thermohaline circulation as it relates to full water column mixing in winter at Irminger but not Papa.</li>
      <li>As an extension, you could also choose to have students discuss similar data from the Southern Ocean Array published in <a href="https://agupubs.onlinelibrary.wiley.com/doi/full/10.1029/2017GL076909">Ogle et al, 2018</a></li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Application:</strong></h3>
  </div>
  <div class="panel-body">
    <a href="seasonal.php?level=application"><img data-src="holder.js/250x150?text=Application" alt="Application Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>In the application step students will be asked to combine insights from this activity, and background information on primary production controls (top-down, bottom-up etc.) </li>
      <li>Remind students for this step that the deep ocean serves as a reservoir of nutrients, and mixing can bring those nutrients into the well-lit eutrophic zone</li>
      <li>A short introduction/or summary of an ocean productivity conceptual model may be useful here</li>
      <li>Students examine a time-series of chla-concentration from the Irminger Sea, paying careful attention to when in the year productivity is high</li>
      <li>If nutrients data are available they could be added here</li>
      <li>Students then examine the time-series first introduced in the exploration segment (wind, solar irradiance and water temperature time-series, paying careful attention to seasonal patterns</li>
      <li>Students are then asked to integrate primary production into their conceptual model - how might primary production at this site controlled by the physical interaction of wind and solar radiation and their interaction with the surface of the ocean?</li>
    </ul>
    <p><srong>Possible Application 2:</srong></p>
    <ul>
      <li>The Thermohaline Circulation activity (in development by a June group)  asks students to focus their attention on the winter mixing. If not yet earlier discussed, students could complete that exploration at this time to more explicitly consider deep water formation.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Reflection:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Have students reflect on the entirety of the case with a question like: Although we often study separately the different pieces of the ocean system, this case study nicely shows the interaction of the atmosphere (wind), and external forcing (solar energy) with water properties (temperature).  As you tied together all of these pieces you learned something new about the ocean. What did you learn?</li>
      <li>Ask the students to consider how they learned and how much they learned and applied their learning through one or more of the following:
        <ul>
          <li>What new skills did you learn that helped you to develop a conceptual understanding of mixing in the surface ocean?</li>
          <li>We focused on the implications of mixing for temperature, but what other constituents might be mixed in the surface ocean?</li>
          <li>What concepts did you need to learn more about?</li>
          <li>What new connections between concepts did you make?</li>
          <li>In what ways did these connections help you to understand the concepts better?</li>
          <li>What was the most difficult part of this activity/unit/challenge for you? Why? What helped you to figure it out?</li>
    </ul>
  </div>
</div>


<h3>Subject / Topics</h3>
<p>Introduction to Oceanography</p>


<h3>Grade Level</h3>
<p>Undergraduate students in Introduction to Oceanography courses (for either marine science majors or non-science majors). Could be extended for upper level students.</p>


<h3>Data Scope</h3>
<p>Our scope in exploring ways to use professionally-collected data in our teaching by:</p>
<ul>
  <li>Using professionally-collected data in teaching of concepts</li>
  <li>Visualizing data in a user-friendly and authentic way</li>
  <li>Enabling students to interactively engage with data in their learning to see the patterns as they are learning the why</li>
</ul>


<h3>Quantitative Skills</h3>
<p>Most of the quantitative reasoning in this exercise revolves around reading and interpreting graphs.</p>
<ul>
  <li>Students must articulate the seasonal pattern in the data presented by paying careful attention to the time (y-) axes.</li>
  <li>Students must compare parameters across sites, which requires them to consider ranges in different data patterns</li>
  <li>With the help of the widget students will examine time series of ocean temperature, solar radiation and wind speed. They should see that there is a strong correlation among all three of these variables.</li>
  <li>Students will be able to interpret time-series of water temperature in order to identify and quantify a secondary parameter - mixed layer depth, and compare that derived parameter over time.</li>
</ul>


<h3>Science Explanation</h3>
<p>TBD</p>


<?php 
  include_once('../footer.php'); 
?>