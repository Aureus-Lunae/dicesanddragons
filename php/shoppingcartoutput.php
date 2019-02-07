<?php
  require_once 'classes.php';

  if (!$_SESSION['cart'] -> cartproducts) {
    echo '<div class="product"><div class="product_data"><div class="name">Your basket is empty.</div></div></div>';
  }

  foreach ($_SESSION['cart'] -> cartproducts as $key => $value){
   	$id = $value['id'];
   	$name = $value['name'];
   	$img = $value['img'];
   	$price = $value['price'];
   	$quantity = $value['quantity'];
   	$subtotal = $price * $quantity;

   	echo '<div class="product">
   	<img src="/diceandragons' . $img . '" alt="' . $name . '" /><div class="product_data">
   	<div class="name">' . $name . '</div>
   	<div class="price">€' . $price . ' ea.</div>
   	<div class="id">Item #' . $id . '</div></div>
   	<div class="quantity">quantity: ' . $quantity . '</div>
   	<div class="subtotal">Subtotal: €' . $subtotal . '</div>
   	<div class="remove" onclick="deleteFromCart(`' . $id . '`, `/diceandragons/php/carthandler.php`)"><i class="fas fa-trash-alt"></i></div>
   	</div>';
  }

  //echo '<br />Quanity: ' . $_SESSION['cart'] -> totalQuantity . '<br />Total: €' . $_SESSION['cart'] -> subTotalPrice . '<br /><br />';

  echo '
		<div class="total">
   	<div class="empty"></div>
   	<div class="quantity">Total products: ' . $_SESSION['cart'] -> totalQuantity . '</div>
   	<div class="subtotal">Total: €' . $_SESSION['cart'] -> subTotalPrice . '</div>
   	</div>';
   
?>