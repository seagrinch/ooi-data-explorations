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


<h3>Instructor Notes</h3>
<p class="pull-right"><a href="index.php" class="btn btn-primary">Go to Investigation</a></p>
<p>This lesson was designed assuming that the students have had a lecture on calcifers, carbonate chemistry, and gas exchange. Students should also have an understanding of models.</p>

<h4>Instructional Tips</h4>
<p>This lesson was designed assuming that the students have had a lecture on calcifers, carbonate chemistry, and gas exchange. Students should also have an understanding of models.</p>
<p><strong>Jigsaw Activity</strong>: This lesson can be turned into a jigsaw activity by dividing the class into smaller groups and assigning each group an evidence piece or pieces to work on as a group. After they have had sufficient time to work on their piece of evidence, have each group share with the class their piece of evidence and their answers to the interpretation questions they were assigned.</p>

<?php 
  $scripts[] = "../navtabs.js";
  include_once($base_url . 'footer.php'); 
?>
