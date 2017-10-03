<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("database.php");

class User {
    
    public static function find_all_users() {
        global $database;
        $result_set = $database->query("SELECT * FROM customers");
        return $result_set;
    }

    // public function find_user_by_id($user_id) {
    //     global $database;
    //     $result_set = $database->query("SELECT * FROM customers WHERE id = $user_id");
    //     $found_user = mysqli_fetch_array($result_set);
    //     return $found_user;
    // }

    // public static function find_this_query() {
    //     return self::find_this_query($sql);
    // }
}



?>