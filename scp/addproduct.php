<!DOCTYPE html>

<html lang="en-US">

<?php require_once('../php/classes.php'); 
  $_SESSION['user']->requiredAccess(2);
?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> </title>
	<link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700" rel="stylesheet">
	<link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
  
	<?php require_once('../html/header.php'); ?>

	<div class="content_wrapper">

    <div class="form_wrapper">
      <div class="addproduct_container">

          <form action="/diceandragons/php/scp/addproducthandler.php" method="POST" enctype="multipart/form-data">

            <h1>Add a new product</h1>

            <label for="product_name">Name:</label>
            <input type="text" id="product_name" name="product_name" maxlength="32" autofocus required>
            <label for="product_price">Price:</label>
            <input type="number" id="product_price" name="product_price" maxlength="6" step="any" required>

            <label for="product_cat">Category:</label>
            <input type="radio" name="product_cat" id="product_cat" value="0" required>7-dice<br />
            <input type="radio" name="product_cat" id="product_cat" value="1" required>12d6<br />
            <input type="radio" name="product_cat" id="product_cat" value="2" required>10d10<br />

            <input type="file" id="product_photo" name="product_photo" accept="image/png, image/jpeg" required>

            <textarea name="product_desc" id="product_desc" maxlength="2000"></textarea required> 
            
            <button type="submit">Add new product</button>
            <?php 
              if (isset($_GET['add'])) {
                echo '<p>Product has been added</p>';
              }
            ?>
          </form>
      </div>
    </div>

	</div>
</body>

</html>