<?php

include 'connectDB.php';
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['user_id'];

$result = mysqli_query($connect,"SELECT * FROM user");

while($row = mysqli_fetch_array($result)) {
	if($row['username'] != $username){
		if($row['typing'] == 'yes'){
			echo 'yes';
			break;
		}else{
			echo 'no';
			break;
		}
	}
}
?>