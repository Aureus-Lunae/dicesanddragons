<?php
	require '../php/db/connect.php';

	$sql_query = 'SELECT product_id, product_name, product_price FROM products LIMIT 25';
	$productDB = new getDBData($conn, $sql_query);

	$rows = $productDB -> getData();

	foreach ($rows as $row){
		echo '<div class="product">
		      <div class="id">#' . $row['product_id'] . '</div>
		      <div class="name">' . $row['product_name'] . '</div>
		      <div class="price">€' . $row['product_price'] . '</div>
		      <div class="modify"><a href="editproduct.php?id=' . $row['product_id'] . '">edit</a> | out of order | delete</div>
		    </div>';
	}
?>