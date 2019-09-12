<h3>Print ID Card of The Class</h3><hr>
<form action="print/id_all_pdf.php" method="post" target="_blank" class="form-inline">
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
<hr>
