<?php
	require '../php/db/connect.php';

	$sql_query = 'SELECT product_id, product_name, product_category, product_discount, product_price, product_desc FROM products WHERE product_id=:id';
	$productDB = new getDBData($conn, $sql_query);

	$rows = $productDB -> getData(array(':id'=>$id));

	$product = $rows -> fetch(PDO::FETCH_ASSOC);
?>