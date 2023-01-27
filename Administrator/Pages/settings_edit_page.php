
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

        $page_id = stripslashes($_REQUEST['page_id']);
        $page_id = mysqli_real_escape_string($con, $page_id);

        $page_title = stripslashes($_REQUEST['page_title']);
        $page_title = mysqli_real_escape_string($con, $page_title);
    
        $page_route_url    = stripslashes($_REQUEST['page_route_url']);
        $page_route_url    = mysqli_real_escape_string($con, $page_route_url);

         if(isset($_POST['is_active'])) { // checkbox seçilmişse "on" değeri gönderiliyor
            $is_active = 1;
        } else { // seçilmemişse bu değer sayfaya hiç gönderilmiyor
            $is_active = 0;
        }
        $is_active    = mysqli_real_escape_string($con, $is_active);

        $description    = stripslashes($_REQUEST['editordata']);
        $description    = mysqli_real_escape_string($con, $description);

        $priority   = stripslashes($_REQUEST['priority']);
        $priority   = mysqli_real_escape_string($con, $priority);

        $image    = $target_file;
        $image    = mysqli_real_escape_string($con, $image);

        $menu_id = stripslashes($_REQUEST['menu_id']);
        $menu_id = mysqli_real_escape_string($con, $menu_id);



//        Eski Sayfanın Dosyasını Silirme

        $old_page_informations = $con->query("SELECT * FROM pages WHERE id='$page_id' ");
        $old_page = $old_page_informations->fetch_array(); 
        $old_page_route_url = $old_page["route_url"];

        $old_menu_informations = $con->query("SELECT * FROM main_menu WHERE id=".$old_page['menu_id']." ");
        $old_menu = $old_menu_informations->fetch_array(); 
        $old_menu_title = $old_menu["title"];

        $sonuc = unlink("../../Pages/$old_menu_title/$old_page_route_url");
        



     $query    = "UPDATE pages SET menu_id=$menu_id,title='$page_title',route_url='$page_route_url',is_active='$is_active',description='$description',image='$image',priority='$priority' WHERE id='$page_id' ";
     $result   = mysqli_query($con, $query);

        

        $new_menu_informations = $con->query("SELECT * FROM main_menu WHERE id='$menu_id' ");
        $new_menu = $new_menu_informations->fetch_array(); 
        $new_menu_title = $new_menu["title"];

            if($page_route_url){
                touch("../../Pages/$new_menu_title/$page_route_url");
                $dosya = fopen("../../Pages/$new_menu_title/$page_route_url", 'wb');
                fwrite($dosya, stripslashes($_REQUEST['editordata']));
                fclose($dosya);
                    
            }

        
        if ($result) {
           header("Location: delete.php");
        } else {
            echo "<div class=''>
                  Error
                  </div>";
        }
   

?>