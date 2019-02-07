<header class="headerwrapper">
	<div class="navbarheader">
		<ul class="menu">
			<li><a href="/diceandragons/"><i class="fas fa-home"></i> Home</a></li>
			<li><a href="/diceandragons/products.php"><i class="fas fa-dice-d20"></i> Dice</a></li>
		</ul>
	</div>

	<div class="logo">
		Dice <i class="fas fa-dice-d20"></i> Dragons
	</div>

	<div class="navbarheader">
		<ul class="menu">
      <?php 
        if ($_SESSION['loggedin'] == 0) {
				echo '<li><a href="/diceandragons/ucp/login.php"><i class="fas fa-user"></i> Login</a></li>';
				} else { 
				echo '<li class="userbutton"><i class="fas fa-user"></i> ' . $_SESSION['user']->firstName . '
					<div class="dropdown_user">
						<a href="/diceandragons/ucp/changepassword.php">Change Password</a>
						<a href="/diceandragons/ucp/changeemail.php">Change Email</a>
						<a href="/diceandragons/ucp/changeaddress.php">Change address</a>
						<a href="/diceandragons/php/login/logout.php">Log out</a>';
						if ($_SESSION['user']->access > 1) {
							echo '<a href="/diceandragons/scp/addproduct.php">Add Products</a>
								<a href="/diceandragons/scp/listproducts.php">List Products</a>';
						}
					echo '</li>';
        }
        echo '<li><a href="/diceandragons/cart.php"><i class="fas fa-shopping-cart"></i> <span id="cartqnt">' . $_SESSION['cart'] -> totalQuantity . '</span></a></li>';
      ?>
		</ul>
	</div>
</header>