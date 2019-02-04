<!DOCTYPE html>

<html lang="en-US">

<?php 
require('../php/classes.php');
$_SESSION['user']->requiredAccess(1);
?>

<head>
  <meta charset="UTF-8" />
  <meta name="description" content=" " />
  <meta name="keywords" content=" " />
  <meta name="author" content="Erwin Korsten" />
  <meta name="viewport" width="device-width" initial-scale="1.0">
  <title>Change email</title>
  <link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700"
   rel="stylesheet">
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
          <form action="/diceandragons/php/login/changeemailhandler.php" method="POST">
            <h1>Change email</h1>

            <?php
            if (isset($_SESSION['success'])){
              switch ($_SESSION['success']){
                case 32: 
                  $sussess = 'Email has been updated!';
                  echo '<label class="success">' . $sussess . '</label>';
                  break;
                default:
                  $_SESSION['error'] = 1;
                  break;
              }
              unset ($_SESSION['success']);
            }            

            if (isset($_SESSION['error'])){
              switch ($_SESSION['error']){
                case 10: 
                  $error = 'Password is incorrect!';
                  break;
                case 31: 
                  $error = 'Email already exist!';
                  break;
                default:
                  $error = 'An unknown error has occured!';
                  break;
              }
              unset ($_SESSION['error']);
              echo '<label class="error">' . $error . '</label>';
            }
            ?>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"
             required>

            <label for="newemail">New email:</label>
            <input type="email" id="newemail" name="newemail" required>

            <button type="submit">Change email</button>
            </p>
          </form>
        </div>
        <div class="right-side"></div>
      </div>
    </div>
  </div>

</body>

</html>