<?php
session_start();

require_once "../../connection/connect.php";

$id=$_GET['id'];
$result=mysqli_query($db,"SELECT * FROM student WHERE student_id='$id'");
//$result=mysqli_query($db,"SELECT * FROM student WHERE 1");


$ins_res=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
$ins_row=mysqli_fetch_array($ins_res);


include("../../mpdf/mpdf.php");
$mpdf=new mPDF('','A4','8','times-new-roman');


$html = "<html>
<head>
<style>
.id-card {
  width:2in;
  height: 3in;
  float: left;
  display: inline;
  align: center;
  text-align: center;
  padding-left: 10px;

}
.rotate-ins
{
 color:white;
 background-color:#3498DB;
 height:25px;
 line-height: 25px;
}
img
{
  padding: 5px;
}
.sig
{
  padding-top:20px;
  padding-right:5px;
  text-align: right;
  padding-bottom: 5px;
}

</style>
</head>";

$html .= "<body>";
$count=0;
while($row=mysqli_fetch_array($result))
{
  $class_res=mysqli_query($db,"SELECT * FROM class WHERE class_id='".$row['student_class']."'");
  $class_row=mysqli_fetch_array($class_res);
    $html .= "<div class='id-card'>";
    $html .= "<div style='font-family:nikosh; font-size:19px' class='rotate-ins'>".$ins_row['name']."</div>";
    $html .= "<img src='../../logo/instituition_logo.jpg' height='50px'><br>";
    $html .= "<img src='../".$row['student_photo']."' height='70px'>";
    $html .= "<br><b>".$row['student_name'];
    $html .= "<br>ID: ".$row['student_id'].", Class: ".$class_row['class_name'];
    $html .= "<br>Roll: ".$row['student_roll'].", Group: ".$row['student_group']."</b>";
    $html .= "<br>";
    $html .= "<div class='sig'>";
    $html .= "________<br>";
    $html .= "Chairman";
    $html .= "</div>";
    $html .= "<div style='font-size:12px' class='rotate-ins'>INDENTITY CARD: ".$row['student_session']."</div>";
    $html .= "</div>";
}


$mpdf->SetTitle("Student ID ".$id);
$mpdf->WriteHTML("$html");
$file="Student_ID_".$id.".pdf";
$mpdf->Output($file, "I");

?>
