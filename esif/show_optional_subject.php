<?php
session_start();
require_once '../connection/connect.php';
if(isset($_GET['group'])){
  $group=$_GET['group'];
  $selected=$_GET['code'];
  $class=$_SESSION['class'];
  ?>
<label>Optional</label>
<select name="compulsory_sub" class="form-control">
  <?php
  if($group=='Science')
  {
    $res_compulsory=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND optional_type2='1' AND science='1'");
    if($res_compulsory->num_rows>2)
    {
      echo "<option value=''>--SELECT COMPULSORY--</option>";
    }
    while($row_compulsory=mysqli_fetch_array($res_compulsory))
    {
      if($selected==$row_compulsory['subject_code']) continue;
      echo "<option value='".$row_compulsory['subject_code']."'>".$row_compulsory['subject_name']."   (".$row_compulsory['subject_code'].")</option>";
    }
  }
  else if($group=='Commerce')
  {
    $res_compulsory=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND optional_type2='1' AND commerce='1'");
    if($res_compulsory->num_rows>2)
    {
      echo "<option value=''>--SELECT COMPULSORY--</option>";
    }
    while($row_compulsory=mysqli_fetch_array($res_compulsory))
    {
      if($selected==$row_compulsory['subject_code']) continue;
      echo "<option value='".$row_compulsory['subject_code']."'>".$row_compulsory['subject_name']."   (".$row_compulsory['subject_code'].")</option>";
    }
  }

  else if($group=='Arts')
  {
    $res_compulsory=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND optional_type2='1' AND arts='1'");
    if($res_compulsory->num_rows>2)
    {
      echo "<option value=''>--SELECT COMPULSORY--</option>";
    }
    while($row_compulsory=mysqli_fetch_array($res_compulsory))
    {
      if($selected==$row_compulsory['subject_code']) continue;
      echo "<option value='".$row_compulsory['subject_code']."'>".$row_compulsory['subject_name']."   (".$row_compulsory['subject_code'].")</option>";
    }
  }
}
?>
</select>
