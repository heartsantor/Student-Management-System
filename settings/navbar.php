<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Settings</a>
    </div>
    <ul class="nav navbar-nav">
      <?php
      if($_SESSION['role']=='admin')
      {
        ?>
        <li><a href="../esif/">eSIF</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="../settings/settings.php">Global Settings</a></li>
        <?php
      }
      ?>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
