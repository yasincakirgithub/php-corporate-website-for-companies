
<?php

require('../../Database/db.php');
include("../Auth/auth_session.php");



        $social_links_facebook = stripslashes($_REQUEST['social_links_facebook']);
        $social_links_facebook = mysqli_real_escape_string($con, $social_links_facebook);
    
        $social_links_youtube    = stripslashes($_REQUEST['social_links_youtube']);
        $social_links_youtube    = mysqli_real_escape_string($con, $social_links_youtube);

        $social_links_twitter    = stripslashes($_REQUEST['social_links_twitter']);
        $social_links_twitter    = mysqli_real_escape_string($con, $social_links_twitter);

        $social_links_youtube    = stripslashes($_REQUEST['social_links_youtube']);
        $social_links_youtube    = mysqli_real_escape_string($con, $social_links_youtube);

        $social_links_google    = stripslashes($_REQUEST['social_links_google']);
        $social_links_google = mysqli_real_escape_string($con, $social_links_google);

        $social_links_instagram   = stripslashes($_REQUEST['social_links_instagram']);
        $social_links_instagram   = mysqli_real_escape_string($con, $social_links_instagram);

        $query    = "UPDATE social_links SET facebook_url='$social_links_facebook',youtube_url='$social_links_youtube',twitter_url='$social_links_twitter',google_url='$social_links_google',instagram_url='$social_links_instagram' WHERE id = 1";
        $result   = mysqli_query($con, $query);
        
        if ($result) {
           header("Location: social_links.php");
        } else {
            echo "<div class=''>
                  Error
                  </div>";
        }
   



?>