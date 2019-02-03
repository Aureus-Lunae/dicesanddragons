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
  <title>Change Adress</title>
  <link href="https://fonts.googleapis.com/css?family=Laila:400,700|Roboto:400,700"
   rel="stylesheet">
  <link href="/diceandragons/css/style.css" rel="stylesheet" type="text/css"
   media="all" />
</head>

<body>
  <?php require_once('../html/header.php'); ?>

  <div class="content_wrapper">

    <div class="form_wrapper">
      <div class="form_container">
        <div class="left_side">
          <form action="/diceandragons/php/login/changeadresshandler.php" method="POST">
            <h1>Change Address</h1>

            <?php
            if (isset($_SESSION['success'])){
              switch ($_SESSION['success']){
                case 33: 
                  $sussess = 'Address has been updated!';
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

            <label for="address">Street + number:</label>
            <input type="text" id="address" name="address" required>

            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="country">Country:</label>
            <select id="country" name="country" required>
              <?php include '../php/countryoptions.php' ?>
            </select>

            <button type="submit">Change address</button>
            </p>
          </form>
        </div>
        <div class="right-side"></div>
      </div>
    </div>
  </div>

</body>

</html>