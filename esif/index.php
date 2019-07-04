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
    <?php
    if(isset($_POST['submit']))
    {

      $student_id=$_POST['student_id'];
      $student_name=mysqli_real_escape_string($db,$_POST['full_name']);
      $section=$_POST['section'];
      $class=$_POST['class'];
      $session=$_POST['session'];
      $shift=$_POST['shift'];
      $gender=$_POST['gender'];
      $dob=$_POST['date_of_birth'];
      $blood_group=$_POST['blood'];
      $special_need=mysqli_real_escape_string($db,$_POST['special_needs']);
      $student_nid=mysqli_real_escape_string($db,$_POST['nid']);
      $nationality=$_POST['nationality'];
      $phone=mysqli_real_escape_string($db,$_POST['phone']);
      $present_address=mysqli_real_escape_string($db,$_POST['present_address']);
      $parm_address=mysqli_real_escape_string($db,$_POST['par_address']);
      $date_of_admission=$_POST['date_of_admission'];
      $transport=mysqli_real_escape_string($db,$_POST['transport']);
      $residential=mysqli_real_escape_string($db,$_POST['residential']);
      $student_photo="";
      $studet_nid_photo="";

      $father_name=mysqli_real_escape_string($db,$_POST['father']);
      $father_phone=mysqli_real_escape_string($db,$_POST['father_mobile']);
      $father_nid=mysqli_real_escape_string($db,$_POST['father_nid']);
      $father_occupation=mysqli_real_escape_string($db,$_POST['father_occupation']);
      $father_income=mysqli_real_escape_string($db,$_POST['father_income']);
      $father_office=mysqli_real_escape_string($db,$_POST['father_office_address']);
      $father_photo="";
      $father_nid_photo="";

      $mother_name=mysqli_real_escape_string($db,$_POST['mother']);
      $mother_phone=mysqli_real_escape_string($db,$_POST['mother_mobile']);
      $mother_nid=mysqli_real_escape_string($db,$_POST['mother_nid']);
      $mother_occupation=mysqli_real_escape_string($db,$_POST['mother_occupation']);
      $mother_income=mysqli_real_escape_string($db,$_POST['mother_income']);
      $mother_office=mysqli_real_escape_string($db,$_POST['mother_office_address']);
      $mother_photo="";
      $mother_nid_photo="";


      $success = false;
      if(isset($_FILES['student_photo']['name']) && @$_FILES['student_photo']['name'] != "") {
        if($_FILES['student_photo']['error'] > 0) {
          echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
        } else {
          if($_FILES['student_photo']['size'] / 1024 <= 5120) { // 5MB
            if($_FILES['student_photo']['type'] == 'image/jpeg' ||
            $_FILES['student_photo']['type'] == 'image/pjpeg' ||
            $_FILES['student_photo']['type'] == 'image/png' ||
            $_FILES['student_photo']['type'] == 'image/gif'){

              $source_file = $_FILES['student_photo']['tmp_name'];

              $width      = 300;
              $height     = 300;
              $quality    = 80;

              $file = $_FILES['student_photo']['name'];
              $ref=$student_id;
              $file=explode(".",$file);
              $file=$ref.".".end($file);
              $target_dir= "../student_photo/";
              $target_file= $target_dir.$file;

              //move_uploaded_file($_FILES['user_signature']['tmp_name'], $target_file);
              $student_photo = $target_file;

              $success = compress_image($source_file, $target_file, $width, $height, $quality);

            }
          } else {
            echo '<h4>Image should be maximun 5MB in size!</h4>';
          }
        }
      }

      if(isset($_FILES['nid_photo']['name']) && @$_FILES['nid_photo']['name'] != "") {
        if($_FILES['nid_photo']['error'] > 0) {
          echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
        } else {
          if($_FILES['nid_photo']['size'] / 1024 <= 5120) { // 5MB
            if($_FILES['nid_photo']['type'] == 'image/jpeg' ||
            $_FILES['nid_photo']['type'] == 'image/pjpeg' ||
            $_FILES['nid_photo']['type'] == 'image/png' ||
            $_FILES['nid_photo']['type'] == 'image/gif'){

              $source_file = $_FILES['nid_photo']['tmp_name'];

              $width      = 600;
              $height     = 300;
              $quality    = 80;

              $file = $_FILES['nid_photo']['name'];
              $ref="nid-".$student_id;
              $file=explode(".",$file);
              $file=$ref.".".end($file);
              $target_dir= "../nid_photo/";
              $target_file= $target_dir.$file;

              //move_uploaded_file($_FILES['user_signature']['tmp_name'], $target_file);
              $student_nid_photo = $target_file;

              $success = compress_image($source_file, $target_file, $width, $height, $quality);

            }
          } else {
            echo '<h4>Image should be maximun 5MB in size!</h4>';
          }
        }
      }
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-sm-6">
          <h5><span style="color:red">*Required Fields</span></h5>
          <label>Student Full Name<span style="color:red">*</span></label>
          <input name="full_name" class="form-control" required="required">
          <?php
          $result=mysqli_query($db,"SELECT COUNT(*) AS total FROM student");
          $row=mysqli_fetch_array($result);
          $student_id=$row['total']+1;
          $student_id=sprintf("%05d", $student_id);
          $student_id="S".$student_id;
          ?>

          <label>Student ID<span style="color:red">*</span></label>
          <input name="student_id" class="form-control" value="<?php echo $student_id;?>" disabled style="width">

          <label>Section<span style="color:red">*</span></label>
          <select name="section" class="form-control" required>
            <option value="">--SELECT SECTION--</option>
            <option value="Boys">Boys</option>
            <option value="Girls">Girls</option>
            <option value="Combined">Combined</option>
          </select>

          <label>Class<span style="color:red">*</span></label>
          <input name="class" disabled class="form-control" value="<?php echo $_SESSION['class'];?>">

          <label>Session<span style="color:red">*</span></label>
          <input name="session" class="form-control" value="<?php echo $_SESSION['session'];?>" disabled>

          <label>Shift<span style="color:red">*</span></label>
          <select name="shift" class="form-control" required>
            <option value="">--SELECT SHIFT--</option>
            <option value="Morning">Morning</option>
            <option value="Day">Day</option>
          </select>

          <label>Gender<span style="color:red">*</span></label>
          <select name="shift" class="form-control" required>
            <option value="">--SELECT GENDER--</option>
            <option value="Morning">Male</option>
            <option value="Day">Female</option>
          </select>

          <label>Date of Birth<span style="color:red">*</span></label>
          <input name="date_of_birth" class="form-control" type="date" required>

          <label>Blood Group</label>
          <select name="blood" class="form-control" style="width:300px" required="required">
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
          <input name="nationality" class="form-control" value="Bangladeshi" disabled required>

          <label>NID/BRN</label>
          <input name="nid" class="form-control" required>

          <label>NID Photo</label>
          <input name="nid_photo" type="file">


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
      <div class="row">
        <div class="col-sm-6">
          <h3>Father's Information</h3>
          <label>Father's Name</label>
          <input name="father" required class="form-control">

          <label>Mobile</label>
          <input name="father_mobile" required class="form-control">

          <label>Father's NID</label>
          <input name="father_nid" class="form-control">

          <label>NID Photo</label>
          <input type="file" name="father_nid_photo" value="Upload NID Photo">

          <label>Occupation</label>
          <input name="father_occupation" required class="form-control">

          <label>Monthly Income</label>
          <input name="father_income" required class="form-control">

          <label>Office Address</label>
          <textarea name="father_office_address" class="form-control"></textarea>
        </div>
        <div class="col-sm-6">
          <h3>Mother's Information</h3>
          <label>Mother's Name</label>
          <input name="mother" required class="form-control">
          <label>Mobile</label>
          <input name="mother_mobile" required class="form-control">
          <label>Mother's NID</label>
          <input name="mother_nid" class="form-control">

          <label>NID Photo</label>
          <input type="file" name="mother_nid_photo" value="Upload NID Photo">

          <label>Occupation</label>
          <input name="mother_occupation" required class="form-control">
          <label>Monthly Income</label>
          <input name="mother_income" required class="form-control">
          <label>Office Address</label>
          <textarea name="mother_office_address" class="form-control"></textarea>
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
<?php
function compress_image($source_file, $target_file, $nwidth, $nheight, $quality) {
  //Return an array consisting of image type, height, widh and mime type.
  $image_info = getimagesize($source_file);
  if(!($nwidth > 0)) $nwidth = $image_info[0];
  if(!($nheight > 0)) $nheight = $image_info[1];
  if(!empty($image_info)) {
    switch($image_info['mime']) {
      case 'image/jpeg' :
      if($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
      // Create a new image from the file or the url.
      $image = imagecreatefromjpeg($source_file);
      $thumb = imagecreatetruecolor($nwidth, $nheight);
      //Resize the $thumb image
      imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
      // Output image to the browser or file.
      return imagejpeg($thumb, $target_file, $quality);
      break;
      case 'image/png' :
      if($quality == '' || $quality < 0 || $quality > 9) $quality = 6; //Default quality
      // Create a new image from the file or the url.
      $image = imagecreatefrompng($source_file);
      $thumb = imagecreatetruecolor($nwidth, $nheight);
      //Resize the $thumb image
      imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
      // Output image to the browser or file.
      return imagepng($thumb, $target_file, $quality);
      break;
      case 'image/gif' :
        if($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefromgif($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        // Output image to the browser or file.
        return imagegif($thumb, $target_file, $quality); //$success = true;
        break;
        default:
        echo "<h4>Not supported file type!</h4>";
        break;
      }
    }
  }
  ?>
