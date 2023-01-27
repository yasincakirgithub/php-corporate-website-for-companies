

<?php

require('../../Database/db.php');
include("../Auth/auth_session.php");


$target_dir = "../../Public/img/";
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

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
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



    
        $description = stripslashes($_REQUEST['description']);
        $description = mysqli_real_escape_string($con, $description);
    
        $title    = stripslashes($_REQUEST['title']);
        $title    = mysqli_real_escape_string($con, $title);

        $priority    = stripslashes($_REQUEST['priority']);
        $priority    = mysqli_real_escape_string($con, $priority);

        $image    = $target_file;
        $image    = mysqli_real_escape_string($con, $image);

        $route_url    = "deneme_url";
        $route_url    = mysqli_real_escape_string($con, $route_url);
       
        
        $query    = "INSERT into `main_slider` (image, description,title,route_url,priority)
                     VALUES ('$image','$description','$title','$route_url', '$priority')";
        $result   = mysqli_query($con, $query);
        
        
        if ($result) {
           header("Location: delete.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
   



?>