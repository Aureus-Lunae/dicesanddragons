<?php
	require '../classes.php';
	require '../db/connect.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$repeatpassword = $_POST['repeatpassword'];

	if ($newpassword !== $repeatpassword){
		echo "error 20";
		$_SESSION['error'] = 20;
		header('location: /diceandragons/ucp/changepassword.php');
		exit();
	}

	$checkpassword = new getDBData($conn, 'SELECT user_password FROM users WHERE user_id = :id');
	$retrieveHash = $checkpassword -> getData(array(':id' => $_SESSION['user']->user_id));

	$hash = $retrieveHash -> fetch(PDO::FETCH_ASSOC);
	if (password_verify($oldpassword, $hash['user_password'])){
		$newhash = password_hash($newpassword, PASSWORD_BCRYPT);
		$_SESSION['user'] -> changePassword($conn, $newhash);
		header('location: /diceandragons/ucp/changepassword.php');
	} else {
		$_SESSION['error'] = 10;
		header('location: /diceandragons/ucp/changepassword.php');
	}

} else {
	header('location: /diceandragons/ucp/changepassword.php');
}

?>