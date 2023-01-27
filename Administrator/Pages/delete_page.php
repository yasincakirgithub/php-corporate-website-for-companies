<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$page_id = $_REQUEST['page_id'];

$page_informations = $con->query("SELECT * FROM pages WHERE id='$page_id' ");
$page = $page_informations->fetch_array(); 
$page_route_url = $page["route_url"];

$menu_informations = $con->query("SELECT * FROM main_menu WHERE id=".$page['menu_id']." ");
$menu = $menu_informations->fetch_array(); 
$menu_title = $menu["title"];

$sonuc = unlink("../../Pages/$menu_title/$page_route_url");

    
$sql = "DELETE FROM pages WHERE id=".$page_id." ";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}

$con->close();

?>