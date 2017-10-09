<?php

// add customer back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("user.php");

if(!empty($_GET)) {
    $edit_validator = 0;

    if (empty($_GET['name'])){
        $edit_validator++;
        $nameErr = "Name is required";
    } else {
        $edited_name = ucfirst(trim($_GET['name']));
    }

    if (empty($_GET['surname'])){
        $edit_validator++;
        $surnameErr = "Surname is required";
    } else {
        $edited_surname = ucfirst(trim($_GET['surname']));
    }
    
    if (empty($_GET['contact_number'])){
        $edit_validator++;
        $contact_numberErr = "Contact number is required";
    } else {
        $edited_contact_number = $_GET['contact_number'];
    }

    if (empty($_GET['email'])){
        $edit_validator++;
        $emailErr = "Email is required";
    } else {
        $edited_email = trim($_GET['email']);
    }
    
    if (empty($_GET['sa_id_number'])){
        $edit_validator++;
        $sa_id_numberErr = "RSA ID number is required";
    } else {
        $edited_sa_id_number = trim($_GET['sa_id_number']);
    }
    
    if (empty($_GET['address'])){
        $edit_validator++;
        $addressErr = "Address is required";
    } else {
        $edited_address = $_GET['address'];
    }

    if ($edit_validator > 0) {
        $blank_err = 'id=' . $id;
        $blank_err .= '&name=' . $nameErr;
        $blank_err .= '&surname=' . $surnameErr;
        $blank_err .= '&contact_number=' . $contact_numberErr;
        $blank_err .= '&email=' . $emailErr;
        $blank_err .= '&sa_id_number=' . $sa_id_numberErr;
        $blank_err .= '&address=' . $addressErr;
        header('Location: http://localhost/add_user_front.php?' . $blank_err);

    } else {
        global $database;
        $result_set = User::add_user($edited_name, $edited_surname, $edited_contact_number, $edited_email, $edited_sa_id_number, $edited_address);
        

        if($result_set) {
            header('Location: http://localhost/index.php?add=success');
        }
        else {
            header('Location: http://localhost/add_user_front.php?add=failed'); 
        }
    }

    
}
else {
    return error;
}

?>