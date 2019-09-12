<?php
session_start();
require_once '../../connection/connect.php';

$individual=$_GET['individual'];
$session=$_SESSION['session'];
$class=$_SESSION['class'];
?>
<br>
<table class="table table-bordered">
  <tr>
    <th>Student ID</th>
    <th width="15%">Name</th>
    <th>Class</th>
    <th>Group</th>
    <th>Roll</th>
    <th>Phone</th>
    <th width='50px'>Image</th>
    <th>View</th>
  </tr>
<?php
//$result_ind=mysqli_query($db,"SELECT * FROM `student` WHERE `student_session`='$session' AND `student_class`='$class' AND `student_id`='$individual'");
$result_ind=mysqli_query($db,"SELECT * FROM `student` WHERE `student_session`='$session' AND `student_class`='$class' AND MATCH(`student_name`,`student_id`,`student_roll`,`student_phone`) AGAINST('$individual');");

while ($row_ind=mysqli_fetch_array($result_ind)) {

  $class_res=mysqli_query($db,"SELECT * FROM class WHERE class_id='".$row_ind['student_class']."'");
  $class_row=mysqli_fetch_array($class_res);

  echo "<tr>";
  echo "<td>".$row_ind['student_id']."</td>";
  echo "<td>".$row_ind['student_name']."</td>";
  echo "<td>".$class_row['class_name']."</td>";
  echo "<td>".$row_ind['student_group']."</td>";
  echo "<td>".$row_ind['student_roll']."</td>";
  echo "<td>".$row_ind['student_phone']."</td>";
  echo "<td><img src='".$row_ind['student_photo']."' width='50px'></td>";
  echo "<td><a href='print/id_individual_pdf.php?id=".$row_ind['student_id']."' target='_blank'>View ID Card</a></td>";
  echo "</tr>";

  // code...
}
?>
</table>
