
<?php

require('../../Database/db.php');
include("../Auth/auth_session.php");



        $contact_email = stripslashes($_REQUEST['contact_email']);
        $contact_email = mysqli_real_escape_string($con, $contact_email);
    
        $contact_address    = stripslashes($_REQUEST['contact_address']);
        $contact_address    = mysqli_real_escape_string($con, $contact_address);

        $contact_fax   = stripslashes($_REQUEST['contact_fax']);
        $contact_fax   = mysqli_real_escape_string($con, $contact_fax);

        $contact_gsm    =  stripslashes($_REQUEST['contact_gsm']);
        $contact_gsm    = mysqli_real_escape_string($con, $contact_gsm);


        $query    = "UPDATE contact SET gsm='$contact_gsm',email='$contact_email',address='$contact_address',fax='$contact_fax'
                    WHERE id = 1";
        $result   = mysqli_query($con, $query);
        
        
        if ($result) {
           header("Location: contact.php");
        } else {
            echo "<div class=''>
                  Error
                  </div>";
        }
   



?>