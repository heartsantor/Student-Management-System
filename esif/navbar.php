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
            <li><a href="student_list.php?criteria=without_image">Without Image</a></li>
            <li><a href="student_list.php?criteria=with_image">With Image</a></li>
            <li><a href="">Religion Wise</a></li>
            <li><a href="">Age Wise</a></li>
            <li><a href="">Guardian's Income Wise</a></li>
            <li><a href="">Guardian's Profession Wise</a></li>
            <li><a href="">Special Need Wise</a></li>
            <li><a href="">Tribe Wise</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">All Form
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="all_form.php?view=individual">Individual</a></li>
              <li><a href="all_form.php?view=all">All Students</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">ID Card
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="id_card.php?view=individual">Individual</a></li>
                <li><a href="id_card.php?view=all">All Students</a></li>
              </ul>
            </li>
        <li><a href="#">Ex-Student</a></li>
        <li><a href="#">Search</a></li>
        <?php
        if($_SESSION['role']=='admin')
        {
          ?>
          <li><a href="#">Settings</a></li>
          <li><a href="../settings/">Global Settings</a></li>
          <?php
        }
        ?>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
