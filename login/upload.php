<!DOCTYPE html>
<html lang="en">
  <head>
    <title>How to reduce or compress image size while uploading using PHP | Mitrajit's Tech Blog</title>
  </head>
    <style>
  span { clear:both; display:block; margin-bottom:30px; }
  span a { font-weight:bold; color:#0099FF; }
  img { max-width:150px; padding:3px; border:2px solid #eee; border-radius:3px;}
  table td { padding-bottom:10px;}
  label { display:block; font-weight:bold; padding-bottom:3px }
  p.red { color:#FF0000; }
  </style>
  <body>
  <div class="container-fluid">
    <span class="top-margin">Read the full article on -- <a href="http://www.mitrajit.com/reduce-or-compress-image-size-while-uploading-using-php/" target="_blank">Live demo on Reduce or compress image size while uploading using PHP</a> in <a href="http://www.mitrajit.com/">Mitrajit's Tech Blog</a></span>
    
    <div class="row">
      <div class="col-md-6 col-xs-12">
        Note : 
        <ul>
          <li>Allowed image types are -- .jpg|.jpeg|.gif|.png.</li>
          <li>New width, height and quality are optional.</li>
          <li>New width and height should be greater than 0.</li>
          <li>Image quality range should in between 0-100 for .jpg and .gif images.</li>
          <li>Image quality range should in between 0-9 for .png images.</li>
        </ul> 
      </div>
      
      <div class="col-md-6 col-xs-12">
        <form method="post" enctype="multipart/form-data">
          <table width="500" border="0">
            <tr>
            <td><label>Upload image <font color="#FF0000;">*</font></label><input type="file" name="uploadImg" value="" /></td>
            </tr>
            <tr>
            <td><label>New width</label><input type="text" name="width" value=""></td>
            </tr>
            <tr>
            <td><label>New height</label><input type="text" name="height" value=""></td>
            </tr>
            <tr>
            <td><label>Image quality</label><input type="text" name="quality" value=""></td>
            </tr>
            <tr>
            <td><input type="submit" name="submit" value="Upload & Compress" /></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <?php
        $success = false;
        if(isset($_POST['submit']) && !empty($_POST['submit'])) {
          if(isset($_FILES['uploadImg']['name']) && @$_FILES['uploadImg']['name'] != "") {
            if($_FILES['uploadImg']['error'] > 0) {
              echo '<h4>Increase post_max_size and upload_max_filesize limit in php.ini file.</h4>';
            } else {
              if($_FILES['uploadImg']['size'] / 1024 <= 5120) { // 5MB
                if($_FILES['uploadImg']['type'] == 'image/jpeg' || 
                   $_FILES['uploadImg']['type'] == 'image/pjpeg' || 
                   $_FILES['uploadImg']['type'] == 'image/png' ||
                   $_FILES['uploadImg']['type'] == 'image/gif'){
                  
                  $source_file = $_FILES['uploadImg']['tmp_name'];
                  $target_file = "uploads/compressed_" . $_FILES['uploadImg']['name']; 
                  $width      = $_POST['width'];
                  $height     = $_POST['height'];
                  $quality    = $_POST['quality'];
                  //$image_name = $_FILES['uploadImg']['name'];
                  $success = compress_image($source_file, $target_file, $width, $height, $quality);
                  if($success) {
                    // Optional. The original file is uploaded to the server only for the comparison purpose.
                    copy($source_file, "uploads/original_" . $_FILES['uploadImg']['name']);
                  }
                }
              } else {
                echo '<h4>Image should be maximun 5MB in size!</h4>';
              }
            }
          } else {
            echo "<h4>Please select an image first!</h4>";
          }
        }
        ?>
        
        <!-- Displaying original and compressed images -->
        <?php if($success) { ?>
        <?php $destination = "uploads/"; ?>
          <table border="0" cellpadding="20">
            <tr>
            <td>
              <a href="<?php echo $destination . "original_" . $_FILES['uploadImg']['name']?>" target="_blank" title="View actual size">
                <img src='<?php echo $destination . "original_" . $_FILES['uploadImg']['name']?>'>
              </a><br>
              Original : <?php echo round(filesize($destination . "original_" . $_FILES['uploadImg']['name'])/1024,2); ?>KB
            </td>
            <td>
              <a href="<?php echo $destination . "compressed_" . $_FILES['uploadImg']['name']?>" target="_blank" title="View actual size">
                <img src='<?php echo $destination . "compressed_" . $_FILES['uploadImg']['name']?>'>
              </a><br>
              Compressed : <?php echo round(filesize($destination . "compressed_" . $_FILES['uploadImg']['name'])/1024, 2); ?>KB
            </td>
            </tr>
          </table>
        <?php } ?>
      </div>
    </div>
      
      
      
      
      
      
      
<?php
function compress_image($source_file, $target_file, $nwidth, $nheight, $quality) {
  //Return an array consisting of image type, height, widh and mime type.
  $image_info = getimagesize($source_file);
  if(!($nwidth > 0)) $nwidth = $image_info[0];
  if(!($nheight > 0)) $nheight = $image_info[1];
  
  if(!empty($image_info)) {
    switch($image_info['mime']) {
      case 'image/jpeg' :
        if($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefromjpeg($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        // Output image to the browser or file.
        return imagejpeg($thumb, $target_file, $quality); 
        
        break;
      
      case 'image/png' :
        if($quality == '' || $quality < 0 || $quality > 9) $quality = 6; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefrompng($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        // Output image to the browser or file.
        return imagepng($thumb, $target_file, $quality);
        break;
        
      case 'image/gif' :
        if($quality == '' || $quality < 0 || $quality > 100) $quality = 75; //Default quality
        // Create a new image from the file or the url.
        $image = imagecreatefromgif($source_file);
        $thumb = imagecreatetruecolor($nwidth, $nheight);
        //Resize the $thumb image
        imagecopyresized($thumb, $image, 0, 0, 0, 0, $nwidth, $nheight, $image_info[0], $image_info[1]);
        // Output image to the browser or file.
        return imagegif($thumb, $target_file, $quality); //$success = true;
        break;
        
      default:
        echo "<h4>Not supported file type!</h4>";
        break;
    }
  }
}
?>
</body>