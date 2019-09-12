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
  <title>Student ID Card</title>
  <style>
  th {
    background-color: silver;
  }
  table, th, td, tr {
    border: 1px solid black;
    text-align: center;
    vertical-align: center;
  }
  .container
  {
    font-size: 12px;
  }
  </style>
</head>
<body>
  <?php include "../partials/header.php"; ?>
  <?php include "navbar.php"; ?>
  <div class="container">
    <?php
    $view=$_GET['view'];
    if($view=='individual')
    {
      include "views/id_card_individual.php";
    }
    else if($view=='all')
    {
      include "views/id_card_all.php";
    }

    ?>


  </div>
</div>
<?php mysqli_close($db); ?>
</body>
</html>
