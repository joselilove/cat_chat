<?php
include 'connectDB.php';

$username = $_POST['username'];
$password = $_POST['username'];

$query = "INSERT INTO user(username, password, typing) VALUES ('$username','$password', 'no')";
$result = mysqli_query($connect, $query);
if ($result) {
    echo "You have been successfully subscribed.";
} else {
    echo 'Username already exist!.';
}
