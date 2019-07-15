<?php
session_start();
if(!$_SESSION['role']){
  header("location:../index.");
}
require_once '../connection/connect.php';
require_once '../bootstrap/bootstrap.html';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class="container">
    <?php
    $result=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
    $row=mysqli_fetch_array($result);
    ?>
    <form action="" method="post">
      <label>Instituition Name</label>
      <input name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
      <label>EIIN</label>
      <input name="eiin" value="<?php echo $row['eiin']; ?>" class="form-control" required>
      <label>Instituition Phone</label>
      <input name="phone" value="<?php echo $row['phone']; ?>" class="form-control" required>
      <label>Instituition Email</label>
      <input name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
      <label>Web</label>
      <input name="web" value="<?php echo $row['web']; ?>" class="form-control" required>
    </form>
  </div>
</body>
</html>
