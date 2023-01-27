<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$user_id = $_REQUEST['user_id'];

    
$sql = "DELETE FROM management_council WHERE id=".$user_id." ";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();

?>