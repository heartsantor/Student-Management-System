<?php
session_start();
if(!$_SESSION['role']){
    header("location:login");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
       <?php include "../bootstrap/bootstrap.html"; ?>
        
    </head>
    <body>
      <?php include "navbar.php"; ?>
       
        
    </body>
</html>