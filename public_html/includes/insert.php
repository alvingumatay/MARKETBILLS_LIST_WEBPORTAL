<?php
       	
		if(ISSET($_POST['submit'])){
		$user_id = $_SESSION['user_id'];
		$image = rand(1000,10000)."-".$_FILES["image"]["name"];
		$filetmpname = $_FILES["image"]["tmp_name"];
		$folder = '../uploads/';
		move_uploaded_file($filetmpname, $folder.'/'.$image);	
		$product_name = $_POST['product_name']; 
		
		$cost = $_POST['cost']; 
		$conn = new mysqli("localhost","root","","egrocery_list");
		$q1 = $conn->query("SELECT * FROM `planbill` WHERE  $_SESSION[user_id] && `product_name` = '$product_name'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				
			}else{
				$conn->query("INSERT INTO `planbill` VALUES(NULL, '$user_id', '$image','$product_name',  '$cost')");
		
				
				
			
               
           }
		$conn->close();
	}
				
	


		