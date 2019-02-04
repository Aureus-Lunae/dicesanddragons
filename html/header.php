<header class="headerwrapper">
	<div class="logo">
		<img src="/diceandragons/img/logo.png" alt="Dices and dragons" />
	</div>
	<div class="navbarheader">
		<ul class="menu">
      <?php 
        if ($_SESSION['loggedin'] == 0) {
				echo '<li><a href="/diceandragons/ucp/login.php">Login</a></li>';
				} else { 
				echo '<li class="userbutton"><a href="#">' . $_SESSION['user']->username . '</a>
					<div class="dropdown_user">
						<a href="/diceandragons/ucp/changepassword.php">Change Password</a>
						<a href="/diceandragons/ucp/changeemail.php">Change Email</a>
						<a href="/diceandragons/ucp/changeaddress.php">Change address</a>';
						if ($_SESSION['user']->access > 1) {
							echo '<a href="/diceandragons/scp/addproduct.php">Add Products</a>';
						}
					echo '</li>';
				echo '<li><a href="/diceandragons/php/login/logout.php">Log out</a></li>';
        }
      ?>
		</ul>
	</div>
	<div class="navbar2">
		<div class="menu">
			<a href="/diceandragons/"><i class="fas fa-home"></i> Home</a>
			<a href="/diceandragons/products.php"><i class="fas fa-dice-d20"></i> dice</a>
		</div>
		<div class="cart">
			<a href="/diceandragons/cart.php"><i class="fas fa-shopping-cart"></i> <span id="cartqnt"><?php echo $_SESSION['cart'] -> totalQuanity; ?></span></a>
		</div>
	</div>
</header>
