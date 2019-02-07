<?php

session_start();

if (!isset( $_SESSION['loggedin'] )) {
	$_SESSION['failcount'] = 0;
	$_SESSION['loggedin'] = 0;
}

if (!isset( $_SESSION['cart'] )) {
	$_SESSION['cart'] = new cart();
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
	private $access;
	private $firstName;
	private $lastName;

	public function __construct($user_id, $access, $firstName, $lastName) {
		$this -> user_id = $user_id;	
		$this -> access = $access;
		$this -> firstName = $firstName;
		$this -> lastName = $lastName;
	}

	public function requiredAccess($access) {
		if ($this->access < $access) {
			$root=$_SERVER['HTTP_HOST'];
			$root='http://'.$root.'/diceandragons/';
			header('Location: ' . $root . 'index.php');
		}
	}

	public function changeAddress($conn, $address, $city, $postcode, $country) {
		$updateAddress = $conn -> prepare('UPDATE users SET user_adress = :address, user_city = :city, user_postcode = :postcode, user_country = :country  WHERE user_id = ' . $this -> user_id);
		$updateAddress -> execute(array(':address'=> $address, ':city'=> $city, ':postcode'=> $postcode, ':country'=> $country));
		$_SESSION['success'] = 33;
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
   	  	<div class="price" onclick="addToCart(`' . $this -> cardId . '`,`' . $this -> cardName . '`,`' . $this -> cardPrice . '`,`' . $this -> cardCat . '/' . $this -> cardPhoto . '`,`/diceandragons/php/carthandler.php`, showCart)">€' . number_format($this -> cardPrice, 2, ',', '') . '</div>
   	  	</div>';
	}
}

class cart {
	private $cartproducts;
	private $totalQuanity;
	private $subTotalPrice;

	public function __construct() {
		$this -> cartproducts = array();
		$this -> totalQuantity = 0;
		$this -> subTotalPrice = 0;
	}

	public function addToCart($id, $name, $img, $price, $quantity){
		$productArray = ['id' => $id, 'name' => $name, 'img' => '/img/' . $img, 'price' => $price, 'quantity' => $quantity];
		$isInCart = 0;

		foreach ($this ->cartproducts as $key => $value){
			if ($value['id'] == $productArray['id']){
				if (($productArray['quantity'] + $value['quantity'] > 99)) {
					$this -> cartproducts[$key]['quantity'] = 99;
					$productArray['quantity'] -= $value['quantity'] ;
				} else {
					$this -> cartproducts[$key]['quantity'] += $productArray['quantity'];
				}
				$isInCart = 1;
			}
		}

		$this -> totalQuantity += $productArray['quantity'];
		$this -> subTotalPrice += $productArray['quantity'] * $productArray['price'];
		if ($isInCart == 0){
			$this -> cartproducts[] = $productArray;
		}
		$this -> subTotalPrice = round($this -> subTotalPrice, 2);
	}

	public function removeFromCart($id, $quantity){
		$productArray = ['id' => $id, 'quantity' => $quantity];
		foreach ($this ->cartproducts as $key => $value){
			if ($value['id'] == $productArray['id']){
				$this -> cartproducts[$key]['quantity'] -= $productArray['quantity'];
				$this -> totalQuantity -= $productArray['quantity'];
				$this -> subTotalPrice -= $productArray['quantity'] * $value['price'];

				if ($this -> cartproducts[$key]['quantity'] <= 0) {
					$this -> totalQuantity -= $this -> cartproducts[$key]['quantity'];
					$this -> subTotalPrice -= $this -> cartproducts[$key]['quantity'] * $value['price'];
					unset( $this -> cartproducts[$key] );
				}
				$this -> subTotalPrice = round($this -> subTotalPrice, 2);
			}
		}
	}
	
	public function __get( $property ) {
		return $this->$property;
	}
}
?>