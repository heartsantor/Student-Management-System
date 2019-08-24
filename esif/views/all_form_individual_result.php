<?php
session_start();
require_once '../../connection/connect.php';

$individual=$_GET['individual'];
$session=$_SESSION['session'];
$class=$_SESSION['class'];
$result_ind=mysqli_query($db,"SELECT * FROM `student` WHERE `student_session`='$session' AND `student_class`='$class'");
?>
