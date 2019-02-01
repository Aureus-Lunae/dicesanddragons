<?php
  if (!isset($_GET['id'])){
  	header('location: products.php');
  }

  $product_id = $_GET['id'];

  require 'db/connect.php';

	$sql_query = 'SELECT product_name, product_price, product_category, product_photo, product_desc FROM products WHERE product_id = :product_id';

	$productDB = new getDBData($conn, $sql_query);

	$row = $productDB -> getData(array(':product_id'=>$product_id));

	$product = $row->fetch(PDO::FETCH_ASSOC);

	switch ($product['product_category']) {
		case 0:
			$cat = '7dice';
			$showCatDesc = '<div class="text_wrapper"><p>7-Dice sets are the most common dice set in the gaming world,popularized by Dungeons & Dragons. While 7-dice sets are often referred to as D&D dice as a result, there are many RPG games that make use of them.</p></div>';
			break;
		case 1: 
			$cat = '12d6';
			$showCatDesc = '<div class="text_wrapper"><p>While the world of RPGs thrives on many polyhedral dice types, the six-sided dice remain the core dice for many roleplaying and war games. Since dice manufacturers started specializing in gaming dice, they started making 12 d6 sets to give gamers the option to buy the larger quantities of six-sided dice needed for these games. The 12d6 sets use full 16mm dice, the standard dice size of most gaming dice.</p></div>';
			break;
		case 2:
			$cat = '10d10';
			$showCatDesc = '<div class="text_wrapper"><p>As any gamer can tell you, a 10d10 dice set includes 10 ten-sided dice. All of the ten-sided dice are numbered 0-9, and do not include the percentile ten-sided dice. These 10d10 dice sets became big in the 90s with the introduction of White Wolfs World of Darkness series, including Vampire, Werewolf, Mage, Changling, Wraith, and Aberrant. All of the World of Darkness games used a large dice pool of ten-sided dice. As the games grew in popularity dice manufacturers started producing sets of just 10-sided dice, and these 10 d10 sets continue to be popular today.</p></div>';
			break;
		default:
			$cat = '7dice';
			$showCatDesc = '<div class="text_wrapper"><p>7-Dice sets are the most common dice set in the gaming world,popularized by Dungeons & Dragons. While 7-dice sets are often referred to as D&D dice as a result, there are many RPG games that make use of them.</p></div>';
			break;
	}
	$name = $product['product_name'];
	$price = $product['product_price'];
	$photo = $product['product_photo'];
	$desc = $product['product_desc'];

	echo $showCatDesc;
	echo '<div class="product_info">
	 		<h1>' . $name . ' - ' . $cat . '</h1>
	 		 <div class="img_container">
	 		 <div class="product_img" style="background-image: url(/diceandragons/img/' . $cat .'/' . $photo . ')" >
          </div>
        </div>

        <div class="description">
          <p>' . $desc . '</p>

          <div class="shop">
            <div class="price">€' . $price . '</div>
            <div class="add">Add to cart</div>
          </div>
        </div>
      </div>';

?>