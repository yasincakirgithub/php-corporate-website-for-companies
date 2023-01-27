<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$message_id = $_REQUEST['message_id'];

    
$sql = "DELETE FROM messages WHERE id=".$message_id." ";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();

?>