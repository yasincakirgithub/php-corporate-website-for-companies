
<?php

require('../../Database/db.php');
include("../Auth/auth_session.php");

$target_dir = "../../Public/img/mc_images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


        $user_id = stripslashes($_REQUEST['user_id']);
        $user_id = mysqli_real_escape_string($con, $user_id);

        $full_name = stripslashes($_REQUEST['full_name']);
        $full_name = mysqli_real_escape_string($con, $full_name);
    
        $degree    = stripslashes($_REQUEST['degree']);
        $degree    = mysqli_real_escape_string($con, $degree);

        $image    = $target_file;
        $image    = mysqli_real_escape_string($con, $image);



     $query    = "UPDATE management_council SET full_name='$full_name',image='$image',degree='$degree' WHERE id='$user_id' ";
     $result   = mysqli_query($con, $query);
        
        if ($result) {
           header("Location: management_council.php");
        } else {
            echo "<div class=''>
                  Error
                  </div>";
        }
   

?>