<?php

require('../../Database/db.php');
include("../Auth/auth_session.php");


$target_dir = "../../Public/img/images/";
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



        $image_id = stripslashes($_REQUEST['image_id']);
        $image_id = mysqli_real_escape_string($con, $image_id);

        $description = stripslashes($_REQUEST['description']);
        $description = mysqli_real_escape_string($con, $description);

         if(isset($_POST['is_active'])) { // checkbox seçilmişse "on" değeri gönderiliyor
            $is_active = 1;
        } else { // seçilmemişse bu değer sayfaya hiç gönderilmiyor
            $is_active = 0;
        }

        $is_active    = mysqli_real_escape_string($con, $is_active);

        $image    = $target_file;
        $image    = mysqli_real_escape_string($con, $image);

        $group_id = stripslashes($_REQUEST['group']);
        $group_id = mysqli_real_escape_string($con, $group_id);

       
         $query    = "UPDATE images SET description='$description',is_visible='$is_active',url='$image',group_id='$group_id' WHERE id='$image_id' ";
         $result   = mysqli_query($con, $query);

            if ($result) {
               header("Location: delete.php");
            } else {
                echo "<div class=''>
                      Error
                      </div>";
            }


?>