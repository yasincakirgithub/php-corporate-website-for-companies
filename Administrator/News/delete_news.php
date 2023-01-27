<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$news_id = $_REQUEST['news_id'];

    
$sql = "DELETE FROM news WHERE id=".$news_id." ";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();

?>