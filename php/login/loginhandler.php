<?php
	require '../classes.php';
	require '../db/connect.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql_query = 'SELECT user_password FROM users WHERE user_email = :email';

	$login = new getDBData($conn, $sql_query);

	$loginCheck = $login -> getData(array('email'=>"$email"));


	$row_count = $loginCheck->rowCount();

	if ($row_count == 0) {
		echo 'User not found';
	} else {

		$loginPassword = $loginCheck ->fetch(PDO::FETCH_ASSOC);
		$hash = $loginPassword['user_password'];

		if (password_verify($password, $hash)) {

			$sql_query = 'SELECT user_firstname, user_lastname, access FROM users WHERE user_email = :email';
			$loginUser = new getDBData($conn, $sql_query);
			$userResults = $loginUser -> getData(array('email'=> "$email"));

			$user = $userResults->fetch(PDO::FETCH_ASSOC);
			$username = $user['user_firstname'] . ' ' . $user['user_lastname'];

			$_SESSION['user'] = new user($username, $user['access']);
			$_SESSION["loggedin"] = 1;
			echo "Successfully logged in <br />";
			echo $_SESSION['loggedin'];
			var_dump($_SESSION['user']);

		} else {
			echo "invalid Password";
		}
	}


?>