<?php

var_dump($_POST);

// edit orders back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("orders_back.php");

if(!empty($_POST)) {
    $edit_validator = 0;

    if (empty($_POST['id'])){
        $edit_validator++;
    } else {
        $id = $_POST['id'];
    }

    if (empty($_POST['rent_date'])){
        $edit_validator++;
        $rent_dateErr = "rent_date is required";
    } else {
        $edited_due_date = date("Y-m-d");
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
        $edited_due_date = date("Y-m-d");
        $edited_actual_return_date = $_POST['actual_return_date'];
    }
    
    
    if (empty($_POST['customer_id'])){
        $edit_validator++;
        $customer_idErr = "customer_id is required";
    } else {
        $edited_customer_id = $_POST['customer_id'];
    }

    if (empty($_POST['dvd_id'])){
        $edit_validator++;
        $dvd_idErr = "dvd_id is required";
    } else {
        $edited_dvd_id = $_POST['dvd_id'];
    }


    if ($edit_validator > 0) {
        $blank_err = 'id=' . $id;
        $blank_err .= '&rent_date=' . $rent_dateErr;
        $blank_err .= '&due_date=' . $due_dateErr;
        $blank_err .= '&actual_return_date=' . $actual_return_dateErr;

        $blank_err .= '&customer_id=' . $customer_idErr;

        $blank_err .= '&dvd_id=' . $dvd_idErr;
        header('Location: http://localhost/edit_orders_front.php?' . $blank_err);

    } else {
        global $database;

        $result_set = orders::edit_orders($id, $edited_rent_date, $edited_due_date, $edited_actual_return_date, $edited_customer_id, $edited_dvd_id);

        if($result_set) {
            header('Location: http://localhost/orders.php?edit=success');
        }
        else {
            header('Location: http://localhost/edit_orders_front.php?edit=failed'); 
        }
    }

    
}
else {
    return error;
}

?>