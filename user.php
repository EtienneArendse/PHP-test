<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("database.php");

// queries setup

class User {
    
    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM customers WHERE deleted IS NULL");
    }

    public static function find_user_by_id($user_id) {
        global $database;
        $result_set = self::find_this_query("SELECT * FROM customers WHERE id = $user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }


    public static function delete_user($id, $date) {
        return self::find_this_query("UPDATE customers SET deleted='$date' WHERE id = $id");
    }

    public static function edit_user($id, $edited_name, $edited_surname, $edited_contact_number, $edited_email, $edited_sa_id_number, $edited_address) {
        return self::find_this_query("UPDATE customers SET name='$edited_name', surname='$edited_surname', contact_number='$edited_contact_number', email='$edited_email', sa_id_number='$edited_sa_id_number', address='$edited_address' WHERE id = $id");
    }

    public static function add_user($edited_name, $edited_surname, $edited_contact_number, $edited_email, $edited_sa_id_number, $edited_address) {
        return self::find_this_query("INSERT INTO customers (name, surname, contact_number, email, sa_id_number, address) VALUES ('$edited_name', '$edited_surname', '$edited_contact_number', '$edited_email', '$edited_sa_id_number', '$edited_address')");
    }
}



?>