<?php
	$conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
	$conn->query("DELETE FROM `postview` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
	header("location:createannouncements.php");
