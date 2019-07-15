<?php
session_start();
if(!$_SESSION['role']){
  header("location:../index.");
}
require_once '../connection/connect.php';
?>
<!DOCTYPE HTML>
<html>
<head>
  <?php include "../bootstrap/bootstrap.html"; ?>
  <title>Student List</title>
</head>
<body>
  <?php include "navbar.php"; ?>
  <div class="container">
</body>
</html>
