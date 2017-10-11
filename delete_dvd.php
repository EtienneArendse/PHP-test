<?php

// delete dvd back-end functionality

include("dvd_queries.php");

$id = $_GET['id'];

$date = date("Y-m-d H:i:s");

global $database;
$result_set = DVD::delete_DVD($id, $date);

if($result_set) {
    header('Location: http://localhost/dvd.php?delete=success');
}

?>