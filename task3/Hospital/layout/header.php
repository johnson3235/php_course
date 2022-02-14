<?php
ob_start();
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  *{
    text-transform: capitalize;
  }
</style>
  </head>
  <body>
  <nav class="navbar" style="background-color: #212529;
    color: #11aad3;">
        <a class="navbar-brand" href="<?php echo $title;?>.php">
            <img src="img/clinic.png" width="60" height="60" class="d-inline-block align-top" alt="supermarket_Brand">
            <span style=" color: #11aad3; font-weight:bold;">Hospital</span>
        </a>
    </nav>