<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","egrocery_list");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>