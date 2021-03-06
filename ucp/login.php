<!DOCTYPE html>

<html lang="en-US">

<?php 
require('../php/classes.php');
?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700" rel="stylesheet">
  <link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css"
   media="all" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
  <?php require_once('../html/header.php'); ?>

  <div class="content_wrapper">

    <div class="form_wrapper">
      <div class="form_container">
        <div class="left_side">
          <?php 
          if ($_SESSION['loggedin'] == 0) {
        ?>
          <form action="/diceandragons/php/login/loginhandler.php" method="POST">
     
             <?php
                if (isset($_SESSION['success'])){
                  switch ($_SESSION['success']){
                    case 35: 
                      $sussess = 'Account has been created!';
                      echo '<label class="success">' . $sussess . '</label>';
                      break;
                    default:
                      $_SESSION['error'] = 1;
                      break;
                  }
                  unset ($_SESSION['success']);
                }
            ?>
            
            <h1>Login</h1>

            <label for="email">email:</label>
            <input type="email" id="email" name="email" maxlength="50">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <?php 
              if ($_SESSION['failcount'] >0) {
                if ($_SESSION['failcount'] > 4) {
                  echo '<div class="error">Max attempts reached.</div>'; 
                } else {
                  $attemptsRemaining = 5 - $_SESSION['failcount'];
                  echo '<div class="error">Username of Password is incorrect! You have '. $attemptsRemaining . ' attempts remaining</div>'; 
                }  
              }
            ?>

            <button type="submit">Login</button>

            <p>Don't have an account? <a href="register.php">Register now</a></p>
          </form>
          <?php 
          } else {
        ?>
          <p>You have already been logged in!</p>
          <?php 
          }
        ?>

        </div>
        <div class="right-side"></div>
      </div>
    </div>
  </div>
</body>

</html>
