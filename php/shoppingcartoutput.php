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
   	<a href="/diceandragons/diceinfo.php?id=' . $id . '"><img src="/diceandragons' . $img . '" alt="' . $name . '" /></a><div class="product_data">
   	<div class="name">' . $name . '</div>
   	<div class="price">€' . $price . ' ea.</div>
   	<div class="id">Item #' . $id . '</div></div>
   	<div class="quantity">quantity: 
      <i class="fas fa-minus" onclick="removeFromCart(`' . $id . '`,`/diceandragons/php/carthandler.php`, updateShoppingCart)"></i>
        <span class="bold"> ' . $quantity . ' </span>
      <i class="fas fa-plus"onclick="addToCart(`' . $id . '`,`' . $name . '`,`' . $price . '`,`' . $img . '`,`/diceandragons/php/carthandler.php`, updateShoppingCart)"></i></div>
   	<div class="subtotal">Subtotal: <span class="bold">€' . $subtotal . '</span></div>
   	<div class="remove" onclick="deleteFromCart(`' . $id . '`, `/diceandragons/php/carthandler.php`)"><i class="fas fa-trash-alt"></i></div>
   	</div>';
  }

  echo '
		<div class="total">
   	<div class="empty"></div>
   	<div class="quantity">Total products: ' . $_SESSION['cart'] -> totalQuantity . '</div>
   	<div class="subtotal">Total: €' . $_SESSION['cart'] -> subTotalPrice . '</div>
   	</div>';
   
?>