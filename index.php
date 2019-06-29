<?php
session_start();
if(!$_SESSION['role']){
    header("location:login");
}
$category=$_SESSION['category'];
if($category=="eff") header("location:eff");
if($category=="esif") header("location:esif");
