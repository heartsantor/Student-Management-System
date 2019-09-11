<?php
session_start();
//require_once "../../dompdf/autoload.inc.php";
require_once "../../connection/connect.php";
//include "partials/bootstrap.html";
$id=$_GET['id'];
$result=mysqli_query($db,"SELECT * FROM student WHERE student_id='$id'");
$row=mysqli_fetch_array($result);

$ins_res=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
$ins_row=mysqli_fetch_array($ins_res);


include("../../mpdf/mpdf.php");
$mpdf=new mPDF('','A4','10','times-new-roman');


$html = "<html>
<head>
  <style>
  body
  {
    font-family:times-new-roman;

  }
  .field-name
  {
    width: 150px;
    float: left;
    display: inline;
  }
  .field-value
  {
    float: left;
    width: 400px;
    display: inline;
  }
  .images
  {
    float: right;
  }
  .logo-div
  {
    width: 100px;
    float: left;
    display: inline;
  }
  .ins-div
  {
    text-align: center;
    float: left;
    display: inline;
  }
  </style>
</head>";
$html .= "<body>";
$html .= "<div class='logo-div'><img src='../../logo/instituition_logo.jpg' width='100px'></div>";
$html .= "<div class='ins-div'>";
$html .= "<div style='font-family:nikosh; font-size:23px'><b>".$ins_row['name']."</b></div>";
$html .= "<div style='font-family:nikosh; font-size:18px'>".$ins_row['address']."</div>";
$html .= "Estd: <b>".date_format(date_create($ins_row['estd']),'m/d/Y')."</b>, EIIN: <b>".$ins_row['eiin']."</b>, Phone: <b>".$ins_row['phone']."</b><br>";
$html .= "Email: <b>".$ins_row['email']."</b>, Web: <b>".$ins_row['web']."</b><br>";
$html .= "</div>";


$html .= "
  <hr>
  <span style='font-size: 18px'><b>Personal Information</b></span>
  <hr>
  <div class='field-name'>
    <b>Name</b>   <br>
    ID    <br>
    Roll  <br>
  </div>
  <div class='field-value'>
    : <b>".$row['student_name']."</b><br>
    : ".$row['student_id']."<br>
    : ".$row['student_roll']."<br>
  </div>";

  $html .= "<div class='images'>
    <img src='../".$row['student_photo']."'><br><br>";
if(file_exists("../".$row['father_photo']))
{
    $html .="<img src='../".$row['father_photo']."'><br><br>";
}
else {
      $html .="<img src='../../unisex-avatar.png'><br><br>";
}

if(file_exists("../".$row['mother_photo']))
{
    $html .="<img src='../".$row['mother_photo']."'><br><br>";
}
else {
    $html .="<img src='../../unisex-avatar.png'><br><br>";
}

$html .= "</div>
</body>
</html>";
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
