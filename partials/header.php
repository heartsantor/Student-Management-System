<?php
$res_head=mysqli_query($db,"SELECT * FROM institution_details WHERE serial='1'");
$row_head=mysqli_fetch_array($res_head);
?>
<center><h1><?php echo $row_head['name'];?></h1></center>
