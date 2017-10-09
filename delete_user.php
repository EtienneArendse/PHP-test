<?php

// delete customer back-end functionality

include("user.php");

$id = $_GET['id'];

$date = date("Y-m-d H:i:s");

global $database;
$result_set = User::delete_user($id, $date);

if($result_set) {
    header('Location: http://localhost/index.php?delete=success');
}

?>