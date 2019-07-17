<?php
session_start();
if(!$_SESSION['role']){
  header("location:../index.");
}
require_once '../connection/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Settings</title>
  <?php require_once '../bootstrap/bootstrap.html'; ?>
</head>
<body>
  <?php include "../partials/header.php"; ?>
  <?php include "navbar.php"; ?>
  <div class="container">
    <?php
    if(isset($_POST['submit']))
    {
      $name=mysqli_real_escape_string($db,$_POST['name']);
      $address=mysqli_real_escape_string($db,$_POST['address']);
      $estd=$_POST['estd'];
      $eiin=mysqli_real_escape_string($db,$_POST['eiin']);
      $phone=mysqli_real_escape_string($db,$_POST['phone']);
      $email=mysqli_real_escape_string($db,$_POST['email']);
      $web=mysqli_real_escape_string($db,$_POST['web']);

      mysqli_query($db,"UPDATE `institution_details` SET `name`='$name',`address`='$address', `estd`='$estd',`eiin`='$eiin', `phone`='$phone', `email`='$email', `web`='$web' WHERE serial='1'");
    }
    $result=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
    $row=mysqli_fetch_array($result);
    ?>
    <div class="row">
      <div class="col-sm-6">
        <form action="" method="post">
          <label>Instituition Name</label>
          <input name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
          <label>Address</label>
          <textarea name="address" class="form-control" required><?php echo $row['address']; ?></textarea>
          <label>ESTD</label>
          <input name="estd" type="date" class="form-control" required value="<?php echo $row['estd']; ?>" style="width: 150px">
          <label>EIIN</label>
          <input name="eiin" value="<?php echo $row['eiin']; ?>" class="form-control" required>
          <label>Instituition Phone</label>
          <input name="phone" value="<?php echo $row['phone']; ?>" class="form-control" required>
          <label>Instituition Email</label>
          <input name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
          <label>Web</label>
          <input name="web" type="text" value="<?php echo $row['web']; ?>" class="form-control" required>
          <label>Logo</label>
          <input type="file" name="logo" required>
          <br>
          <input type="submit" name="submit" value="Update" class="btn btn-primary">
        </form>
      </div>
      <div class="col-sm-6">
        <h3>Instituition Logo</h3>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="logo" required>
          <br>
          <input type="submit" name="submit_1" value="Upload" class="btn btn-primary">
        </form>
        <img src="<?php echo $row['logo']; ?>" width="60%">
      </div>
    </div>

  </div>
</body>
</html>
<?php mysqli_close($db); ?>
