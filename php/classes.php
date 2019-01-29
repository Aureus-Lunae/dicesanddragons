<?php
$_SESSION['loggedin'] = 0;

session_start();
if (!isset( $_SESSION['loggedin'] )) {
	$_SESSION['loggedin'] = 0;
}

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

class user {
	private $username;
	private $access;

	public function __construct($username, $access) {
		$this -> username = $username;
		$this -> access = $access;
	}

	public function checkAccess($access) {
		if ($this->accss < $access) {
			header("Location: ../../index.php");
		}
	}

	public function showUsername(){
		return $this -> username;
	}

}

?>