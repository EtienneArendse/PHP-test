<?php

// database setup

class mysql_database
{
    private $connection;

    function __construct() {
        $this->open_connection();
    }

    public function open_connection() {
        define('DB_SERVER', "192.168.1.2");
        define('DB_USER', "root");
        define('DB_PASS', "");
        define('DB_NAME', "etienne");

        $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if(mysqli_connect_errno()) {
            die("Database connection failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
            );
        }
    }

    public function close_connection() {
        if(isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    public function query($sql) {
        $result = mysqli_query($this->connection, $sql) or var_dump(mysqli_error($this->connection));
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result) {
        if (!$result) {
            die("Database query failed.");
        }
    }

    public function escape_value($string) {
        $escaped_string = mysqli_real_escape_string($this->connection, $string);
        return $escaped_string;
    }

    public function fetch_array($result_set)
    {
        return mysqli_fetch_all($result_set);
    }

    public function num_rows($result_set) {
        return mysqli_num_rows($result_set);
    }

    public function insert_id() {
        return mysqli_insert_id($this->connection);
    }

    public function affected_rows() {
        return mysqli_affected_rows($this->connection);
    }
}

$database = new mysql_database();

?>