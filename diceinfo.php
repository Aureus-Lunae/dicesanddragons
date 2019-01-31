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

  <?php require_once('html/header.php'); ?>
  <div class="content_wrapper">

    <div class="products_wrapper">
      <?php
       require('php/getdiceinfo.php'); ?>
      <div class="product_info">
        <h1>Example Title - 7dice</h1>

        <div class="img_container">
          <div class="product_img" style="background-image: url('img/7dice/pinkghostlyglow.png')">
          </div>
        </div>

        <div class="description">
          <p>
            descr
          </p>

          <div class="shop">
            <div class="price">€999.99</div>
            <div class="add">Add to cart</div>
          </div>
        </div>
      </div>

    </div>

    <script type="text/javascript" src="js/pagefilters.js"></script>
</body>

</html>