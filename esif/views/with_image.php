<br><a href="print/with_image_pdf.php?shift=<?php echo $shift; ?>&section=<?php echo $section; ?>&group=<?php echo $group;?>&session=<?php echo $session;?>&class=<?php echo $class;?>" target="_blank" class="btn btn-success btn-sm">Print</a><br><br>
<table class="table table-bordered table-condensed">
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
    <th>
      Actions
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
  $sub_res=mysqli_query($db,"SELECT * FROM subject_student WHERE subject_student_id='$student_id' AND optional_type2='0' AND class_id='$class' AND session_name='$session' ORDER BY subject_student_code");
  while ($sub_row=mysqli_fetch_array($sub_res)) {
    echo $sub_row['subject_student_code']." ";
    // code...
  }
  echo "</td>";
  echo "<td>";
  $sub_option_res=mysqli_query($db,"SELECT * FROM subject_student WHERE subject_student_id='$student_id' AND optional_type2='1' AND class_id='$class' AND session_name='$session' ORDER BY subject_student_code");
  $sub_option_row=mysqli_fetch_array($sub_option_res);
  echo $sub_option_row['subject_student_code'];
  echo "<br>";
  echo $row['student_phone']."</td>";
  echo "<td style='padding:0px'><img src='".$row['student_photo']."' width='100%'></td>";
  echo "<td><a href='edit.php?id=".$student_id."'>Edit</a></td>";


}
   ?>
</table>
