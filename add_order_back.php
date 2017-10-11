<?php

var_dump($_POST);

// add order back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("order_back.php");

if(!empty($_POST)) {
    $edit_validator = 0;

    if (empty($_POST['customer_ID'])){
        $edit_validator++;
        $customer_IDErr = "Customer_ID is required";
    } else {
        $edited_customer_ID = $_POST['customer_ID'];
    }

    if (empty($_POST['rent_date'])){
        $edit_validator++;
        $rent_dateErr = "rent_date is required";
    } else {
        $edited_rent_date = $_POST['rent_date'];
    }
    
    if (empty($_POST['due_date'])){
        $edit_validator++;
        $due_dateErr = "due_date is required";
    } else {
        $edited_due_date = date("Y-m-d");
        $edited_due_date = $_POST['due_date'];
    }

    if (empty($_POST['actual_return_date'])){
        $edit_validator++;
        $category_actual_return_date = "actual_return_date is required";
    } else {
        $edited_actual_return_date = $_POST['actual_return_date'];
    }
    
    if ($edit_validator > 0) {
        $blank_err = 'id=' . $id;
        $blank_err .= '&customer_ID=' . $customer_IDErr;
        $blank_err .= '&rent_date=' . $rent_dateErr;
        $blank_err .= '&due_date=' . $due_dateErr;
        $blank_err .= '&actual_return_date=' . $actual_return_dateErr;
        header('Location: http://localhost/add_order_front.php?' . $blank_err);

    } else {
        global $database;
        $result_set = Order::add_order($id, $customer_id, $rent_date, $due_date, $actual_return_date);
        
        if($result_set) {
            header('Location: http://localhost/order.php?add=success');
        }
        else {
            header('Location: http://localhost/add_order_front.php?add=failed'); 
        }
    }

    
}
else {
    return error;
}

?>