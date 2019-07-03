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

    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="container">
            <form action="" method="post">
                <label>Student Full Name</label>
                <input name="full_name" class="form-control">
                <?php
                $result=mysqli_query($db,"SELECT COUNT(*) AS total FROM student");
                $row=mysqli_fetch_array($result);
                $student_id=$row['total']+1;
                $student_id=sprintf("%05d", $student_id);
                $student_id="S".$student_id;
                ?>
                <label>Student ID</label>
                <input name="student_id" class="form-control" value="<?php echo $student_id;?>" disabled>
                <label>Section</label>
                <select name="section" class="form-control">
                    <option value="">--SELECT SECTION--</option>
                    <option value="Boys">Boys</option>
                    <option value="Girls">Girls</option>
                    <option value="Combined">Combined</option>
                </select>
                <label>Session</label>
                <input name="session" class="form-control" value="<?php echo $_SESSION['session'];?>" disabled>
                <label>Shift</label>
                <select name="section" class="form-control">
                    <option value="">--SELECT SHIFT--</option>
                    <option value="Morning">Morning</option>
                    <option value="Day">Day</option>
                </select>
            </form>
        </div> 
    </body>
</html>