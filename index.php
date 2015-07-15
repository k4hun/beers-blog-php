<?php

    require_once 'models/beer.php';
    require_once 'models/style.php';
    require_once 'models/brewery.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>Beers</title>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="assets/stylesheets/styles.css">
<link rel="stylesheet" href="assets/stylesheets/beers.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/javascripts/scripts.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body onload='startSlider()'>
    <div class='side-menu'>
     	<div class='hide-menu'>
        	<div class='glyphicon glyphicon-arrow-left'></div>
    	</div>
    	<ul>
        	<li>
        		<a href="#beers"><img src="assets/images/menu/beers.png" height="100" width="100"></a>
        		<a href="#beers">beers</a>
      		</li>
        	<li>
        		<a href="#shops"><img src="assets/images/menu/shops.png" height="100" width="100"></a>
        		<a href="#shops">shops</a>
        	</li>
        	<li>
        		<a href="#about"><img src="assets/images/menu/about.png" height="100" width="100"></a>
        		<a href="#about">about</a>
        	</li>
        	<li>
        		<a href="#contact"><img src="assets/images/menu/contact.png" height="100" width="100"></a>
        		<a href="#contact">contact</a>
        	</li>
      	</ul>
    </div>
    <div class='top-cups'>
      	<div class='icon-menu'>
        	<div class='glyphicon glyphicon-menu-hamburger'></div>
        	Menu
    	</div>
      	<div class='logo-top'></div>
    </div>
        <?php include ('beers.php') ?>
    <hr>
        <?php include ('shops.php') ?>
    <hr>
        <?php include ('about.php') ?>
    <hr>
        <?php include ('contact.php') ?>
</body>

</html>