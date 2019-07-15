<?php
session_start();
if(!$_SESSION['role']){
  header("location:../index.");
}
require_once '../connection/connect.php';
?>
<!DOCTYPE HTML>
<html>
<head>
  <?php include "../bootstrap/bootstrap.html"; ?>
  <title>Student List</title>
  <style>
  th {
    background-color: silver;
  }
  table, th, td, tr {
    border: 1px solid black;
    text-align: center;
    vertical-align: center;
  }
  .container
  {
    font-size: 12px;
  }
  </style>
</head>
<body>
  <?php include "navbar.php"; ?>
  <div class="container">
    <?php
    $class=$_SESSION['class'];
    $session=$_SESSION['session'];
    $criteria=$_GET['criteria'];
    $result=mysqli_query($db,"SELECT * FROM student WHERE student_class='$class' AND student_session='$session'");
    $total_student=$result->num_rows;

    if($criteria=='without_image')
    {
      ?>
      <table class="table table-bordered table-condensed">
        <tr>
          <th>SL</th>
          <th>ID</th>
          <th>Roll</th>
          <th>Name</th>
          <th>Father's Name</th>
          <th>Mother's Name</th>
          <th>Guardian Mobile</th>
        </tr>
        <?php
        $count=1;
        while($row=mysqli_fetch_array($result))
        {
          echo "<tr>";
          echo "<td>".$count."</td>";
          echo "<td><a href='#'>".$row['student_id']."<a></td>";
          echo "<td>".$row['student_roll']."</td>";
          echo "<td>".$row['student_name']."</td>";
          echo "<td>".$row['father_name']."</td>";
          echo "<td>".$row['mother_name']."</td>";
          echo "<td>".$row['father_phone']."</td>";
          echo "</tr>";
          $count++;

        } ?>
      </table>
      <?php
    }

    else if($criteria=='with_image')
    {
      ?>
<table class="table table-bordered">
  <tr>
    <th width="5%">Serial</th>
    <th>ID</th>
    <th>
      Name<br>
      Father's Name<br>
      Mother's Name
    </th>
    <th>
      Shift<br>
      Section<br>
      Roll
    </th>
    <th>
      Date of Birth<br>
      Gender<br>
      Reiligion
    </th>
    <th width='200px'>Subjects</th>
    <th>
      Optional Subject<br>
      Mobile<br>
    </th>
    <th width='80px'>
      Image
    </th>
  </tr>
  <?php
  $count=1;
while($row=mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>".$count."</td>";
  echo "<td>".$row['student_id']."</td>";
  echo "<td>".$row['student_name']."<br>".$row['father_name']."<br>".$row['mother_name']."</td>";
  echo "<td>".$row['student_shift']."<br>".$row['student_section']."<br>".$row['student_roll']."</td>";
  echo "<td>".$row['student_dob']."<br>".$row['student_gender']."<br>".$row['student_religion']."</td>";
  echo "<td>";
  $student_id=$row['student_id'];
  $sub_res=mysqli_query($db,"SELECT * FROM subject_student WHERE subject_student_id='$student_id' AND optional_type2='0' ORDER BY subject_student_code");
  while ($sub_row=mysqli_fetch_array($sub_res)) {
    echo $sub_row['subject_student_code']." ";
    // code...
  }
  echo "</td>";
  echo "<td>";
  $sub_option_res=mysqli_query($db,"SELECT * FROM subject_student WHERE subject_student_id='$student_id' AND optional_type2='1' ORDER BY subject_student_code");
  $sub_option_row=mysqli_fetch_array($sub_option_res);
  echo $sub_option_row['subject_student_code'];
  echo "<br>";
  echo $row['father_phone']."</td>";
  echo "<td style='padding:0px'><img src='".$row['student_photo']."' width='100%'></td>";


}
   ?>
</table>
      <?php
    }
    ?>
  </div>
</body>
</html>
