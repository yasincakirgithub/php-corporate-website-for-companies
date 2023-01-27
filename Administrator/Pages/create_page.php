
<?php

require('../../Database/db.php');
include("../Auth/auth_session.php");


$target_dir = "../../Public/img/page_images/";
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

        $page_title = stripslashes($_REQUEST['page_title']);
        $page_title = mysqli_real_escape_string($con, $page_title);
    
        $page_route_url    = stripslashes($_REQUEST['page_route_url']);
        $page_route_url    = mysqli_real_escape_string($con, $page_route_url);

        $description    = stripslashes($_REQUEST['editordata']);
        $description    = mysqli_real_escape_string($con, $description);

        $priority   = stripslashes($_REQUEST['priority']);
        $priority   = mysqli_real_escape_string($con, $priority);
        
        
        if(isset($_POST['is_active'])) { // checkbox seçilmişse "on" değeri gönderiliyor
            $is_active = 1;
        } else { // seçilmemişse bu değer sayfaya hiç gönderilmiyor
            $is_active = 0;
        }
        $is_active    = mysqli_real_escape_string($con, $is_active);

        $image    = $target_file;
        $image    = mysqli_real_escape_string($con, $image);

        $menu_id = stripslashes($_REQUEST['menu_id']);
        $menu_id = mysqli_real_escape_string($con, $menu_id);
        

        $query    = "INSERT into `pages` (menu_id,title, route_url,is_active,description,image,priority)
                     VALUES ('$menu_id','$page_title','$page_route_url','$is_active','$description', '$image','$priority')";
        $result   = mysqli_query($con, $query);




         $old_menu_information = $con->query("SELECT * FROM main_menu WHERE id='".$menu_id."' ");

         if ($con->errno > 0) {die("<b>Sorgu Hatası:</b> " . $con->error);}

         $old_menu_query = $old_menu_information->fetch_array();

         $menu_title = $old_menu_query["title"];


//              Yeni sayfa oluşturma kodları

        if($page_route_url){
                touch("../../Pages/$menu_title/$page_route_url");
                $dosya = fopen("../../Pages/$menu_title/$page_route_url", 'wb');
                fwrite($dosya,stripslashes($_REQUEST['editordata']));
                fclose($dosya);
                    
            }

    
        
        
        if ($result) {
           header("Location: delete.php");
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
   



?>