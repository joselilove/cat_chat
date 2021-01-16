<?php

include 'connectDB.php';
$a = 0;
$myObj = new stdClass();
$result = mysqli_query($connect, "SELECT * FROM logs ORDER BY `logs`.`id` DESC");

while ($row = mysqli_fetch_array($result)) {
    $myObj->username[$a]  = $row["username"];
    $myObj->msg[$a]       = $row["msg"];
    $myObj->user_id[$a]   = $row["user_id"];
    $myObj->id[$a]          = $row["id"];
    $a++;
}
echo $myJSON = json_encode($myObj);
