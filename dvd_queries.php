<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("database.php");

// dvd queries setup

class DVD {
    public static function find_all_DVDs() {
        return self::find_this_query("SELECT * FROM dvd");
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }

    public static function find_DVD_by_id($dvd_id) {
        global $database;
        $result_set = self::find_this_query("SELECT * FROM dvd WHERE id = $dvd_id LIMIT 1");
        $found_dvd = mysqli_fetch_array($result_set);
        return $found_dvd;
    }

    public static function add_DVD($edited_name, $edited_description, $edited_release_date, $edited_category) {
        return self::find_this_query("INSERT INTO dvd (name, description, release_date, category) VALUES ('$edited_name', '$edited_description', '$edited_release_date', '$edited_category')");
    }
}
?>