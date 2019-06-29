<?php
session_start();
if(!$_SESSION['role']){
    header("location:login");
}

                   echo $_SESSION['role']."<br>";
                  echo  $_SESSION['id']."<br>";
                  echo  $_SESSION['active']."<br>";
                  echo  $_SESSION['class']."<br>";
                  echo  $_SESSION['session']."<br>";
                  echo  $_SESSION['category'];