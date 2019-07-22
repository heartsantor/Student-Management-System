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
  <title>Student List</title>
  <style>
  th {
    background-color: silver;
  }
  table, th, td, tr {
    border: 1px solid black;
    text-align: center;
    vertical-align: center;
  }
  .container
  {
    font-size: 12px;
  }
  @media print {
    .myDivToPrint {
      background-color: white;
      height: 100%;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      margin: 0;
      padding: 15px;
      font-size: 14px;
      line-height: 18px;
    }
    .noPrint {
      visibility: hidden;
    }
  }
  </style>
</head>
<body>
  <div class="noPrint">
    <?php include "../partials/header.php"; ?>
    <?php include "navbar.php"; ?>
  </div>
  <div class="container">
    <div class="noPrint">
      <form action="" method="post" class="form-inline">
        <select name="section" class="form-control" required>
          <option value="">--SELECT SECTION--</option>
          <option value="Boys">Boys</option>
          <option value="Girls">Girls</option>
          <option value="Combined">Combined</option>
        </select>
        <?php
        $class=$_SESSION['class'];

        if($class=='vi'||$class=='vii'||$class=='viii'){
          echo "<input type='hidden' value='Other' name='group' required>";
        }
        else {
          echo '<select name="group" class="form-control" required>
          <option value="">--SELECT GROUP--</option>
          <option value="Science">Science</option>
          <option value="Commerce">Commerce</option>
          <option value="Arts">Arts</option>
          </select>';
        }
        ?>

        <select name="shift" class="form-control" required>
          <option value="">--SELECT SHIFT--</option>
          <option value="Morning">Morning</option>
          <option value="Day">Day</option>
        </select>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
      </form>
      <br>
    </div>
    <div class="myDivToPrint">
      <?php
      if(isset($_POST['submit']))
      {
        $ins_res=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
        $ins_row=mysqli_fetch_array($ins_res);

        $shift=$_POST['shift'];
        $section=$_POST['section'];
        $group=$_POST['group'];

        $class=$_SESSION['class'];
        $class_res=mysqli_query($db,"SELECT * FROM class WHERE class_id='$class'");
        $class_row=mysqli_fetch_array($class_res);

        $session=$_SESSION['session'];
        $criteria=$_GET['criteria'];
        $result=mysqli_query($db,"SELECT * FROM student WHERE student_class='$class' AND student_session='$session' AND student_shift='$shift' AND student_section='$section' AND student_group='$group'");
        $total_student=$result->num_rows;

        echo "<center>";
        echo "<h3><b>".$ins_row['name']."</b></h3>";
        echo $ins_row['address']."<br>";
        echo "Estd: <b>".date_format(date_create($ins_row['estd']),'m/d/Y')."</b>, EIIN: <b>".$ins_row['eiin']."</b>, Phone: <b>".$ins_row['phone']."</b><br>";
        echo "Email: <b>".$ins_row['email']."</b>, Web: <b>".$ins_row['web']."</b><br>";
        echo "</center>";
        echo "<center>Student Profile of <b>".date('d F, Y')."</b>";
        echo "<center>Session: <b>".$session."</b>, Class: <b>".$class_row['class_name']."</b>,  Section: <b>".$section."</b>, ";
        echo "Group: <b>".$group."</b>, Student: <b>".$total_student."</b></center>";
        if($criteria=='without_image')
        {
          include "views/without_image.php";
        }

        else if($criteria=='with_image')
        {
          include "views/with_image.php";
        }
      }

      ?>
    </div>
  </div>
  <?php mysqli_close($db); ?>
</body>
</html>
