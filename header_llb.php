<?php
date_default_timezone_set('America/New_York');
if(!isset($base_url)) $base_url='./';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php 
    $default_title = "Data Explorations";
    if($page_title) {
      echo $page_title . " | " . $default_title;
    } else {
      echo $default_title;
    }
  ?></title>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/overrides.css">
  <link rel="stylesheet" type="text/css" href="<?=$base_url?>css/llb.css">
  <link rel="stylesheet" type="text/css" href="<?=$base_url?>lightbox/ekko-lightbox.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?=$base_url?>index.php"><img alt="Brand" src="<?=$base_url?>logo.png"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?=$base_url?>index.php" class="navbar-brand"></a> <a href="<?=$base_url?>index.php" class="navbar-brand">Data Explorations</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown <?php echo ($page=='activities' ? 'active' : '') ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Collections <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=$base_url?>investigations/">EPE Investigations</a></li>
                <li><a href="<?=$base_url?>productivity/">Primary Production</a></li>
                <li><a href="<?=$base_url?>chemistry/">Properties of Seawater</a></li>
                <li><a href="<?=$base_url?>geology/">Tectonics & Seamounts</a></li>
                <li><a href="<?=$base_url?>2019/">2019 Collection</a></li>
              </ul>
            </li>
            <li class="dropdown <?php echo ($page=='about' ? 'active' : '') ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Project Info<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=$base_url?>about.php">About this Project</a></li>
                <li><a href="<?=$base_url?>instructors.php">Instructor's Guides</a></li>
              </ul>
            </li>
            <li><a href="https://datalab.marine.rutgers.edu">Data Labs Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
