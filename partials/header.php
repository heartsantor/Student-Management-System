<?php
$res_head=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
$row_head=mysqli_fetch_array($res_head);
?>
<div class="row">
  <div class="container">
    <div class="col-sm-1" style="padding:0px">
      <img src="<?php echo $row_head['logo']; ?>" width="100%">
    </div>
    <div class="col-sm-9" style="padding:0px">
      <center><h1><?php echo $row_head['name'];?></h1></center>
    </div>
  </div>
</div>
