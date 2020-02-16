<?php 
  $page = 'instructors';
  $page_title = 'Impacts of Ocean Acidification on Shellfish in the Pacific Northwest - Instructor\'s Guide';
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">2019 Collection</a></li>
  <li><a href="acidification.php">Impacts of Ocean Acidification on Shellfish in the Pacific Northwest</a></li>
  <li>Instructor's Guide</li>
</ol>

<div class="page-header">
  <h2><?= $page_title?><br>
    <small>Drafted January, 2020</small></h2>
</div>

<h3>Summary</h3>
<a href="acidification.php"><img data-src="holder.js/250x150?text=<?=$page_title?>" alt="<?=$page_title?>" width="250" height="150" class="pull-right thumbnail"></a>
<p>This exercise is a case study that, if used in full, takes students through the entire learning cycle from invitation to reflection. Pieces of the exercise can be used as appropriate for the instructor goals.</p>
<ul>
  <li>Students are invited to learn about the importance of shellfish aquaculture in the Pacific Northwest and how changing ocean conditions are threatening the success of the industry. </li>
  <li>The <em>Challenge Question</em>f should be used to invite students to explore data and make predictions. (invitation)</li>
  <li>Several types of data are presented, some as time series data with the interactive widgets, and students are asked to speculate on the relationships between the wind and different water properties (exploration).</li>
  <li>This guide provides background on important concepts, and several ideas are given for having students access their previous learning on pH, carbonate chemistry, and surface ocean circulation (concept Invention). </li>
  <li>After coming to a conclusion of the cause of the low pH surface waters, students are challenged to apply what they have learned to a longer data set (Application).</li>
  <li>This case requires students to reflect on the interaction between wind, circulation, water properties and biology, so at the conclusion students are asked to think about what they have learned about this complexity and identify concepts/topics they would like to learn more about (reflection).</li>
</ul>


<h3>Enduring Understandings</h3>
<ol>
  <li>The atmosphere, ocean physics, chemistry and biology are connected together.</li>
  <li>Changes in climate can affect human food sources.</li>
</ol>

<h3>Learning Goals and Assessments</h3>
<p>Students will be able to:</p>
<ol>
  <li>Describe and interpret patterns in individual data sets and correlations between the different data types presented (exploration)
    <ol>
      <li>Write a figure legend for the first pH graph seen</li>
      <li>Write a figure legend for all four of the graphs together</li>
    </ol>
  </li>
  <li>Explain the relationship between wind direction and pH on the Oregon coast, using data and relevant oceanographic concepts to support their conclusions.(exploration)
    <ol>
      <li>Identify a time range in which upwelling is occurring</li>
      <li>Explain what is happening, including how and why the pH changes.</li>
    </ol>
  </li>
  <li>Identify oceanographic conditions that negatively impact shellfish populations, and determine when those conditions are occuring. (application)
    <ol>
      <li>Identify a time when conditions will negatively impact shellfish populations</li>
      <li>Draft an advisory to shellfish aquaculturists describing the problem, why it is occurring, and suggesting possible solutions.</li>
    </ol>
  </li>
</ol>


<h3>Context for Use</h3>
<p>This activity is applicable to lower and upper division courses. In lower division courses, this activity can be used to introduce basic concepts of ocean circulation and ocean acidification. For upper level courses, this activity could include a more in depth discussion of ocean circulation, climate, heat budgets, and how ocean acidification affects shellfish aquaculture industries. </p>

<h3>Teaching Notes</h3>
<p>This activity requires internet access on computers or tablets, preferably with no more than four students per device. If computer access is not available the graphs and activity questions may be printed ahead of time. </p>
<p>Before completing this activity, students should be familiar with pH, the dissolution of gases in water, and the basic concept of upwelling and Ekman transport. Preferably, students will have some background on buffers, shellfish life cycles, meroplanktonic vs. holoplanktonic life histories, and aquaculture, although this information can be provided during the activity as needed. </p>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Invitation:</strong> As an introductory activity, you can:</h3>
  </div>
  <div class="panel-body">
    <p>Students share prior experience with shellfish, consumption and/or harvesting, and then discuss shellfish aquaculture. If aquaculture has not been previously discussed, a brief introduction could be added, with mention of locally aquacultured species.</p>
    <ul>
      <li>Class activity questions: Think/pair/share or clicker questions (free response/word cloud) or brainstorm, write on board. For larger classes, clicker questions are probably quickest option.
        <ul>
          <li>What kind of shellfish have students eaten (relatives or seen others eat if allergic)?</li>
          <li>Where did their shellfish come from?</li>
          <li>Do they know the shellfish source?</li>
          <li>Pros and cons of aquacultured shellfish?
            <ul>
              <li>Ecological/environmental, cultural, health (HAB contamination)</li>
              <li>Economic impacts</li>
            </ul>
          </li>
        </ul>
      </li>
      <li>Watch video: <a href="https://www.youtube.com/watch?v=XfqPIj04PXI">Supporting communities through ocean acidification research</a></li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Exploration:</strong></h3>
  </div>
  <div class="panel-body">
    <a href="acidification.php?level=exploration"><img data-src="holder.js/250x150?text=Exploration" alt="Exploration Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>Give students 3-5 minutes to free write on what they know about ocean acidification. Students will use their free writes at the end of class to reflect on their learning. </li>
      <li>Complete the Exploration section of this activity. Have students complete the activity questions, then discuss as a group.</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Concept Invention:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>NOTE: When discussing ocean acidification with students, it is important to be discuss the following:
        <ul>
          <li>Why is it called ocean acidification when the pH of the ocean is basic?</li>
          <li>Why is it difficult for shell building organisms to build those shells?
            <ul>
              <li>Concept of relative concentration of carbonate species and saturation (threshold) should be made clear to students</li>
            </ul>
          </li>
        </ul>
      </li>
      <li>Show students the image of pH found in <em>Background</em> section and remind students of the definition of pH, what it is a measure of, and that it is on a log scale. 
        <ul>
          <li>Pacific Marine Environmental Laboratories <a href="https://www.pmel.noaa.gov/co2/story/A+primer+on+pH">primer on pH</a></li>
        </ul>
      </li>
      <li>Have students identify and explain the link between pCO2 and pH. 
        <ul>
          <li>Lab activities that allow students to explore the link between CO2	gas and the pH of a solution
            <ul>
              <li><a href="https://www.exploratorium.edu/snacks/ocean-acidification-in-cup">Ocean Acidification in a Cup Activity</a></li>
              <li><a href="http://oceans.digitalexplorer.com/events/coral-live-2018/live-investigations/ocean-acidification-in-a-cup/">Blowing Bubbles Activity</a></li>
            </ul>
          </li>
          <li>Show <a href="https://www.pmel.noaa.gov/co2/file/Hawaii+Carbon+Dioxide+Time-Series">CO<sub>2</sub> Time Series in North Pacific</a> plot and ask students to describe trends of atmospheric CO2, seawater pCO2 and seawater pH, and explain why pH in seawater decreases as atmospheric and seawater CO2 increases.</li>
        </ul>
      </li>
      <li>Have students create a list of the physical and biological factors that influence the pH of solution or seawater</li>
      <li>Ask students to explain why pH is important and how it influences life in the ocean</li>
      <li>Use the widget to examine and explain the relationship between wind direction and water temperature. Discuss correlations between these variables. 
        <ul>
          <li>Refer to <a href="http://oceanmotion.org/html/background/patterns-of-circulation.htm">NASA Ocean Motion website</a> for description and images of surface ocean circulation </li>
          <li>This <a href="https://www.whoi.edu/multimedia/v-coastal-upwelling/">video of Ekman transport</a> generated upwelling may also be useful</li>
          <li>Show diagram of coastal upwelling and plot of Coastal Upwelling Index found on the <a href="https://www.nwfsc.noaa.gov/research/divisions/fe/estuarine/oeip/db-coastal-upwelling-index.cfm">Northwest Fisheries Science Center website</a></li>
          <li>Show the students the vertical profile of pH with depth off the OR coast found in the <em>Background</em> section and have a discussion with them about the source of the low pH on the shelf.</li>
          <li>With the combination of data, ask students to explain how a change in the wind direction results in change in pH of surface water along coastal Oregon.</li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Application:</strong></h3>
  </div>
  <div class="panel-body">
    <a href="acidification.php?level=application"><img data-src="holder.js/250x150?text=Application" alt="Application Widget" width="250" height="150" class="pull-right thumbnail"></a>
    <ul>
      <li>Complete the Application section of this activity. Have students answer the questions and discuss as a group. </li>
      <li>Group discussion questions: 
        <ul>
          <li>Would you expect this same pattern on the east coast? Why or why not? </li>
          <li>Draw your prediction of nitrate levels over the time frame displayed in the pH graph. Why would you expect this trend?. </li>
        </ul>
      </li>
      <li>Writing prompt: You are in a conversation with someone who claims it is good that the ocean absorbs atmospheric CO2 because it reduces greenhouse gases in the atmosphere. How could you convince them that they're wrong?</li>
    </ul>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong>Reflection:</strong></h3>
  </div>
  <div class="panel-body">
    <ul>
      <li>Think of one part of this exercise that was confusing or challenging for you. Why was it challenging? What did you do to overcome this difficulty?</li>
      <li>Revisit the free write you completed earlier in class. Discuss how your knowledge of ocean acidification has changed. What would you be interested in learning more about? </li>
      <li>Ask the students to consider how they learned and how much they learned and applied their learning through one or more of the following:
        <ul>
          <li>What new skills did you learn that helped you to figure out what was causing the low pH in surface waters?</li>
          <li>What concepts did you need to learn more about in order to figure out the connection between winds and the seawater properties?</li>
          <li>What new connections between concepts did you make?</li>
          <li>In what ways did these connections help you to understand the concepts better?</li>
          <li>What was the most difficult part of this activity/unit/challenge for you? Why? What helped you to figure it out?</li>
        </ul>
      </li>
    </ul>
  </div>
</div>


<h3>Subject / Topics</h3>
<ul>
  <li>Atmospheric circulation: winds</li>
  <li>Ocean currents: surface currents, upwelling/downwelling, Ekman transport</li>
  <li>Water properties: temperature, pH, carbonate </li>
  <li>Biological: shellfish growth and lifecycle, primary production </li>
  <li>Low pH, ocean acidification</li>
  <li>Shellfish hatcheries, aquaculture</li>
</ul>

<p>This exercise could be used to ask students to apply previously learned concepts, such as wind direction and Ekman transport and upwelling, to explain a real scenario. If these topics have not yet been covered, this example can provide the impetus to learn about them. It requires taking information in one form, mostly graphs, and conceptualizing about the Oregon continental shelf. In introductory classes, instructors may want to have students grapple with one or a couple of the concepts and fill in the details for them on the rest.</p>
<p>In more advanced classes students should be challenged to recall previously learned information and apply it to this problem. Instructors should be ready to jog their memories about the learned information.</p>


<h3>Grade Level</h3>
<p>Introductory oceanography class (100/200), majors or non-majors, probably later in semester rather than first day. Could be adapted to higher level class by using it as a case study and going into more detail.</p>


<h3>Data Scope</h3>
<p>Our scope in exploring ways to use professionally-collected data in our teaching:</p>
<ul>
  <li>Using professionally-collected data in teaching of concepts</li>
  <li>Visualizing data in a user-friendly and authentic way</li>
  <li>Enabling students to interactively engage with data in their learning to see the patterns as they are learning the why</li>
</ul>


<h3>Quantitative Skills</h3>
<ul>
  <li>Reading and interpreting graphs</li>
  <li>Identifying patterns using real data</li>
  <li>Comparing graphs of different variables</li>
  <li>Connecting patterns across variables</li>
  <li>Applying graph interpretation to real world problems</li>
</ul>

<p>For more information on using quantitative skills in higher education, please see: <a href="https://serc.carleton.edu/quantskills/issues/issues.html">Teaching Quantitative Skills in the Geosciences</a></p>


<h3>Expansion ideas</h3>
<ul>
  <li>Comparison of east coast/west coast</li>
  <li>Local aquaculture connections: hatchery/shellfish farm tours, guest speaker from hatchery/industry/extension (could do short videos to share)</li>
  <li>Local shellfish traditional ecological knowledge, tribal elders, retired citizens, etc. (could do short videos to share)</li>
  <li>Add other fisheries, food web ecological impacts, economic impacts	Ex. Pink salmon juveniles consume pteropods, pteropods affected by low pH, pink salmon are commercially harvested species</li>
  <li>Tie in/very complementary to Anoxia exploration</li>
  <li>Have students use loopy (ncase.me/loopy) to make relationships with wind/upwelling/pH/anoxia</li>
  <li>Corrected/more accurate carbonate chemistry, differentiate between pH and dissolution/precip processes.</li>
  <li>Developing an asynchronous distance version</li>
</ul>


<h3>Science Explanation</h3>
<p>TBD</p>

<h3>Additional resources for instructors</h3>
<ol>
  <li><a href="https://environment.uw.edu/research/major-initiatives/ocean-acidification/washington-ocean-acidification-center/">Washington Ocean Acidification Center</a></li>
  <li><a href="https://www.khanacademy.org/science/high-school-biology/hs-biology-foundations/hs-ph-acids-and-bases/v/introduction-to-ph">Khan academy introduction to pH</a></li>
  <li><a href="https://www.pmel.noaa.gov/">NOAA Pacific Marine Environmental Lab</a></li>
  <li>National Academies booklet on <a href="http://nas-sites.org/oceanacidification/">ocean acidification</a></li>
  <li>NOAA ocean acidification <a href="https://www.pmel.noaa.gov/co2/story/Ocean+Acidification">Diagram of carbonic acid and dissociation products</a></li>
  <li>National research council <a href="http://www.beachapedia.org/images/8/84/Ocean-acid-image1-webready.jpg">ocean acidification diagram</a></li>
  <li>Links to shellfish webpages: 
    <ol>
      <li><a href="https://restorationfund.org/">Puget Sound Restoration Fund</a></li>
      <li><a href="https://pcsga.org/">Pacific Coast Shellfish Growers Association</a></li>
    </ol>
  </li>
  <li>Background info on shellfish/ bivalves
    <ol>
      <li><a href="http://www.pangeashellfish.com/blog/oyster-life-cycle-on-farm">Oyster life cycle with times</a></li>
    </ol>
  </li>
  <li><a href="https://www.nwfsc.noaa.gov/research/divisions/fe/estuarine/oeip/db-coastal-upwelling-index.cfm">Northwest Fisheries Science Center</a></li>
  <li>Miguel's carbonate chem lecture</li>
</ol>


<?php 
  include_once('../footer.php'); 
?>