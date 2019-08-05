<?php 
  $lesson_title = 'Primary Production in General';
  $level = filter_input(INPUT_GET, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
  $level_title = ucwords(str_replace('_', ' ', $level));
  $page_title = ($level_title ? $lesson_title.' - '.$level_title : $lesson_title);
  $page = 'activity';
  
  $base_url = '../';
  include_once('../header.php'); 
?>

<ol class="breadcrumb">
  <li><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
  <li><a href="index.php">Primary Production</a></li>
  <li><a href="activity0.php"><?= $lesson_title ?></a></li>
  <?php echo ($level_title ? '<li>'.$level_title.'</li>' : '') ?>
</ol>

<!-- INDIVIDUAL ACTIVITY -->
<?php if (in_array($level, array('invitation','reflection'))): ?>

<div class="page-header">
<h2><?= $lesson_title ?> <small><?= $level_title ?></small></h2>
</div>

<h3>Challenge Question</h3>
<?php if ($level=='invitation'): ?>
<p>Create a Concept Map of your knowledge of <em>primary production.</em></p>
<?php elseif ($level=='reflection'): ?>
<p>Revise your original concept map of <em>primary production.</em></p>
<?php endif; ?>


<h3>How to Create a Concept Map</h3>

<p>Create a concept map on paper or using an online tool of your choice. If you are working in a group, flip chart paper or 11x14 sheets, and sticky notes are a great choice.</p>
<p>To create a concept map:</p>
<ol>
  <li>First draw circles for each key concept you wish to connect.</li>
  <li>Next, draw lines linking the concepts together.</li>
  <li>Add a phrase to each line that describes how the two concepts are linked.  <em>Don't forget this step.</em></li>
  <li>Finally, add a title to your map.</li>
</ol>

<h3>Example Concept Map</h3>
<p>As you design your concept map on the topic of Primary Production, you can follow this example that compares Hurricanes Katrina and Sandy.</p>
<img src="images/sandy_conceptmap.png">

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
      <a href="activity0.php?level=invitation" class="list-group-item">
        <h4 class="list-group-item-heading">Invitation</h4>
        <p class="list-group-item-text">Create a concept map of your knowledge of <em>primary production.</em></p>
      </a>
      <a href="activity0.php?level=reflection" class="list-group-item">
        <h4 class="list-group-item-heading">Reflection</h4>
        <p class="list-group-item-text">Revise your original concept map of <em>primary production.</em></p>
      </a>
    </div>
  </div>
  <div class="col-md-6">
    <img src="../images/Learning_Cycle_IR.png" alt="Learning Cycle Diagram" />
  </div>
</div>

<?php endif; ?>


<?php 
  include_once('../footer.php'); 
?>