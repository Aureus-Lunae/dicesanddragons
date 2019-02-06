<?php
	require '../classes.php';
	require '../db/connect.php';

	if ($_SESSION['failcount'] >= 5) {
		header('Location: ' . $root . 'index.php');
	}

	$email = mb_strtolower($_POST['email']);
	$password = $_POST['password'];

	$sql_query = 'SELECT user_password FROM users WHERE user_email = :email';

	$login = new getDBData($conn, $sql_query);

	$loginCheck = $login -> getData(array('email'=>"$email"));

	$row_count = $loginCheck->rowCount();

	if ($row_count == 0) {
		$_SESSION['failcount']++;
		header('Location: ' . $root . 'ucp/login.php');
	} else {

		$loginPassword = $loginCheck -> fetch(PDO::FETCH_ASSOC);
		$hash = $loginPassword['user_password'];

		if (password_verify($password, $hash)) {

			$sql_query = 'SELECT user_id, user_firstname, user_lastname, access FROM users WHERE user_email = :email';
			$loginUser = new getDBData($conn, $sql_query);
			$userResults = $loginUser -> getData(array('email'=> "$email"));

			$user = $userResults->fetch(PDO::FETCH_ASSOC);

			$_SESSION['user'] = new user($user['user_id'], $user['access'], $user['user_firstname'], $user['user_lastname']);
			$_SESSION['loggedin'] = 1;
			header('Location: ' . $root . 'index.php');


		} else {
			$_SESSION['failcount']++;
			header('Location: ' . $root . 'ucp/login.php');
		}
	}


?>