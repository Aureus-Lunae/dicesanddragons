<header class="headerwrapper">
	<div class="logo">
		<img src="/diceandragons/img/logo.png" alt="Dices and dragons" />
	</div>
	<div class=navbar>
		<ul class="menu">
			<li><a href="/diceandragons/">Home</a></li>
			<li><a href="/diceandragons/products.php">Products</a></li>
      <?php 
        if ($_SESSION['loggedin'] == 0) {
				echo '<li><a href="/diceandragons/ucp/login.php">Login</a></li>';
				} else { 
				echo '<li class="userbutton"><a href="#">' . $_SESSION['user']->username . '</a>
					<div class="dropdown_user">
						<a href="/diceandragons/ucp/changepassword.php">Change Password</a>
						<a href="/diceandragons/ucp/changeemail.php">Change Email</a>';
						if ($_SESSION['user']->access > 1) {
							echo '<a href="/diceandragons/scp/addproduct.php">Add Products</a>';
						}
					echo '</li>';
				echo '<li><a href="/diceandragons/php/login/logout.php">Log out</a></li>';
        }
      ?>
		</ul>
	</div>
</header>
