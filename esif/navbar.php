<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ESIF</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">eSIF</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student List
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="student_list.php?id=without_image">Without Image</a></li>
          <li><a href="student_list.php?id=with_image">With Image</a></li>
        </ul>
      </li>
      <li><a href="#">All Form</a></li>
      <li><a href="#">ID Card</a></li>
      <li><a href="#">Ex-Student</a></li>
      <li><a href="#">Search</a></li>
              <?php
        if($_SESSION['role']=='admin')
        {
        ?>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Global Settings</a></li>
        <?php
        }
            ?>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
