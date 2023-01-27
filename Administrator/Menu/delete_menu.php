<?php
require('../../Database/db.php');
include("../Auth/auth_session.php");
?>

<?php

// sql to delete a record
$menu_id = $_REQUEST['menu_id'];


// Klasör Sildirme

function klasorsil($klasor){
if (substr($klasor, -1) != '/')
$klasor .= '/';
if ($handle = opendir($klasor)) {
while ($obj = readdir($handle)) {
if ($obj!= '.' && $obj!= '..') {
if (is_dir($klasor.$obj)) {
if (!klasorsil($klasor.$obj))
return false;
}elseif (is_file($klasor.$obj)) {
if (!unlink($klasor.$obj))
return false;
}
}
}
closedir($handle);
if (!@rmdir($klasor))
return false;
return true;
}
return false;
};


$sorgu = $con->query("SELECT * FROM main_menu WHERE id=".$menu_id." ");
if ($con->errno > 0) {die("<b>Sorgu Hatası:</b> " . $con->error);}
$cikti = $sorgu->fetch_array();
$menu_title = $cikti['title'];

klasorsil("../../Pages/$menu_title/");



$sql = "DELETE FROM main_menu WHERE id=".$menu_id." ";
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $con->error;
}








$con->close();

?>