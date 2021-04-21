<?php 

 include "../includes/database.php";

 if(isset($_POST['submit'])){
 	$user = mysqli_real_escape_string($con, $_POST['user']);
 	$message = mysqli_real_escape_string($con, $_POST['message']);
 	date_default_timezone_set('Asia/Manila');
 	$time = date('h:i:s a', time());


    if(!isset($user)||$user == '' || !isset($message)||$message == ''){
    	$error = "Please fill in your Name or message";
    	header("Location: dashboard.php?error=".urlencode($error));
    	exit();
    }
 	$query = "INSERT INTO messenger (user, message, time) VALUES('$user', '$message', '$time')";



 	if(!mysqli_query($con, $query)){
 		die('Error: '.mysqli_error($con));
 	}else{
      header("Location: dashboard.php");
    }
   }
 

?>