<?php
	require '../classes.php';
	require '../db/connect.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$password = $_POST['password'];
	$newemail = $_POST['newemail'];

	$checkpassword = new getDBData($conn, 'SELECT user_password FROM users WHERE user_id = :id');

	$retrieveHash = $checkpassword -> getData(array(':id' => $_SESSION['user']->user_id));

	$hash = $retrieveHash -> fetch(PDO::FETCH_ASSOC);
	if (password_verify($password, $hash['user_password'])){
		$_SESSION['user'] -> changeEmail($conn, $newemail);
		header('location: /diceandragons/ucp/changeemail.php');
	} else {
		$_SESSION['error'] = 10;
		header('location: /diceandragons/ucp/changeemail.php');
	}

} else {
	header('location: /diceandragons/ucp/changeemail.php');
}

?>