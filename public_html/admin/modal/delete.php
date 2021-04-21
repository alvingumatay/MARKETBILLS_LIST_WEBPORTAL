<?php
	include('./includes/conn.php');
	$id=$_GET['img_id'];
	mysqli_query($conn,"delete from holiseason  where img_id='$id'");
	header('location:./dashboard.php');

?>