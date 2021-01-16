<?php
include 'connectDB.php';
session_start();
$msg = $_GET['msg'];
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$query = "INSERT INTO logs(username, user_id, msg) VALUES ('$username' ,$user_id,'$msg')";
$result = mysqli_query($connect, $query);
if ($result) {
    echo "success";
} else {
    echo 'failed';
}
