<?php 
	include 'connectDB.php';
	session_start();
	$username = $_SESSION['username'];
	$id = $_SESSION['user_id'];

	$query="UPDATE `user` SET `typing` = 'no' WHERE `user`.`id` = $id;";
	$result = mysqli_query($connect, $query);
	echo $result;
?>