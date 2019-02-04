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
  <meta name="viewport content=" width=device-width, initial-scale=1.0,
   maximum-scale=1.0" />
  <title>Products</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
   integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
   crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700"
   rel="stylesheet">
  <link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css"
   media="all" />
</head>

<body>
  <div id="addToClass" class="modal">
    <div class="product_confirmation">
      Product added to cart!
    </div>
  </div>
  <?php require_once('html/header.php'); ?>
  <div class="content_wrapper">

    <div class="products_wrapper">
      <?php
       require('php/getdiceinfo.php'); ?>
    

    </div>

  <script type="text/javascript" src="js/cartupdater.js"></script>
</body>

</html>