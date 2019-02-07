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
  
	<?php require_once('../html/header.php'); 
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      require '../php/scp/geteditproductdata.php';
    } else {
      header('Location: listproducts.php');
    }
    
  ?>

	<div class="content_wrapper">

    <div class="form_wrapper">
      <div class="addproduct_container">

          <form action="/diceandragons/php/scp/editproducthandler.php" method="POST" enctype="multipart/form-data">

            <h1>Edit product</h1>
            <input type="number" id="id" name="id" value="<?php echo $id;?>" />
            <label for="product_name">Name:</label>
            <input type="text" id="product_name" name="product_name" maxlength="32" autofocus required value="<?php echo $product['product_name'];?>">
            <label for="product_price">Price (€):</label>
            <input type="number" id="product_price" name="product_price" maxlength="6" step="any" required value="<?php echo $product['product_price'];?>" />
            <label for="product_discount">Discount (%):</label>
            <input type="number" id="product_discount" name="product_discoun" maxlength="3" required value="<?php echo $product['product_discount'];?>" />

            <label for="product_cat">Category:</label>
            <input type="radio" name="product_cat" id="product_cat" value="0" required <?php if ($product['product_category'] == 0){ echo "checked"; } ?> >7-dice<br />
            <input type="radio" name="product_cat" id="product_cat" value="1" required <?php if ($product['product_category'] == 1){ echo "checked"; } ?>>12d6<br />
            <input type="radio" name="product_cat" id="product_cat" value="2" required <?php if ($product['product_category'] == 2){ echo "checked"; } ?>>10d10<br />

            <textarea name="product_desc" id="product_desc" maxlength="2000"><?php echo $product['product_desc']?></textarea required> 
            
            <button type="submit">Edit product</button>
            <?php 
              if (isset($_GET['add'])) {
                echo '<p>Product has been updated</p>';
              }
            ?>
          </form>
      </div>
    </div>

	</div>
</body>

</html>