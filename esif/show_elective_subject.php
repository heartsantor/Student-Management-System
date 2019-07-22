<?php
session_start();
require_once '../connection/connect.php';
if(isset($_GET['group'])){
  $group=$_GET['group'];
  $class=$_SESSION['class'];
  if($group=='Science')
  {
    $res_elective=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND elective='1' AND science='1'");
    while($row_elective=mysqli_fetch_array($res_elective))
    {
      echo "<input type='text' disabled class='form-control' value='".$row_elective['subject_name']." (".$row_elective['subject_code'].")'>";
    }
  }
  else if($group=='Commerce')
  {
    $res_elective=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND elective='1' AND commerce='1'");
    while($row_elective=mysqli_fetch_array($res_elective))
    {
      echo "<input type='text' disabled class='form-control' value='".$row_elective['subject_name']." (".$row_elective['subject_code'].")'>";
    }
  }
}
?>
<label>Optional</label>
<select name="optional_type2" onchange="make_elective(this.value)" class="form-control" required>
  <option value="">--SELECT OPTIONAL--</option>
  <?php
  if($group=='Science')
  {
    $res_optional=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND optional_type2='1' AND science='1'");
    while($row_optional=mysqli_fetch_array($res_optional))
    {
      echo "<option value='".$row_optional['subject_code']."'>".$row_optional['subject_name']."   (".$row_optional['subject_code'].")</option>";
    }
  }
  ?>
</select>
<div id="show_compulsory"></div>
