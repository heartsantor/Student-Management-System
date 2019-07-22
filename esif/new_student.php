<?php
require_once '../connection/connect.php';
header( "refresh:3;url=index.php" );
include "../bootstrap/bootstrap.html";
if(isset($_POST['submit']))
{
  //
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
  $student_nid_photo="";
  //
  $student_religion=$_POST['religion'];
  $student_roll=mysqli_real_escape_string($db,$_POST['student_roll']);
  $student_group=mysqli_real_escape_string($db,$_POST['group']);

  //


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
          $target_dir= "../student_nid_photo/";
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

  if(isset($_FILES['father_photo']['name']) && @$_FILES['father_photo']['name'] != "") {
    if($_FILES['father_photo']['error'] > 0) {
      echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
    } else {
      if($_FILES['father_photo']['size'] / 1024 <= 5120) { // 5MB
        if($_FILES['father_photo']['type'] == 'image/jpeg' ||
        $_FILES['father_photo']['type'] == 'image/pjpeg' ||
        $_FILES['father_photo']['type'] == 'image/png' ||
        $_FILES['father_photo']['type'] == 'image/gif'){

          $source_file = $_FILES['father_photo']['tmp_name'];

          $width      = 300;
          $height     = 300;
          $quality    = 80;

          $file = $_FILES['father_photo']['name'];
          $ref="f-".$student_id;
          $file=explode(".",$file);
          $file=$ref.".".end($file);
          $target_dir= "../student_guardian/";
          $target_file= $target_dir.$file;

          //move_uploaded_file($_FILES['user_signature']['tmp_name'], $target_file);
          $father_photo = $target_file;

          $success = compress_image($source_file, $target_file, $width, $height, $quality);

        }
      } else {
        echo '<h4>Image should be maximun 5MB in size!</h4>';
      }
    }
  }

  if(isset($_FILES['father_nid_photo']['name']) && @$_FILES['father_nid_photo']['name'] != "") {
    if($_FILES['father_nid_photo']['error'] > 0) {
      echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
    } else {
      if($_FILES['father_nid_photo']['size'] / 1024 <= 5120) { // 5MB
        if($_FILES['father_nid_photo']['type'] == 'image/jpeg' ||
        $_FILES['father_nid_photo']['type'] == 'image/pjpeg' ||
        $_FILES['father_nid_photo']['type'] == 'image/png' ||
        $_FILES['father_nid_photo']['type'] == 'image/gif'){

          $source_file = $_FILES['father_nid_photo']['tmp_name'];

          $width      = 600;
          $height     = 300;
          $quality    = 80;

          $file = $_FILES['father_nid_photo']['name'];
          $ref="f-nid-".$student_id;
          $file=explode(".",$file);
          $file=$ref.".".end($file);
          $target_dir= "../student_guardian_nid/";
          $target_file= $target_dir.$file;

          //move_uploaded_file($_FILES['user_signature']['tmp_name'], $target_file);
          $father_nid_photo = $target_file;

          $success = compress_image($source_file, $target_file, $width, $height, $quality);

        }
      } else {
        echo '<h4>Image should be maximun 5MB in size!</h4>';
      }
    }
  }

  if(isset($_FILES['mother_photo']['name']) && @$_FILES['mother_photo']['name'] != "") {
    if($_FILES['mother_photo']['error'] > 0) {
      echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
    } else {
      if($_FILES['mother_photo']['size'] / 1024 <= 5120) { // 5MB
        if($_FILES['mother_photo']['type'] == 'image/jpeg' ||
        $_FILES['mother_photo']['type'] == 'image/pjpeg' ||
        $_FILES['mother_photo']['type'] == 'image/png' ||
        $_FILES['mother_photo']['type'] == 'image/gif'){

          $source_file = $_FILES['mother_photo']['tmp_name'];

          $width      = 300;
          $height     = 300;
          $quality    = 80;

          $file = $_FILES['mother_photo']['name'];
          $ref="m-".$student_id;
          $file=explode(".",$file);
          $file=$ref.".".end($file);
          $target_dir= "../student_guardian/";
          $target_file= $target_dir.$file;

          //move_uploaded_file($_FILES['user_signature']['tmp_name'], $target_file);
          $mother_photo = $target_file;

          $success = compress_image($source_file, $target_file, $width, $height, $quality);

        }
      } else {
        echo '<h4>Image should be maximun 5MB in size!</h4>';
      }
    }
  }

  if(isset($_FILES['mother_nid_photo']['name']) && @$_FILES['mother_nid_photo']['name'] != "") {
    if($_FILES['mother_nid_photo']['error'] > 0) {
      echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
    } else {
      if($_FILES['mother_nid_photo']['size'] / 1024 <= 5120) { // 5MB
        if($_FILES['mother_nid_photo']['type'] == 'image/jpeg' ||
        $_FILES['mother_nid_photo']['type'] == 'image/pjpeg' ||
        $_FILES['mother_nid_photo']['type'] == 'image/png' ||
        $_FILES['mother_nid_photo']['type'] == 'image/gif'){

          $source_file = $_FILES['mother_nid_photo']['tmp_name'];

          $width      = 600;
          $height     = 300;
          $quality    = 80;

          $file = $_FILES['mother_nid_photo']['name'];
          $ref="m-nid-".$student_id;
          $file=explode(".",$file);
          $file=$ref.".".end($file);
          $target_dir= "../student_guardian_nid/";
          $target_file= $target_dir.$file;

          //move_uploaded_file($_FILES['user_signature']['tmp_name'], $target_file);
          $mother_nid_photo = $target_file;

          $success = compress_image($source_file, $target_file, $width, $height, $quality);

        }
      } else {
        echo '<h4>Image should be maximun 5MB in size!</h4>';
      }
    }
  }



  mysqli_query($db, "INSERT INTO `student`(`student_id`, `student_name`, `student_section`, `student_session`, `student_class`, `student_shift`, `student_gender`, `student_dob`, `student_blood`, `student_special_need`, `student_nid`, `student_nationality`, `student_phone`, `student_present_address`, `student_par_address`, `student_adm_date`, `student_transport`, `student_residential`, `student_photo`, `student_nid_photo`, `father_name`, `father_phone`, `father_nid`, `father_nid_photo`, `father_occupation`, `father_office`, `father_income`, `father_photo`, `mother_name`, `mother_phone`, `mother_nid`, `mother_nid_photo`, `mother_occupation`, `mother_income`, `mother_office`, `mother_photo`,`student_religion`, `student_roll`,`student_group`) VALUES ('$student_id','$student_name','$section','$session','$class','$shift','$gender','$dob','$blood_group','$special_need','$student_nid','$nationality','$phone','$present_address','$parm_address','$date_of_admission','$transport','$residential','$student_photo','$student_nid_photo','$father_name','$father_phone','$father_nid','$father_nid_photo','$father_occupation','$father_office','$father_income','$father_photo','$mother_name','$mother_phone','$mother_nid','$mother_nid_photo','$mother_occupation','$mother_income','$mother_office','$mother_photo','$student_religion','$student_roll','$student_group')");


  $sub_res=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND religion='0' AND optional_type1='0' AND optional_type2='0' AND elective='0' AND science='0' AND commerce='0' AND arts='0'");

  while($sub_row=mysqli_fetch_array($sub_res))
  {
    $subject_code=$sub_row['subject_code'];
    mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`class_id`,`session_name`) VALUES ('$student_id','$subject_code','$class','$session')");
  }

  $religion_sub=$_POST['religion_sub'];
  mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`religion`,`class_id`,`session_name`) VALUES ('$student_id','$religion_sub','1','$class','$session')");

  if($class=='vi' || $class=='vii' || $class=='viii')
  {
    $optional_type1=$_POST['optional_type1'];
    mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`optional_type1`,`class_id`,`session_name`) VALUES ('$student_id','$optional_type1','1','$class','$session')");
  }
  else if($class=='ix' || $class=='x')
  {
    $optional_type2=$_POST['optional_type2'];
    $compulsory_sub=$_POST['compulsory_sub'];

    if($student_group=='Science'){

      $sub_elective=mysqli_query($db,"SELECT * FROM subject WHERE class_id='$class' AND elective='1' AND science='1'");

      while($sub_elective_row=mysqli_fetch_array($sub_elective))
      {

        $subject_code=$sub_elective_row['subject_code'];
        //echo $subject_code;
        mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`class_id`,`session_name`,`elective`,`science`) VALUES ('$student_id','$subject_code','$class','$session','1','1')");
      }
      mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`elective`,`class_id`,`session_name`,`science`) VALUES ('$student_id','$compulsory_sub','1','$class','$session','1')");
      mysqli_query($db,"INSERT INTO `subject_student`(`subject_student_id`, `subject_student_code`,`optional_type2`,`class_id`,`session_name`,`science`) VALUES ('$student_id','$optional_type2','1','$class','$session','1')");
    }
  }
}



?>
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
  echo "<div class='alert alert-success'>Student Added Successfully! Redirecting.....</div>";
  ?>
