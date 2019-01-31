<?php
	require 'classes.php';
	require 'db/connect.php';
	$filter = '';

	$cat = $_GET['cat'];
	switch ($cat){
		case '7-dice':
			$filter='WHERE product_category = 0 ';
			break;
		case '12d6':
			$filter='WHERE product_category = 1 ';
			break;
		case '10d10':
			$filter='WHERE product_category = 2 ';
			break;
		default:
			break;
	}


	$sql_query = 'SELECT product_name, product_price, product_category, product_photo FROM products ' . $filter . 'LIMIT 25';

	$productDB = new getDBData($conn, $sql_query);

	$rows = $productDB -> getData();

	foreach ($rows as $row){
		$product = new productCard($row['product_name'], $row['product_photo'], $row['product_price'], $row['product_category']);
		$product -> showCard();
	}

?>