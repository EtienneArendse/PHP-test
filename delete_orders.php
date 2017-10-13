<?php

// delete orders back-end functionality

include("orders_back.php");

$id = $_GET['id'];

$date = date("Y-m-d H:i:s");

global $database;
$result_set = orders::delete_orders($id, $date);

if($result_set) {
    header('Location: http://localhost/orders.php?delete=success');
}

?>