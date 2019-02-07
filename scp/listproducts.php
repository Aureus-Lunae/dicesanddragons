<!DOCTYPE html>

<html lang="en-US">

<?php 
  require('../php/classes.php');
?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700"
   rel="stylesheet">
  <link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css"
   media="all" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
   integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
   crossorigin="anonymous">


</head>

<body>
  <?php require_once('../html/header.php'); ?>

  <div class="content_wrapper">

    <div class="list_products">
      <h1>Products</h1>
      <div class="products">
        <div class="product heading">
          <div class="id">id</div>
          <div class="name">Name</div>
          <div class="price">Price</div>
          <div class="modify">Modify</div>
        </div>

        <?php require '../php/scp/listproductshandler.php'; ?>

      </div>
    </div>

  </div>
  <?php require_once('../html/footer.html'); ?>
  <script type="text/javascript" src="js/cartupdater.js"></script>
</body>

</html>