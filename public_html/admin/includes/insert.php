<?php
		if(ISSET($_POST['submit'])){
		$message = $_POST['message'];
		$date = $_POST['date'];
		$conn = new mysqli("localhost","root","","egrocery_list");
		$conn->query("INSERT INTO `postview` VALUES(NULL,  '$message')");
				header("location:createannouncements.php");
			}				
		
		