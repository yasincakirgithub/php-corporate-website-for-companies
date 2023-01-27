<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$galery_id = $_REQUEST['galery_id'];

    
$sql = "DELETE FROM image_group WHERE id=".$galery_id." ";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();

?>