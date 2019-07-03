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

    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="container">
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Student Full Name</label>
                        <input name="full_name" class="form-control" required>
                        <?php
                        $result=mysqli_query($db,"SELECT COUNT(*) AS total FROM student");
                        $row=mysqli_fetch_array($result);
                        $student_id=$row['total']+1;
                        $student_id=sprintf("%05d", $student_id);
                        $student_id="S".$student_id;
                        ?>
                        <label>Student ID</label>
                        <input name="student_id" class="form-control" value="<?php echo $student_id;?>" disabled style="width">
                        <label>Section</label>
                        <select name="section" class="form-control" required>
                            <option value="">--SELECT SECTION--</option>
                            <option value="Boys">Boys</option>
                            <option value="Girls">Girls</option>
                            <option value="Combined">Combined</option>
                        </select>
                        <label>Class</label>
                        <input name="class" disabled class="form-control" value="<?php echo $_SESSION['class'];?>">
                        <label>Session</label>
                        <input name="session" class="form-control" value="<?php echo $_SESSION['session'];?>" disabled>
                        <label>Shift</label>
                        <select name="shift" class="form-control" required>
                            <option value="">--SELECT SHIFT--</option>
                            <option value="Morning">Morning</option>
                            <option value="Day">Day</option>
                        </select>
                        <label>Gender</label>
                        <select name="shift" class="form-control" required>
                            <option value="">--SELECT GENDER--</option>
                            <option value="Morning">Male</option>
                            <option value="Day">Female</option>
                        </select>
                        <label>Date of Birth</label>
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
                        <label>NID/BRN</label>
                        <input name="nid" class="form-control">
                        <label>Nationality</label>
                        <input name="nationality" class="form-control" value="Bangladeshi" disabled required>
                    </div>
                    <div class="col-sm-6">

                        <label>Phone</label>
                        <input name="phone" class="form-control" required>
                        <label>Present Address</label>
                        <textarea name="present_address" class="form-control"></textarea> 
                        <label>Parmanent Address</label>
                        <textarea name="present_address" class="form-control"></textarea> 
                        <label>Date of Admission</label>
                        <input name="date_of_admission" class="form-control" type="date" required>
                        <label>Transport Facility</label>
                        <input class="form-control" name="transport">
                        <label>Residential Facility</label>
                        <input class="form-control" name="residential">
                        <label>Student Photo</label>
                        <input type="file" name="student_photo" required>
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
                        <input name="father" required class="form-control">
                        <label>Mobile</label>
                        <input name="father_mobile" required class="form-control">
                        <label>Mother's NID</label>
                        <input name="father_nid" class="form-control">
                        <label>Occupation</label>
                        <input name="father_occupation" required class="form-control">
                        <label>Monthly Income</label>
                        <input name="father_income" required class="form-control">
                        <label>Office Address</label>
                        <textarea name="father_office_address" class="form-control"></textarea> 
                    </div>
                </div>




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