<?php
// edit customer back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("user.php");

if(!empty($_GET)) {
    $id = $_GET['id'];
    $edited_name = $_GET['name'];
    $edited_surname = $_GET['surname'];
    $edited_contact_number = $_GET['contact_number'];
    $edited_email = $_GET['email'];
    $edited_sa_id_number = $_GET['sa_id_number'];
    $edited_address = $_GET['address'];

    global $database;
    $result_set = User::find_this_query("UPDATE customers SET name='$edited_name', surname='$edited_surname', contact_number='$edited_contact_number', email='$edited_email', sa_id_number='$edited_sa_id_number', address='$edited_address' WHERE id = $id");

    if($result_set) {
        header('Location: http://localhost/index.php?update=success');
    }
    else {
        header('Location: http://localhost/update_user.php?update=failed'); 
    }
}
else {
    return error;
}

?>