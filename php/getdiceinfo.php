<?php
  if (!isset($_GET['id'])){
  	header('location: products.php');
  }

  $product_id = $_GET['id'];

  require 'db/connect.php';

	$sql_query = 'SELECT product_name, product_price, product_category, product_photo, product_desc FROM products WHERE product_id = :product_id';

	$productDB = new getDBData($conn, $sql_query);

	$row = $productDB -> getData(array(':product_id'=>$product_id));

	$product = $row->fetch(PDO::FETCH_ASSOC);

	switch ($product['product_category']) {
		case 0:
			$cat = '7dice';
			break;
		case 1: 
			$cat = '12d6';
			break;
		case 2:
			$cat = '10d10';
			break;
		default:
			$cat = '7dice';
			break;
	}

	$name = $product['product_name'];
	$price = $product['product_price'];
	$photo = $product['product_photo'];
	$desc = nl2br($product['product_desc']);

	echo '
	<div class="product_info">
	 	<div class="img_container">
	 	 	<div class="product_img" style="background-image: url(/diceandragons/img/' . $cat .'/' . $photo . ')" >
      </div>
     </div>
    <div class="description">
    	<div>
    		<div class="cat">' . $cat . ' set</div>
    		<h1>' . $name . '</h1>
    		<div class="price_id_wrapper">
    			<div class="price">€' . $price . '</div>
    			<div class="product_id">Item #' . $product_id . '</div>
    		</div>
    		<p>' . $desc . '</p>
    	</div>
      	
     <div class="addwrapper"><div class="add"  onclick="addToCart(`' . $product_id . '`,`' . $name . '`,`' . $price . '`,`' . $cat . '/' . $photo . '`,`/diceandragons/php/carthandler.php`, showCart)">Add to cart
     </div></div>
    </div>
  </div>';

?>