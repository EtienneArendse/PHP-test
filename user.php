<?php

include("database.php");

class User {
    public function find_all_users() {
        global $database;

        $result_set = $database->query("SELECT * FROM customers");
        return $result_set;
    }
}



?>