<?php
	require '../classes.php';
	require '../db/connect.php';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = mb_strtolower($_POST['email']);
	$password = $_POST['password'];
	$repeatPassword = $_POST['repeat_password'];

	if ($password !== $repeatPassword){
		$_SESSION['error'] = 20;
		header('location: /ucp/register.php');
		exit();
	}
	
	$checkEmail = $conn ->  prepare('SELECT COUNT(user_email) as count FROM users WHERE user_email = :email');
	$checkEmail -> execute(array(':email'=> $email));
	$emailExists = $checkEmail -> fetch(PDO::FETCH_ASSOC);
	
	if ($emailExists['count'] == 1 ){
		$_SESSION['error'] = 31;
		header('location: /dicesanddragons//ucp/register.php');
		exit();
	}

	$password_hashed = password_hash($password, PASSWORD_BCRYPT);

	$sql_query = 'INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_adress`, `user_city`, `user_postcode`, `user_country`) VALUES (NULL, :first, :last, :email, :password, NULL, NULL, NULL, NULL);';

	$insertRegister = new getDBData($conn, $sql_query);

	$insertRegister -> getData(array(':first'=>$firstname , ':last'=>$lastname, ':email' => $email, ':password' => $password_hashed));
    $_SESSION['success'] = 35;
	header('Location: /dicesanddragons//ucp/login.php');
} else {
    header('Location: /dicesanddragons/ucp/register.php');
}

?>
