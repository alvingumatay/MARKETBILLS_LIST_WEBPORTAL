<?php

$mysqli = mysqli_connect("localhost","root","","egrocery_list");
if (!$mysqli){
	die("Connection error: " . mysqli_connect_error());
}

?>