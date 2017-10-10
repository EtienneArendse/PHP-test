<?php

// add DVD back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("dvd_queries.php");

if(!empty($_GET)) {
    $edit_validator = 0;

    if (empty($_GET['name'])){
        $edit_validator++;
        $nameErr = "Name is required";
    } else {
        $edited_name = $_GET['name'];
    }

    if (empty($_GET['description'])){
        $edit_validator++;
        $descriptionErr = "Description is required";
    } else {
        $edited_description = $_GET['description'];
    }
    
    if (empty($_GET['release_date'])){
        $edit_validator++;
        $release_dateErr = "Release date is required";
    } else {
        $edited_release_date = $_GET['release_date'];
    }

    if (empty($_GET['category'])){
        $edit_validator++;
        $categoryErr = "Category is required";
    } else {
        $edited_category = $_GET['category'];
    }
    
    if ($edit_validator > 0) {
        $blank_err = 'id=' . $id;
        $blank_err .= '&name=' . $nameErr;
        $blank_err .= '&description=' . $descriptionErr;
        $blank_err .= '&release_date=' . $release_dateErr;
        $blank_err .= '&category=' . $categoryErr;
        header('Location: http://localhost/add_dvd_front.php?' . $blank_err);

    } else {
        global $database;
        $result_set = DVD::add_DVD($edited_name, $edited_description, $edited_release_date, $edited_category);
        

        if($result_set) {
            header('Location: http://localhost/dvd.php?add=success');
        }
        else {
            header('Location: http://localhost/add_dvd_front.php?add=failed'); 
        }
    }

    
}
else {
    return error;
}

?>