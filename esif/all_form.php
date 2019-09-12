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
  <title>Student List</title>
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
  @media print {
    .myDivToPrint {
      size: A4;
      margin: 0;
      background-color: white;
      height: 100%;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      margin: 0;
      padding: 15px;
      font-size: 14px;
      line-height: 18px;
    }
    .noPrint {
      visibility: hidden;
    }
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
      include "views/all_form_individual.php";
    }
    else if($view=='all')
    {
      include "views/all_form_all.php";
    }

    ?>


  </div>
</div>
<?php mysqli_close($db); ?>
</body>
</html>
