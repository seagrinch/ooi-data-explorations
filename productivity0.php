<?php 
  $lesson_title = 'Primary Production in General';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  
  include_once('header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="productivity_index.php">Exploring Primary Production with Data</a></li>
  <li><a href="productivity1.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('invitation','reflection'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='invitation'): ?>
<p>Use the OOI Concept Map Builder tool to create a concept map of <em>primary production.</em></p>
<?php elseif ($level=='reflection'): ?>
<p>Use the OOI Concept Map Builder tool to revise your original concept map of <em>primary production.</em></p>
<?php endif; ?>



<h3>How to Create a Concept Map</h3>
<p class="note">Important: You can only create maps using a desktop or laptop computer.  Tablets and mobile devices that do not support Flash cannot be used with this tool</p>

<?php if ($level=='invitation'): ?>

<ol>
  <li>To create a concept map in the OOI Ocean Education Portal you must first <a href="http://education.oceanobservatories.org/user/register">register for an account</a>. You must be logged into the website to create and save concept maps.</li>
  <li>Click on the Concept Maps link on the OOI home page menu bar and select <a href="http://education.oceanobservatories.org/node/add/cm-resource">Create a Concept Map</a>.</li>
  <li>The Concept Map Builder will open with a new workspace to build out your concept map. Make sure to give it a title and save your concept map.</li>
  <li>For more information of how to work in the Concept Map Builder, open and read the <a href="productivity/documents/ooi_conceptmap_instructions.pdf">Creating a Concept Map Using the OOI Ocean Education Portal</a> resource.</li>
</ol>

<?php elseif ($level=='reflection'): ?>

<ol>
  <li>Log into the <a href="http://education.oceanobservatories.org">OOI Ocean Education Portal</a>. You must be logged into the website to create and save concept maps.</li>
  <li>Click on the Concept Maps link on the OOI home page menu bar and select <a href="http://education.oceanobservatories.org/resource-browser#/search?filter=author&type=cm">My Concept Map</a>.</li>
  <li>Select your original primary productivity concept map, which will open.</li>
  <li>Select Copy in the top right corner of the concept map. A new workspace with a copy of the original map will appear to make your edits, additions, deletions, etc. Make sure to change the title of the new concept map and save the map.
  <li>For more information of how to work in the Concept Map Builder, open and read the <a href="productivity/documents/ooi_conceptmap_instructions.pdf">Creating a Concept Map Using the OOI Ocean Education Portal</a> resource.</li>
</ol>

<?php endif; ?>


<p style="text-align: right;">Finished the activity?  Please take our quick <a href="index.php" class="btn btn-sm btn-warning">Student Survey</a></p>

<!-- ACTIVITY INTRODUCTION -->
<?php else: ?>

<div class="page-header">
<h2><?= $lesson_title ?><br><small>Think and reflect on your knowledge about primary production</small></h2>
</div>

<p>&nbsp;</p>

<div class="row">
  <div class="col-md-6">
    <p>Select the question your instructor has assigned:</p>
    <div class="list-group">
      <a href="productivity0.php?level=invitation" class="list-group-item">
        <h4 class="list-group-item-heading">Invitation</h4>
        <p class="list-group-item-text">Use the OOI Concept Map Builder tool to create a concept map of <em>primary production.</em></p>
      </a>
      <a href="productivity0.php?level=reflection" class="list-group-item">
        <h4 class="list-group-item-heading">Reflection</h4>
        <p class="list-group-item-text">Use the OOI Concept Map Builder tool to revise your original concept map of <em>primary production.</em></p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="Learning%20Cycle.png" alt="Learning%20Cycle" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('footer.php'); 
?>