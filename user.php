<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("database.php");

class User {
    
    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM customers");
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

    // public function update($user_id) {
    //     global $database;
    //     $result_set = self::find_this_query("UPDATE customers SET name WHERE id = $user_id LIMIT 1");
    //     $found_user = mysqli_fetch_assoc($result_set);
    //     return $found_user;
    // }
}



?>