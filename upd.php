<?php
session_start();
	$image_dir = "img/";
	$image_name = $image_dir . basename($_FILES['ava']['name']);

	$upload = move_uploaded_file($_FILES['ava']['tmp_name'], $image_name);
	$con = mysqli_connect('127.0.0.1', 'root', '' , 'lesson40');
	$text_query = "UPDATE users SET avatar = '".$image_name."' WHERE id = '{$_SESSION["id"]}' ";
	if ($upload == true) {
		$query = mysqli_query($con, $text_query);
	}
	
	header('location: account.php')

 ?>