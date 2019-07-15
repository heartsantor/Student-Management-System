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
