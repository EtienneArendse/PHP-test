<?php

// var_dump($_POST);

// add orders back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("orders_back.php");

if(!empty($_POST)) {
    $edit_validator = 0;

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
    
    
    if (empty($_POST['name'])){
        $edit_validator++;
        $customer_nameErr = "name is required";
    } else {
        $edited_customer_name = $_POST['name'];
    }

    if (empty($_POST['surname'])){
        $edit_validator++;
        $customer_surnameErr = "surname is required";
    } else {
        $edited_customer_surname = $_POST['surname'];
    }

    if (empty($_POST['name(1)'])){
        $edit_validator++;
        $dvd_nameErr = "name(1) is required";
    } else {
        $edited_dvd_name = $_POST['name(1)'];
    }

    if ($edit_validator > 0) {
        $blank_err = 'id=' . $id;
        $blank_err .= '&rent_date=' . $rent_dateErr;
        $blank_err .= '&due_date=' . $due_dateErr;
        $blank_err .= '&actual_return_date=' . $actual_return_dateErr;

        $blank_err .= '&name=' . $customer_nameErr;
        $blank_err .= '&surname=' . $customer_surnameErr;
        $blank_err .= '&name(1)=' . $dvd_nameErr;
        header('Location: http://localhost/add_orders_front.php?' . $blank_err);

    } else {
        global $database;
        $result_set = orders::add_orders($edited_rent_date, $edited_due_date, $edited_actual_return_date, $edited_customer_name, $edited_customer_surname, $edited_dvd_name);
        
        if($result_set) {
            header('Location: http://localhost/orders.php?add=success');
        }
        else {
            header('Location: http://localhost/add_orders_front.php?add=failed'); 
        }
    }

    
}
else {
    return error;
}

?>