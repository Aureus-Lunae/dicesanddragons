<?php

session_start();

if (!isset( $_SESSION['loggedin'] )) {
	$_SESSION['failcount'] = 0;
	$_SESSION['loggedin'] = 0;
}

$root = $_SERVER['HTTP_HOST'];
$root='http://'.$root.'/diceandragons/';

//classes

/**
 * Database classes
 */
class getDBData {
	private $db_query;
	private $db_conn;

	public function __construct($conn, $query) {
		$this -> db_query = $query;
		$this -> db_conn = $conn;
	}

	public function getData($params=NULL) {
		$data = $this -> db_conn -> prepare($this -> db_query);
		$data -> execute($params);
		return $data;
	}
}

/**
 * User Classes
 */
class user {
	private $username;
	private $access;

	public function __construct($username, $access) {
		$this -> username = $username;
		$this -> access = $access;
	}

	public function requiredAccess($access) {
		if ($this->accss < $access) {
			header('Location: ' . $root . 'index.php');
		}
	}

	public function showUsername(){
		return $this -> username;
	}

	public function checkAccess() {
			return $this -> access;
	}
}

?>