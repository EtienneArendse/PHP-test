<?php

var_dump($_POST);

// edit DVD back-end functionality

ini_set('display_errors', 1);
error_reporting(~0);

include("dvd_queries.php");

if(!empty($_POST)) {
    $edit_validator = 0;

    if (empty($_POST['id'])){
        $edit_validator++;
    } else {
        $id = $_POST['id'];
    }

    if (empty($_POST['name'])){
        $edit_validator++;
        $nameErr = "Name is required";
    } else {
        $edited_name = $_POST['name'];
    }

    if (empty($_POST['description'])){
        $edit_validator++;
        $descriptionErr = "Description is required";
    } else {
        $edited_description = $_POST['description'];
    }
    
    if (empty($_POST['release_date'])){
        $edit_validator++;
        $release_dateErr = "Release date is required";
    } else {
        $edited_release_date = date("Y-m-d");
        $edited_release_date = $_POST['release_date'];
    }

    if (empty($_POST['category_name'])){
        $edit_validator++;
        $category_nameErr = "Category name is required";
    } else {
        $edited_category_name = $_POST['category_name'];
    }
    
    if ($edit_validator > 0) {
        $blank_err = 'id=' . $id;
        $blank_err .= '&name=' . $nameErr;
        $blank_err .= '&description=' . $descriptionErr;
        $blank_err .= '&release_date=' . $release_dateErr;
        $blank_err .= '&category_id=' . $category_nameErr;
        header('Location: http://localhost/edit_dvd_front.php?' . $blank_err);

    } else {
        global $database;
        $result_set = DVD::edit_DVD($id, $edited_name, $edited_description, $edited_release_date, $edited_category_name);
        
        if($result_set) {
            header('Location: http://localhost/dvd.php?edit=success');
        }
        else {
            header('Location: http://localhost/edit_dvd_front.php?edit=failed'); 
        }
    }

    
}
else {
    return error;
}

?>