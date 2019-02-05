<?php
	require('classes.php');

	$id = $_GET['id'];
	$name = $_GET['name'];
	$price = $_GET['price'];
	$img = $_GET['img'];
	$qnt = $_GET['qnt'];
	$add = $_GET['add'];

	if ($_GET['add'] == 1) {
		$_SESSION['cart'] -> addToCart($id, $name, $img, $price, $qnt);
	}

	if ($_GET['add'] == -2) {
		$_SESSION['cart'] -> removeFromCart($id, 999);
	}

	echo $_SESSION['cart'] -> totalQuantity;
?>