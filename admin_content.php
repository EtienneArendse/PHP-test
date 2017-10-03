<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("user.php");

$user = new User();

$result_set = $user->find_all_users();

while($row = mysqli_fetch_array($result_set)) {
    echo $row[0] . "<br>";
    echo $row[1] . "<br>";
    echo $row[2] . "<br>";
    echo $row[3] . "<br>";
    echo $row[4] . "<br>";
    echo $row[5] . "<br>";
    echo $row[6] . "<br>";
}
?>