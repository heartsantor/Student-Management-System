<?php
session_start();
//require_once "../../dompdf/autoload.inc.php";
require_once "../../connection/connect.php";
//include "partials/bootstrap.html";


//Reference the Dompdf namespace
//use Dompdf\Dompdf;

//Instantiate dompdf class
//$dompdf = new Dompdf();

//Load HTML content
//$dompdf->loadHtml("<h1>Welcome to CodexWorld.com</h1>");

//Load content from HTML file
//$html = file_get_contents("pdf-content.php");

include("../../mpdf/mpdf.php");
//$mpdf=new mPDF('','A4');
$mpdf = new mPDF('',    // mode - default ''
 'A4',    // format - A4, for example, default ''
 0,     // font size - default 0
 '',    // default font family
 15,    // margin_left
 15,    // margin right
 16,     // margin top
 16,    // margin bottom
 9,     // margin header
 9,     // margin footer
 'L'); 


$shift=$_GET['shift'];
$section=$_GET['section'];
$group=$_GET['group'];
$class=$_SESSION['class'];
$session=$_SESSION['session'];

$ins_res=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
$ins_row=mysqli_fetch_array($ins_res);

$class_res=mysqli_query($db,"SELECT * FROM class WHERE class_id='$class'");
$class_row=mysqli_fetch_array($class_res);

$result=mysqli_query($db,"SELECT * FROM student WHERE student_class='$class' AND student_session='$session' AND student_shift='$shift' AND student_section='$section' AND student_group='$group'");
$total_student=$result->num_rows;

$html = '';
$html .= "<html><head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
<style>
body {
  font-family: Times New Roman;
  font-size: 10px;
}
th {
  background-color: #b2beb5;
  padding: 5px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 2px;
  width: 100%;
  font-size: 10px;
}
@page { margin: 0.5in ;}
</style>
</head>";
$html .= "<body>";



$html .= "<center>";
$html .= "<h3 style='font-family:nikosh'><b>".$ins_row['name']."</b></h3>";
$html .= $ins_row['address']."<br>";
$html .= "Estd: <b>".date_format(date_create($ins_row['estd']),'m/d/Y')."</b>, EIIN: <b>".$ins_row['eiin']."</b>, Phone: <b>".$ins_row['phone']."</b><br>";
$html .= "Email: <b>".$ins_row['email']."</b>, Web: <b>".$ins_row['web']."</b><br>";
$html .= "</center>";
$html .= "<center>Student Profile of <b>".date('d F, Y')."</b>";
$html .= "<center>Session: <b>".$session."</b>, Class: <b>".$class_row['class_name']."</b>,  Section: <b>".$section."</b>, ";
$html .= "Group: <b>".$group."</b>, Student: <b>".$total_student."</b></center>";

$html .="<table>
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
  $html .= "<td><a href='#'>".$row['student_id']."<a></td>";
  $html .= "<td>".$row['student_roll']."</td>";
  $html .= "<td>".$row['student_name']."</td>";
  $html .= "<td>".$row['father_name']."</td>";
  $html .= "<td>".$row['mother_name']."</td>";
  $html .= "<td>".$row['father_phone']."</td>";
  $html .= "</tr>";
  $count++;

}
$html .= "</table><body><html>";

//$dompdf->loadHtml($html);

//Setup paper size
//$dompdf->setPaper('A4', 'landscape');

//Render the HTML as PDF
//$dompdf->render();

//Output the generated PDF
//$dompdf->stream("Student_list", array("Attachment" => 0));


$mpdf->WriteHTML("$html");
$mpdf->Output('');

?>
