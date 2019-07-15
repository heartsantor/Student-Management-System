<?php include "connection/connect.php";
session_start();
$student_id='S00001';
$class=$_SESSION['class'];
$session=$_SESSION['session'];
$sub_res=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND religion='0' AND optional_type1='0' AND optional_type2='0' AND elective='0' AND science='0' AND commerce='0' AND arts='0'");

while($sub_row=mysqli_fetch_array($sub_res))
{
    $subject_code=$sub_row['subject_code'];
    mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`class_id`,`session_name`) VALUES ('$student_id','$subject_code','$class','$session')");
}
 ?>
