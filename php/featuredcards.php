<?php
	require 'db/connect.php';

	$sql_query = 'SELECT product_id, product_name, product_price, product_category, product_photo FROM products WHERE product_featured = 1 LIMIT 10';

	$productDB = new getDBData($conn, $sql_query);

	$rows = $productDB -> getData();

	foreach ($rows as $row){
		$product = new productCard($row['product_id'], $row['product_name'], $row['product_photo'], $row['product_price'], $row['product_category']);
		$product -> showCard();
	}

?>