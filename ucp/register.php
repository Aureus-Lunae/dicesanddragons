<!DOCTYPE html>

<html lang="en-US">

<?php require_once('../php/classes.php'); ?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <title> </title>
	<link href="https://fonts.googleapis.com/css?family=Laila|Roboto" rel="stylesheet">
	<link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
	<?php require_once('../html/header.php'); ?>

	<div class="content_wrapper">

    <div class="form_wrapper">
      <div class="form_container">
        <div class="left_side"></div>
        <div class="right_side">

          <form action="/diceandragons/php/login/loginhandler.php" method="POST">
            <h1>Register</h1>

            <label for="firstname">First Name*:</label>
            <input type="text" id="firstname" name="firstname" maxlength="32"autofocus>
            <label for="lastname">Last Name*:</label>
            <input type="text" id="lastname" name="lastname" maxlength="32">

            <label for="email">email*:</label>
            <input type="email" id="email" name="email" maxlength="50">

            <label for="password">Password*:</label>
            <input type="password" id="password" name="password" minlength="8">
            <label for="repeat_password">Repeat password*:</label>
            <input type="password" id="repeat_password" name="repeat_password">

            <label for="adress">Adress*:</label>
            <input type="text" id="adress" name="adress" maxlength="20">
            <label for="postcode">Post code*:</label>
            <input type="text" id="postcode" name="postcode" maxlength="8">
            <label for="city">City*:</label>
            <input type="text" id="city" name="city" maxlength="20">
            <label for="Country">County*:</label>
            <input type="text" id="country" name="country" maxlength="40">

            <input type="checkbox" name="tos" value="tos" class="tos" required>
            <label for="tos" class="tos">I have read and agreed to the Terms of Service.</label><br />
            
            <button type="submit">Register</button>
            
          </form>
        </div>
      </div>
    </div>

	</div>

</body>

</html>