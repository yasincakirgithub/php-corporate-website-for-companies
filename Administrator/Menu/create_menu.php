

<?php


require('../../Database/db.php');
include("../Auth/auth_session.php");


    
        $title    = stripslashes($_REQUEST['title']);
        $title    = mysqli_real_escape_string($con, $title);

        $type    = stripslashes($_REQUEST['type']);
        $type    = mysqli_real_escape_string($con, $type);

        $priority    = stripslashes($_REQUEST['priority']);
        $priority    = mysqli_real_escape_string($con, $priority);

        if(isset($_POST['is_active'])) { // checkbox seçilmişse "on" değeri gönderiliyor
            $is_active = 1;
        } else { // seçilmemişse bu değer sayfaya hiç gönderilmiyor
            $is_active = 0;
        }
        $is_active    = mysqli_real_escape_string($con, $is_active);


        $query    = "INSERT into `main_menu` (title, type,is_active,priority)
                     VALUES ('$title','$type','$is_active','$priority')";
        $result   = mysqli_query($con, $query);

        

        if($type=="link"){
            
            
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

            
            $page_route_url    = stripslashes($_REQUEST['page_route_url']);
            $page_route_url    = mysqli_real_escape_string($con, $page_route_url);

            $description    = stripslashes($_REQUEST['editordata']);
            $description    = mysqli_real_escape_string($con, $description);   
            
            $image    = $target_file;
            $image    = mysqli_real_escape_string($con, $image);
            
                $sorgu = $con->query("SELECT * FROM main_menu WHERE title='".$title."' ");

                if ($con->errno > 0) {die("<b>Sorgu Hatası:</b> " . $con->error);}

                $cikti = $sorgu->fetch_array();
            
                $menu_id = $cikti["id"];
            
            $query2    = "INSERT into `pages` (menu_id,title, route_url,is_active,description,image,priority)
                         VALUES ('$menu_id','$title','$page_route_url','$is_active','$description', '$image','1')";
            $result2   = mysqli_query($con, $query2);
               
        };






        if (file_exists("../../Pages/$title")){
            echo 'Klasör zaten var';
        }else{
            $sonuc = mkdir("../../Pages/$title",'0777');
            if ($sonuc){
                echo 'Klasör başarıyla oluşturuldu';
            }else{
                echo 'Bir hata oluştu';
            }
            
            if($page_route_url){
                touch("../../Pages/$title/$page_route_url");
                
                
//              Yeni sayfa oluşturma kodları
                
                $dosya = fopen("../../Pages/$title/$page_route_url",'w');
                fwrite($dosya,stripslashes($_REQUEST['editordata']));
                fclose($dosya);
                
              
              
            }
            
        }



        
        
        if ($result) {
           header("Location: delete.php");
        } else {
            echo "<div class='form'>
                  ERROR
                  </div>";
        }
   



?>