<?php

session_start();

if (!isset( $_SESSION['loggedin'] )) {
	$_SESSION['failcount'] = 0;
	$_SESSION['loggedin'] = 0;
}

$root=$_SERVER['HTTP_HOST'];
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
	private $user_id;
	private $username;
	private $access;

	public function __construct($user_id, $username, $access) {
		$this -> user_id = $user_id;	
		$this -> username = $username;
		$this -> access = $access;
	}

	public function requiredAccess($access) {
		if ($this->access < $access) {
			$root=$_SERVER['HTTP_HOST'];
			$root='http://'.$root.'/diceandragons/';
			header('Location: ' . $root . 'index.php');
		}
	}

	public function changePassword($conn, $hash) {
		$updatePassword = $conn -> prepare('UPDATE users SET user_password = :hash WHERE user_id = ' . $this -> user_id);
		$updatePassword -> execute(array(':hash'=> $hash));
		$_SESSION['success'] = 30;
	}

	public function changeEmail($conn, $newemail) {
		$checkEmail = $conn ->  prepare('SELECT COUNT(user_email) as count FROM users WHERE user_email = :email');
		$checkEmail -> execute(array(':email'=> $newemail));
		$emailExists = $checkEmail -> fetch(PDO::FETCH_ASSOC);

		if ($emailExists['count'] == 1 ){
			$_SESSION['error'] = 31;
		} else {
			$updateEmail = $conn -> prepare('UPDATE users SET user_email = :email WHERE user_id = ' . $this -> user_id);
			$updateEmail -> execute(array(':email'=> $newemail));
			$_SESSION['success'] = 32;
		}
	}


	public function __get( $property ) {
		return $this->$property;
	}
}

/**
 * Cards
 */

class productCard {
	private $cardId;
	private $cardName;
	private $cardPhoto;
	private $cardPrice;
	private $cardCat;

	public function __construct($cardId, $name, $photo, $price, $cat) {
		$this -> cardId = $cardId;
		$this -> cardName = $name;
		$this -> cardPhoto = $photo;
		$this -> cardPrice = $price;
		switch ($cat) {
			case 0:
				$this -> cardCat = '7dice';
				break;
			case 1: 
				$this -> cardCat = '12d6';
				break;
			case 2:
				$this -> cardCat = '10d10';
				break;
			default:
				$this -> cardCat = '7dice';
				break;
		}
	}

	public function showCard() {
		echo '<div class="product_card"><a href="/diceandragons/diceinfo.php?id=' . $this -> cardId . '">
   	  	<img src="/diceandragons/img/' . $this -> cardCat .'/' . $this -> cardPhoto .'" alt="' . $this -> cardName . '" /></a>
   	  	<div class="details">
   	  		<h1>' . $this -> cardName . '</h1>
   	  	</div>
   	  	<div class="price">€' . $this -> cardPrice . '</div>
   	  	</div>';
	}
}


?>