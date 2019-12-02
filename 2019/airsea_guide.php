<?php 
  $page = 'instructors';
  $page_title = 'Dynamic Air-Sea Interactions Instructor\'s Guide';
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="airsea.php">Dynamic Air-Sea Interactions</a></li>
  <li>Instructor's Guide</li>
</ol>

<div class="page-header">
  <h2><?= $page_title?><br>
    <small>Published ???, 2019</small></h2>
</div>

<h3>Summary</h3>
<a href="anoxia.php"><img data-src="holder.js/250x150?text=Dynamic Air-Sea Interactions" alt="Generic placeholder image" width="250" height="150" class="pull-right thumbnail"></a>
<p>This exercise is a case study that, if used in full, takes students through the parts of the learning cycle from exploration to application as applied to an episodic atmospheric event on the New England continental shelf. Pieces of the exercise can be used as appropriate for the instructor goals. Several ideas are given for having students access and connect to their previous learning on ocean surface conditions (invitation). The tie-in to societal impacts is compelling. Some wave properties data are presented and students are asked to draw some conclusions (exploration). Several types of data are presented as time series data with an interactive widget, and students are asked to speculate on the relationships between the wave properties and different water and atmospheric conditions (concept invention). Students are then presented with barometric pressure data and asked to predict precipitation. After their prediction, students can compare to the actual precipitation data (application). </p>

<p>Once students come to a conclusion as to the cause of the event, students are invited to reflect on how this oceanic event affects their life. This case requires students to think of the interaction between atmospheric and sea surface conditions, and the impacts to coastal societies (reflection).</p>


<h3>Learning Goals</h3>
<p>After engaging with this Data Exploration a student will be able to: </p>
<ul>
  <li>Describe patterns in individual data sets and correlations between the different data types presented</li>
  <li>Interpret the data provided</li>
  <li>Explain the relationship between oceanic conditions and episodic atmospheric events on the New England continental shelf using evidence and relevant scientific concepts to support their conclusions.</li>
</ul>


<h3>Context for Use</h3>
<p>This exercise could be used for either lower level or upper level students depending on the way it is set up and scaffolded. For an introductory course, the activity could be used repeatedly throughout the semester as individual graphs and questions as new knowledge is gained by the student. This could then lead to solving the entire problem by the end of the semester. For upper level courses such as a Physical Oceanography class, it might be a more stand-alone activity late in the semester, although students may still need to be reminded of some of the background knowledge required to piece the story together.</p>


<h3>Teaching Notes</h3>
<p>Students will need to be familiar with concepts from earlier in the semester including: wave properties, surface currents, barometric pressure, low pressure zones, and potential causes of these processes.</p>

<p>At any level, this activity requires synthesis of a variety of concepts that may not have been considered together previously. While the hope is to guide students to a more accurate scientific understanding, the broader learning goal is to make these connections.</p>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Invitation:</strong> As an introductory activity, you can:</h3>
  </div>
  <div class="panel-body">
    <p>Consider doing one or more of the following to engage the students in the data activities to follow, to access their prior knowledge and make connections. These opportunities will also help to increase their interest in figuring out the interactions between the ocean and atmosphere that could cause an intense storm to develop.</p>
    <ul>
      <li>Show a video with images (only) of the historic coastal storm (one can be found <a href="https://www.youtube.com/watch?v=TpaCwHalFGY">here</a>)</li>
      <li>Tell students that this incredibly powerful storm hit the NE Coast in 2018, causing intense damage including snow, rain, huge waves, and flooding. Ask 
        <ul>
          <li>Did any of the students hear about the storm? What did they hear?</li>
          <li>Were any of them directly impacted by the storm? Encourage them to share their firsthand experiences.</li>
        </ul>
      </li>
      <li>Ask students to do a turn and talk with their neighbor or small group (responding to a clicker question or classroom response system like polleverywhere.com) and briefly discuss the following prompts:
        <ul>
          <li>What do you know about atmospheric processes and oceanographic conditions that might have come together to produce such a storm?</li>
          <li>What do you think the societal impacts were? Do you think that such a storm could be predicted with precision? </li>
          <li>What do you know about different types of storms (e.g. hurricanes, typhoons, nor'easters, bomb cyclones)? How are they different? The same?</li>
        </ul>
      </li>
      <li>Brainstorm with students what concepts and ocean/atmosphere processes might be relevant in explaining the occurrence of the intense storm. </li>
      <li>Make a concept map about what they think causes huge coastal storms and include all the connections they can think of between atmosphere and ocean. Have students use pencil or paper or electronic or online tool if you are familiar with one (e.g. CMAP).</li>
      <li>Alternatively, rather than introducing the exercise by revealing that the phenomena to be studied are related to a large storm, you may wish to have the students examine the data and come to that conclusion on their own. In this case, the invitation may focus on the initial data that are presented, i.e. the wave data. 
        <ul>
          <li>Show videos or images of waves at sea, from calm seas with small waves to stormy seas with very large waves.</li>
          <li>Ask students to think about how quickly wave conditions can change at sea, and what could cause these rapid changes.</li>
          <li>Have students speculate on what it would be like to be on a ship at sea when wave conditions change dramatically. What would they do? Video of ships or boats being tossed around at sea may be useful to illustrate the power of ocean waves.</li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Exploration:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Have the students examine the atmospheric and oceanographic data and summarize patterns they see. What could cause these patterns?</li>
      <li>Have students work in pairs or small groups to examine the plots. Ask them to describe the different aspects of the visualizations and patterns in the data they detect. Then ask what questions they think they might be able to answer with these data. 
        <ul>
          <li>Do the patterns they identify reveal something about the setting that their prior knowledge can help to explain? </li>
          <li>Having studied the data, is there anything they are wondering about that they might not yet be able to explain? What more information do they want or need?</li>
        </ul>
      </li>
      <li>Alternatively, instructors may walk through the data as part of a larger discussion. The instructor could evaluate each data set with the students, before introducing the next topic: e.g. <em>Now what would you expect surface current speed data to look like?</em> Have students do a turn and talk or small group discussion about the prompts before turning to the whole group discussion. Then following the whole group discussion, display the current speed data and have students in small groups or partners discuss how the results compared to their prediction and what they learned from that. Repeat for each new variable that is introduced.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Concept Invention:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Lead students in discussion of their answers after each data activity, calling on students to provide the evidence that led them to their conclusion.</li>
      <li>Have students identify the link between atmospheric and oceanic processes in a coastal area that may lead to coastal storms.</li>
      <li>Have students use the widget to examine and describe the relationship between wind speed, current speed, and wave height. Discuss correlations between these variables. Encourage students to describe the relationships, the evidence gathered from the data, and possible correlations with a partner or small group before leading a whole group discussion.</li>
      <li>Download the data and have students use the wave period data to calculate wavelength, wave speed, etc.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Application:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Students now have the opportunity to investigate changes in atmospheric pressure and use what they've learned to hypothesize about what natural process is causing the collective air-sea changes they observed. Students support their hypothesis with evidence gathered from the various data widgets.</li>
      <li>Students are provided with barometric pressure data and asked to predict precipitation. Students respond to the prompt:
        <ul>
          <li>How did you use the patterns you observed in the data to predict precipitation levels? After their prediction, students can compare to the actual precipitation data.</li>
          <li>Have students in small groups or partners discuss how the results compared to their prediction and what they learned from that.</li>
        </ul>
      </li>
      <li>Show them an article from Penn State: <em>The Historic Bomb Cyclone of January 2018</em>.</li>
      <li>Show YouTube video of storm coverage from ABC news.</li>
      <li>Compare this episodic event to other bomb cyclones and to cyclones in general. Discuss the difference between tropical and extratropical cyclones.</li>
      <li>Consider the implications of extratropical cyclones on shoreline erosion.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Reflection:</strong> You could...</h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Have students reflect on the entirety of the case with a question like: Although we often study separately the different pieces of the ocean system, this case study nicely shows the interaction of the atmosphere (wind), barometric pressure, and surface water properties (waves and currents). As you tied together all of these pieces you learned something new about the ocean. What did you learn? </li>
      <li>What concepts did you need to learn more about in order to figure out what air-sea interactions may have resulted in the Bomb Cyclone?</li>
      <li>What new connections between concepts did you make?</li>
      <li>In what ways did these connections help you to understand the concepts better?</li>
      <li>What was the most difficult part of this activity/unit/challenge for you? Why? What helped you to figure it out?</li>
    </ul>
  </div>
</div>


<h3>Subject / Topics</h3>
<ul>
  <li>Sea state, surface waves, atmospheric pressure, cyclones</li>
  <li>Graph interpretation</li>
</ul>

<p>This exercise could be used to ask students to link previously learned concepts, such as formation of hurricanes and other cyclonic storms to high-resolution sea surface monitoring data. If these topics have not yet been covered, this example can provide the impetus to learn about them. It requires taking information in one form, mostly graphs, and conceptualizing about extratropical cyclones on the New England continental shelf. In introductory classes, instructors may want to have students grapple with one or a couple of the concepts and fill in the details for them on the rest.</p>
<p>In more advanced classes students should be challenged to recall previously learned information and apply it to this problem. Instructors should be ready to jog their memories about the learned information.</p>


<h3>Grade Level</h3>
<p>Undergraduate students in Introductory Oceanography courses (for either marine science majors or non-science majors)</p>
<p>This exercise can be a case study in upper level Physical Oceanography courses, where students apply what they have learned about extratropical cyclones and the transfer of energy between the atmosphere and ocean.</p>


<h3>Data Scope</h3>
<p>Our scope in exploring ways to use professionally-collected data in our teaching:</p>
<ul>
  <li>Using professionally-collected data in teaching of concepts</li>
  <li>Visualizing data in a user-friendly and authentic way</li>
  <li>Enabling students to interactively engage with data in their learning, to see the patterns as they are learning, and understanding the causes of those patterns</li>
</ul>


<h3>Quantitative Skills</h3>
<p>Most of the quantitative reasoning in this exercise revolves around reading and interpreting graphs.</p>
<ul>
  <li>Sea state is determined by interpreting a graph of wave heights and wave periods. Students are asked to read the graph to identify a period of exceptionally high wave energy.</li>
  <li>Wind speed is presented in a graph and students must make the connection between the magnitude of the wind and the size of waves and speed of surface currents. </li>
  <li>Students must examine a graph showing atmospheric pressure to understand that extreme low pressure systems are associated with increased wind speed, with resultant effects on surface water motion.</li>
  <li>Students use their understanding of barometric pressure and resulting oceanic conditions to predict the relative precipitation increase that occurs during a low pressure system.</li>
  <li>They must also articulate patterns in the data presented.</li>
  <li>With the help of the widget students will examine time series of atmospheric pressure, wind speed, wave properties, current speed, and precipitation. They should see that there is a strong correlation between all five of these variables.</li>
</ul>


<h3>Science Explanation</h3>
<p>TBD</p>


<?php 
  include_once('../footer.php'); 
?>