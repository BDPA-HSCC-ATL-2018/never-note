<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/never-note/lib/db.php';
  session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../web-assets/css/bootstrap.min.css">

  <title><?php echo $page_title ?></title>
</head>
<body>
  <?php include_once "app_nav.php"; ?>
  <div class="container">
    <br>
