<?php
	require '../classes.php';
	require '../db/connect.php';

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$password_hashed = password_hash($password, PASSWORD_BCRYPT);


	$sql_query = 'INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_adress`, `user_city`, `user_postcode`, `user_country`) VALUES (NULL, :first, :last, :email, :password, NULL, NULL, NULL, NULL);';

	$insertRegister = new getDBData($conn, $sql_query);

	$result = $insertRegister -> getData(array(':first'=>"$firstname" , ':last'=>"$lastname", ':email' => "$email", ':password' => "$password_hashed"));

	echo "Registered successfully!";
	header('Location: ' . $root . 'ucp/login.php');

?>