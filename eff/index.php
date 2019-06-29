<?php
session_start();
if(!$_SESSION['role']){
    header("location:login");
}

echo "This is Exam and Result";