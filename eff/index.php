<?php
session_start();
if(!$_SESSION['role']){
    header("location:../index.php");
}
require_once '../connection/connect.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
       <?php include "../bootstrap/bootstrap.html"; ?>

    </head>
    <body>
      <?php include "../partials/header.php"; ?>
      <?php include "navbar.php"; ?>
      <div class="container">
      <h1>This is the EFF Homepage</h1>
       </div>
    </body>
</html>
