<?php
 	$username = $_POST['username'];
	$password = $_POST['password'];

include 'connectDB.php';
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);
if ($row != 0) {
	SESSION_START();
	$_SESSION['username'] = $row['username'];
	$_SESSION['user_id'] = $row['id']; 
	
	echo "WELCOME $username";
}
else{
	echo "Invalid Username or Password!";
}
?>