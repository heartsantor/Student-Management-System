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
    <th width="80%">Name</th>
    <th>Student ID</th>
  </tr>
<?php
//$result_ind=mysqli_query($db,"SELECT * FROM `student` WHERE `student_session`='$session' AND `student_class`='$class' AND `student_id`='$individual'");
$result_ind=mysqli_query($db,"SELECT * FROM `student` WHERE `student_session`='$session' AND `student_class`='$class' AND MATCH(`student_name`,`student_id`,`student_roll`,`student_phone`) AGAINST('$individual');");

while ($row_ind=mysqli_fetch_array($result_ind)) {
  echo "<tr>";
  echo "<td>".$row_ind['student_name']."</td>";
  echo "<td><a href='print/all_form_individual_pdf.php?id=".$row_ind['student_id']."' target='_blank'>".$row_ind['student_id']."</a></td>";
  echo "</tr>";

  // code...
}
?>
</table>
