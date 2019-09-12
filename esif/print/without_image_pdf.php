<?php
session_start();
require_once "../../connection/connect.php";


include("../../mpdf/mpdf.php");
$mpdf=new mPDF('','A4-L','11','times-new-roman');

$ins_res=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
$ins_row=mysqli_fetch_array($ins_res);

$shift=$_GET['shift'];
$group=$_GET['group'];
$section=$_GET['section'];
$session=$_GET['session'];
$class=$_GET['class'];

$result=mysqli_query($db,"SELECT * FROM student WHERE student_class='$class' AND student_session='$session' AND student_shift='$shift' AND student_section='$section' AND student_group='$group' ORDER BY student_roll");


$html = "<html>
<head>
<style>
body
{
  font-family:times-new-roman;
  line-height: 23px;

}

.logo-div
{
  width: 200px;
  float: left;
  display: inline;
  padding-left:100px;
}
.ins-div
{
  width: 700px;
  text-align: center;
  float: left;
  display: inline;
}
table, tr, th, td
{
  border-collapse: collapse;
}
</style>
</head>";

$html .= "<body>";


$html .= "<div class='logo-div'><img src='../../logo/instituition_logo.jpg' height='100px'></div>";
$html .= "<div class='ins-div'>";
$html .= "<div style='font-family:nikosh; font-size:23px'>".$ins_row['name']."</div>";
$html .= "<div style='font-family:nikosh; font-size:18px'>".$ins_row['address']."</div>";
$html .= "Estd: <b>".date_format(date_create($ins_row['estd']),'m/d/Y')."</b>, EIIN: <b>".$ins_row['eiin']."</b>, Phone: <b>".$ins_row['phone']."</b><br>";
$html .= "Email: <b>".$ins_row['email']."</b>, Web: <b>".$ins_row['web']."</b><br>";
$html .= "</div>";
$html .= "<hr>";

$html .= "<table border='1' width='100%' cellpadding='5'>
  <tr>
    <th>SL</th>
    <th>ID</th>
    <th>Roll</th>
    <th>Name</th>
    <th>Father's Name</th>
    <th>Mother's Name</th>
    <th>Guardian Mobile</th>
  </tr>";
  $count=1;
  while($row=mysqli_fetch_array($result))
  {
    $html .= "<tr>";
    $html .= "<td>".$count."</td>";
    $html .= "<td>".$row['student_id']."</td>";
    $html .= "<td>".$row['student_roll']."</td>";
    $html .= "<td>".$row['student_name']."</td>";
    $html .= "<td>".$row['father_name']."</td>";
    $html .= "<td>".$row['mother_name']."</td>";
    $html .= "<td>".$row['father_phone']."</td>";
    $html .= "</tr>";
    $count++;

  }

  $html .= "</table>";
  $html .= "</body>
  </html>";

$mpdf->SetTitle("Student List");
$mpdf->WriteHTML("$html");
$file="Student_List.pdf";
$mpdf->Output($file, "I");
