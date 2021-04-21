<?php
      
    
	if(ISSET($_POST['submit'])){
		
	    
	    $image = rand(1000,10000)."-".$_FILES["image"]["name"];
		$filetmpname = $_FILES["image"]["tmp_name"];
		$folder = 'images/';
		move_uploaded_file($filetmpname, $folder.'/'.$image);
	
		$conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
		$conn->query("UPDATE `holiseason` SET   `image` = '$image' ") or die(mysqli_error());
		header("location: dashboard.php");
	}
	?>