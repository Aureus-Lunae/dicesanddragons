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
  <meta name="viewport" width="device-width" initial-scale="1.0">
  <title>Shopping Cart</title>
  <link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700"
   rel="stylesheet">
  <link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css"
   media="all" />
</head>

<body>
  <?php require_once('html/header.php'); ?>

  <div class="content_wrapper">

  <?php
    $testcart = new cart();
    $testcart -> addToCart(1001, 'Gemini Purple-teal', '7dice/geminipurpleteal.png', 9.98, 1);
    var_dump($testcart);
    echo '<br />Quanity: ' . $testcart -> totalQuanity . '<br />Total: €' . $testcart -> subTotalPrice . '<br /><br />';
    $testcart -> addToCart(1001, 'Gemini Purple-teal', '7dice/geminipurpleteal.png', 9.98, 5);
    var_dump($testcart);
    echo '<br />Quanity: ' . $testcart -> totalQuanity . '<br />Total: €' . $testcart -> subTotalPrice . '<br /><br />';
    $testcart -> addToCart(1002, 'Pink Ghostly Glow in the Dark', '7dice/geminipurpleteal.png', 11.99, 1);
    var_dump($testcart);
    echo '<br />Quanity: ' . $testcart -> totalQuanity . '<br />Total: €' . $testcart -> subTotalPrice . '<br /><br />';
    $testcart -> addToCart(1001, 'Gemini Purple-teal', '7dice/geminipurpleteal.png', 9.98, 5);
    var_dump($testcart);
    echo '<br />Quanity: ' . $testcart -> totalQuanity . '<br />Total: €' . $testcart -> subTotalPrice . '<br /><br />';
  ?>  

  </div>

</body>

</html>