<?php
	$conn = new PDO('mysql:host=localhost;dbname=egrocery_list', 'root', '');
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}
?>