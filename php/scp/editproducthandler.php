<?php
	require '../classes.php';
	require '../db/connect.php';


if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
	$name = $_POST['product_name'];
	$price = $_POST['product_price'];
	$desc = htmlspecialchars($_POST['product_desc']);
	$cat = $_POST['product_cat'];
	$discount = $_POST['product_discount'];
	$name = $_POST['product_name'];
	$id = $_POST['id'];

	$sql_query = 'UPDATE
    products
SET
    product_name = :name,
    product_price = :price,
    product_category = :cat,
    product_desc = :descr,
    product_discount = :discount
WHERE
    product_id = :id';
	$editProduct = new getDBData($conn, $sql_query);

	$editProduct -> getData(array(':name'=>$name, ':price'=>$price, ':cat'=>$cat, ':descr'=>$desc, ':discount'=>$discount, ':id'=>$id));

	header('Location: ../../scp/editproduct.php?id=' . $id . '&add=1');

} else {
	header('Location: /index.php');
}
?>