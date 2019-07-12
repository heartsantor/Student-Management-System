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
  <title>ESIF</title>
  <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah')
        .attr('src', e.target.result)
        .width(200)
        .height(200);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<style>

</style>

</head>
<body>
  <?php include "navbar.php"; ?>
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <h5><span style="color:red">*Required Fields</span></h5>
          <label>Student Full Name<span style="color:red">*</span></label>
          <input name="full_name" class="form-control" required>
          <?php
          $result=mysqli_query($db,"SELECT MAX(student_serial) AS total FROM student");
          $row=mysqli_fetch_array($result);
          $student_id=$row['total']+1;
          $student_id=sprintf("%05d", $student_id);
          $student_id="S".$student_id;
          ?>

          <label>Student ID<span style="color:red">*</span></label>
          <input class="form-control" value="<?php echo $student_id;?>" disabled style="width:300px">
          <input type="hidden" name="student_id" class="form-control" value="<?php echo $student_id;?>" style="width:300px">

          <label>Section<span style="color:red">*</span></label>
          <select name="section" class="form-control" required>
            <option value="">--SELECT SECTION--</option>
            <option value="Boys">Boys</option>
            <option value="Girls">Girls</option>
            <option value="Combined">Combined</option>
          </select>

          <label>Class<span style="color:red">*</span></label>
          <input name="class" type="hidden" class="form-control" value="<?php echo $_SESSION['class'];?>">
          <?php
          $class_id=$_SESSION['class'];
          $res=mysqli_query($db,"SELECT * FROM class WHERE class_id='$class_id'");
          $row=mysqli_fetch_array($res);
          $class_name=$row['class_name'];

          ?>

          <input disabled class="form-control" value="<?php echo $class_name;?>">

          <label>Session<span style="color:red">*</span></label>
          <input name="session" type="hidden" class="form-control" value="<?php echo $_SESSION['session'];?>">
          <input class="form-control" value="<?php echo $_SESSION['session'];?>" disabled>

          <label>Shift<span style="color:red">*</span></label>
          <select name="shift" class="form-control" required>
            <option value="">--SELECT SHIFT--</option>
            <option value="Morning">Morning</option>
            <option value="Day">Day</option>
          </select>

          <label>Gender<span style="color:red">*</span></label>
          <select name="gender" class="form-control" required>
            <option value="">--SELECT GENDER--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>

          <label>Religion<span style="color:red">*</span></label>
          <select name="religion" class="form-control" required>
            <option value="">--SELECT RELIGION--</option>
            <option value="islam">Islam</option>
            <option value="hindu">Hindu</option>
            <option value="buddhist">Buddhist</option>
            <option value="christian">Christian</option>
          </select>

          <label>Date of Birth<span style="color:red">*</span></label>
          <input name="date_of_birth" class="form-control" type="date" required>

          <label>Blood Group</label>
          <select name="blood" class="form-control" style="width:300px" required>
            <option value="">-------</option>
            <option value="B +ve">B +ve</option>
            <option value="B +ve">B -ve</option>
            <option value="A +ve">A +ve</option>
            <option value="A -ve">A -ve</option>
            <option value="AB +ve">AB +ve</option>
            <option value="AB -ve">AB -ve</option>
            <option value="O +ve" >O +ve</option>
            <option value="O -ve">O -ve</option>
            <option value="N/A">N/A</option>
          </select>

          <label>Special Needs</label>
          <input name="special_needs" class="form-control">

          <label>Phone</label>
          <input name="phone" class="form-control" required>
        </div>
        <div class="col-sm-6">
          <label>Nationality</label>
          <input class="form-control" value="Bangladeshi" disabled >
          <input name="nationality" type="hidden" class="form-control" value="Bangladeshi">

          <label>NID/BRN</label>
          <input name="nid" class="form-control" required>

          <label>NID Photo</label>
          <input name="nid_photo" type="file" required>


          <label>Present Address</label>
          <textarea name="present_address" class="form-control" required></textarea>

          <label>Parmanent Address</label>
          <textarea name="par_address" class="form-control"></textarea>

          <label>Date of Admission</label>
          <input name="date_of_admission" class="form-control" type="date" required>

          <label>Transport Facility</label>
          <input class="form-control" name="transport">

          <label>Residential Facility</label>
          <input class="form-control" name="residential">

          <label>Student Photo</label>
          <div class="form-group">
            <label class="btn btn-default btn-file">
              <input type="file" style="display: none;" name="student_photo" onchange="readURL(this);" required>
              <img id="blah" src="" alt="Select Student Image"/>
            </label>
          </div>
        </div>
      </div>
      <hr>
      <h4>Subject List</h4>
      <div class="row">
        <div class="col-sm-6">
          <?php
          $sub_res=mysqli_query($db,"SELECT * FROM subject WHERE class_id='".$_SESSION['class']."' AND religion='0'");
          while($sub_row=mysqli_fetch_array($sub_res))
          {
            echo "<input type='text' disabled class='form-control' value='".$sub_row['subject_name']." (".$sub_row['subject_code'].")'>";
          } ?>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <h3>Father's Information</h3>
          <label>Father's Name</label>
          <input name="father"   class="form-control">

          <label>Mobile</label>
          <input name="father_mobile"   class="form-control">

          <label>Father's NID</label>
          <input name="father_nid" class="form-control">

          <label>NID Photo</label>
          <input type="file" name="father_nid_photo" value="Upload NID Photo">

          <label>Occupation</label>
          <input name="father_occupation"   class="form-control">

          <label>Monthly Income</label>
          <input name="father_income"   class="form-control">

          <label>Office Address</label>
          <textarea name="father_office_address" class="form-control"></textarea>

          <label>Father's Photo</label>
          <input type="file" name="father_photo" value="Upload NID Photo">
        </div>
        <div class="col-sm-6">
          <h3>Mother's Information</h3>
          <label>Mother's Name</label>
          <input name="mother"   class="form-control">
          <label>Mobile</label>
          <input name="mother_mobile"   class="form-control">
          <label>Mother's NID</label>
          <input name="mother_nid" class="form-control">

          <label>NID Photo</label>
          <input type="file" name="mother_nid_photo" value="Upload NID Photo">

          <label>Occupation</label>
          <input name="mother_occupation"   class="form-control">
          <label>Monthly Income</label>
          <input name="mother_income"   class="form-control">
          <label>Office Address</label>
          <textarea name="mother_office_address" class="form-control"></textarea>
          <label>Mother's Photo</label>
          <input type="file" name="mother_photo" value="Upload NID Photo">
        </div>
      </div>
      <br>
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
      <hr>
    </form>
  </div>
  <br>
  <br>
</body>

</html>
