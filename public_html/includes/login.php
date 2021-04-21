<?php
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(ISSET($_POST['login'])){
		$status='1';
		$conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
		$query = $conn->query("SELECT *FROM `users` WHERE `email` = '$email' && `password` = '$password' && `status`='$status'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
			if($valid > 0){
				$_SESSION['user_id'] = $fetch['user_id'];
				
				header("location:../user_manager/dashboard.php");
			}else{
				echo "<script>alert('Invalid email or password')</script>";
				echo "<script>window.location = '../index.php'</script>";
			}
		$conn->close();
	}	