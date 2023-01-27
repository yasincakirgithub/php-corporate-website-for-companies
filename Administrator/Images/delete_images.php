<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$image_id = $_REQUEST['image_id'];

    
$sql = "DELETE FROM images WHERE id=".$image_id." ";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();

?>