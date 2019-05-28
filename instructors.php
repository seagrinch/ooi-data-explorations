<?php 
  $page = 'instructors';
  $page_title = 'Instructor\'s Guide';
  include_once('header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li>Instructor's Guide</li>
</ol>

<div class="page-header">
  <h2>Data Explorations Instructor's Guide</h2>
</div>

<h3>How Are the Data Explorations Set-up?</h3>
<p>Data Explorations combine current learning science theory, data visualization user design, and effective teaching with data practices to provide easy-to-use interactive experiences with authentic data. </p>

<p>For each data set there are multiple ways that a student can interact with the data, depending on the desired learning outcome. This provides you as the professors to choose which data set and approach best fits your desired intention of using it in your classroom. </p>

<p>Another way the Data Explorations are built with flexibility in mind is that they are each designed to take 15-20 minutes. They are intended to augment your current teaching on a topic, not fully teach the topic. Therefore, you can add them into your teaching whenever and wherever you think it would be best as data can be used at many different phases of The Learning Cycle.</p>

<h3>What is The Learning Cycle?</h3>
<img src="images/Learning_Cycle.png" alt="Learning Cycle Diagram" class="pull-right"/>
<p>The Learning Cycle is an approach to designing learning experiences that capture best the knowledge and theory of how people learn, which was developed by the University of California, Lawrence Hall of Science. There are five phase of The Learning Cycle:</p>
<ol>
  <li>Invitation </li>
  <li>Exploration</li>
  <li>Concept Invention</li>
  <li>Application</li>
  <li>Reflection</li>
</ol>

<p>Each phase offers an important step in assisting students in their learning and understanding of the concepts being covered. To facilitate students learning in at each phase we use different approaches, experiences, and prompting questions for the students.  Therefore, the Challenge Question, Your Objective, and Interpretation & Analysis Questions among the different Data Explorations for the same data set vary.</p>

<p>The Learning Cycle can be replicated at different scales from as small as within an activity to as large as across a whole unit/semester. The key is providing your students opportunities to engage in each phase of The Learning Cycle. Each Data Exploration has been designed to be utilized for a specific phase, however multiple Data Explorations per data set have been developed so that you can best choose which way you want to use those data in your teaching.</p>

<h3>How Are the Data Chosen?</h3>
<p>We begin with a freely available online data portal, for example the Ocean Observatories Initiative <a href="https://ooinet.oceanobservatories.org">Data Portal</a>, and determine what kinds of data are available across what spatial and temporal scales.</p>

<p>Then we consult with commonly used textbooks for introductory courses, for example <a href="https://www.pearsonhighered.com/product/Trujillo-Essentials-of-Oceanography-11th-Edition/9780321814050.html">The Essentials of Oceanography</a>, to highlight which concepts covered in the textbook could be augmented with the available data.</p>

<p>After drafting learning objectives based off of the textbook concepts and The Learning Cycle, we dive into the data portals to extract and process the most relevant data to utilize in the Data Exploration interactives.</p>

<h3>How Are the Interactives of the Data Explorations Developed?</h3>
<p>Using the learning objectives as our guide as well as the quantity and quality of the available data, we design the interactive component of the data exploration to maximize learning and minimize user frustration. </p>

<p>The interactives are prototyped and revised for usability, ability to accomplishing the desired learning objective, and interest of professors to integrated the Data Explorations into their teaching.</p>

<p>The data in the interactives are not being pulled live from the stream to ensure that they will work no matter if the original source experiences difficulties, undergoes ungrading, etc. The data within the Data Explorations will be updated periodically to include the most complete and up-to-date as possible.</p>

<h3>Learn More about Each Collection of Data Explorations</h3>

<div class="row">
  <div class="col-md-4">
    <a href="productivity/guide.php"><img src="productivity/screenshots/ConceptMap1_14366437299_sm.png" alt="Chlorophyll colored water off the coast of Brazil" width="250" height="150" class="thumbnail"></a>
  </div>
  <div class="col-md-8">
    <h4><a href="productivity/guide.php">Exploring Primary Production with Data</a></h4>
    <p>Through these activities, we will explore primary production in greater detail. Primary production is the rate at which organisms store energy through the formation of organic matter (carbon-based compounds), using energy derived from solar radiation during photosynthesis or from chemical reactions during chemosynthesis.</p>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-4">
    <a href="chemistry/guide.php"><img src="chemistry/screenshots/water-1555170_960_720_sm.jpg" alt="Ocean Wave" width="250" height="150" class="thumbnail"></a>
  </div>
  <div class="col-md-8">
    <h4><a href="chemistry/guide.php">Exploring Properties of Seawater with OOI Data</a></h4>
    <p>These activities explore properties of seawater in greater detail, to be used as Exploration or Application activities. The properties of seawater explored include: salinity variations over time and space, processes that affect surface seawater salinity, changes in pH with depth, relationship between pH and oceanic pCO<sub>2</sub> for the carbonate buffering system, variations in salinity with depth over time and space, and the depth of the halocline over time and space.</p>
  </div>  
</div>
<hr>
<div class="row">
  <div class="col-md-4">
    <a href="geology/guide.php"><img src="geology/screenshots/mgds_juandefuca_sm.jpg" alt="The ocean floor off the coast of Oregon and Washington" width="250" height="150" class="thumbnail"></a>
  </div>
  <div class="col-md-8">
    <h4><a href="geology/guide.php">Exploring Tectonics & Seamounts with OOI Data</a></h4>
    <p>These activities explore characteristics of seamounts and tectonics in greater detail, to be used as Exploration or Application activities. The properties of seamounts and tectonics explored include: tectonic features and patterns found at divergent and transform boundaries, growth and decay of hydrothermal vents, and tectonic features and patterns of change at seamounts over time.</p>
  </div>
</div>


<?php 
  include_once('footer.php'); 
?>