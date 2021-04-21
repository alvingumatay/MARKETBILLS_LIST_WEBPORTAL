<?php
 $conn = new mysqli("localhost","root","","egrocery_list") or die(mysqli_error());
 $msg="Deleted Successfully..";
$conn->query("DELETE FROM `planbill` WHERE `id` = '$_GET[id]'") or die(mysqli_error());
header("location:../user_manager/eGrocer-List.php");
	


	?>
	
	 
		