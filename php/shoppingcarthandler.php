<?php
	
    var_dump($_SESSION['cart']);

    foreach ($_SESSION['cart'] -> cartproducts as $key => $value){
    	$id = $value['id'];
    	$name = $value['name'];
    	$img = $value['img'];
    	$price = $value['price'];
    	$quantity = $value['quantity'];
    	$subtotal = $price * $quantity;

    	echo '<div class="product">
    	<img src="/diceandragons' . $img . '" alt="' . $name . '" />' . $name . '</div>
    	<div class="price">€' . $price . '</div>
    	<div class="quantity">' . $quantity . '</div>
    	<div class="subtotal">€' . $subtotal . '</div>
    	';
    }

    echo '<br />Quanity: ' . $_SESSION['cart'] -> totalQuanity . '<br />Total: €' . $_SESSION['cart'] -> subTotalPrice . '<br /><br />';
?>