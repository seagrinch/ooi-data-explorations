<?php
date_default_timezone_set('America/New_York');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php 
    $default_title = "Exploring Primary Productivity with Data";
    if($page_title) {
      echo $page_title . " | " . $default_title;
    } else {
      echo $default_title;
    }
  ?></title>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/overrides.css">
  <link rel="stylesheet" type="text/css" href="lightbox/ekko-lightbox.css">

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
          <a class="navbar-brand" href="http://oceanobservatories.org"><img alt="Brand" src="logo.png"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" class="navbar-brand"></a> <a href="index.php" class="navbar-brand">Exploring Primary Productivity with Data</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li <?php echo ($page=='activities' ? 'class="active"' : '') ?> ><a href="index.php">Activities</a></li>
            <li <?php echo ($page=='workshop' ? 'class="active"' : '') ?> ><a href="workshop.php">Workshop</a></li>
            <li <?php echo ($page=='about' ? 'class="active"' : '') ?> ><a href="about.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
