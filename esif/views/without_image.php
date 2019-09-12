<br><a href="print/without_image_pdf.php?shift=<?php echo $shift; ?>&section=<?php echo $section; ?>&group=<?php echo $group;?>&session=<?php echo $session;?>&class=<?php echo $class;?>" target="_blank" class="btn btn-success btn-sm">Print</a><br><br>
<table class="table table-bordered table-condensed">
  <tr>
    <th>SL</th>
    <th>ID</th>
    <th>Roll</th>
    <th>Name</th>
    <th>Father's Name</th>
    <th>Mother's Name</th>
    <th>Guardian Mobile</th>
    <th>Action</th>
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
    echo "<td><a href='edit.php?id=".$row['student_id']."' target='_blank'>Edit</a></td>";
    echo "</tr>";
    $count++;

  } ?>
</table>
