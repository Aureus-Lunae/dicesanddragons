<!DOCTYPE html>

<html lang="en-US">

<?php 
require('php/classes.php');
?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title>Products</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700" rel="stylesheet">
	<link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

	<?php require_once('html/header.php'); ?>
	<div class="content_wrapper">
		<div class="text_wrapper">
			<h1>Dice Sets | Dices for D&D and other tabletop rpg games</h1>
			<img src="/diceandragons/img/dicebanner.png" alt="dices">
			<p>In the world of gaming, a single die isn't going to do you much good. You need a lot of dices. Different RPGs require different dice sets. Each dice set gives you all the basics you need to game.</p>
		</div>
    <div class="products_filter">
       <div class="text">
         Choose your diceset:
       </div>
       <div class="filter active" id="filter_all" onclick="catClick(`filter_all`, `php/productcardsfilter.php`, showData)">
         All
       </div>
       <div class="filter" id="filter_7-dice" onclick="catClick(`filter_7-dice`, `php/productcardsfilter.php`, showData)">
         7-Dice
       </div>
       <div class="filter" id="filter_12d6" onclick="catClick(`filter_12d6`, `php/productcardsfilter.php`, showData)">
         12d6
       </div>
       <div class="filter" id="filter_10d10" onclick="catClick(`filter_10d10`, `php/productcardsfilter.php`, showData)">
         10d10
      </div>
     </div>

    <div class="products_wrapper" id="product_output">
   	  <?php
        var_dump($_SESSION['cart']);
   	  	require 'php/productscards.php';
   	  ?>

    </div>
    
	</div>

  <script type="text/javascript" src="js/pagefilters.js"></script>
  <script type="text/javascript" src="js/cartupdater.js"></script>
</body>

</html>