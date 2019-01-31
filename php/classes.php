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