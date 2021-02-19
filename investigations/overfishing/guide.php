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

<h3>Instructor Notes</h3>
<p class="pull-right"><a href="index.php" class="btn btn-primary">Go to Investigation</a></p>
<p>Overfishing can remove many individuals from a population, which can lead to a population bottleneck. Population bottlenecks often result in a loss of genetic diversity in the population, which leads to evolution of the population. In this activity, students will investigate the relationship between overfishing and genetic diversity within twelve fish groupings. Students will analyze differences in allelic richness of overfished and not overfished populations to determine if a population bottleneck is occurring and write an explanation of their findings citing the evidence.</p>

<h4>Instructional Tips</h4>
<p>This investigation illustrates the relationship between overfishing and genetic diversity to interpret if evolutionary changes are occurring due to overfishing. It can be used in a human impacts, biological diversity, or genetics lecture. The students are asked to develop their written explanation skills after analyzing twelve paired comparisons of allelic richness data. Students will need to have an understanding of: DNA, alleles, population bottleneck, genetic diversity, and Before-After/Control-Impact experimental design.</p>

<h4>Preconceptions and Lecture Questions</h4>
<p><strong>Lecture Questions</strong>: To assist in the students success of analyzing the data, you may want to review with the students ahead of time population bottlenecks and genetic diversity, with questions like:</p>
<ul>
  <li>What is a population bottleneck?</li>
  <li>What are the impacts to genetic diversity during and post a population bottleneck?</li>
  <li>Why is genetic diversity important to a population?</li>
</ul>
<p><strong>Misconceptions</strong>: Students may believe that populations cannot recover from a population bottleneck and/or that overfishing would lead to extinction before a population bottleneck.</p>

<h4>Resources</h4>
<ul>
  <li>Pinsky, M.L. and S.P. Palumbi. 2013. Meta-analysis reveals lower genetic diversity in overfished populations. Molecular Ecology 23: 29-39.</li>
</ul>

<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
