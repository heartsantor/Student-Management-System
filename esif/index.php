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
        
    </head>
    <body>
      <?php include "navbar.php"; ?>
      <div class="container">
      <h1>This is the ESIF Homepage</h1>
       </div> 
    </body>
</html>