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
				echo '<li><a href="#">' . $_SESSION['user']->showUsername() . '</a></li>';
				echo '<li><a href="/diceandragons/php/login/logout.php">Log out</a></li>';
        }
      ?>
		</ul>
	</div>
</header>
