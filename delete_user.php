<?php

// delete customer back-end functionality

include("user.php");

$id = $_GET['id'];

global $database;
$result_set = User::find_this_query("DELETE FROM customers WHERE id = $id");

if($result_set) {
    header('Location: http://localhost/index.php?delete=success');
}

?>