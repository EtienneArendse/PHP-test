<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("database.php");

// dvd queries setup

class DVD {

    public static function find_dvd_by_category_name() {
        return self::find_this_query("SELECT dvd.id, dvd.name, dvd.description, dvd.release_date, category.category_name FROM dvd INNER JOIN category ON dvd.category_id=category.id");
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

    public static function add_DVD($edited_name, $edited_description, $edited_release_date, $edited_category_id) {
        return self::find_this_query("INSERT INTO dvd (name, description, release_date, category_id) VALUES ('$edited_name', '$edited_description', '$edited_release_date', '$edited_category_id')");
    }

    public static function edit_DVD($id, $edited_name, $edited_description, $edited_release_date, $edited_category_id) {
        return self::find_this_query("UPDATE dvd SET name='$edited_name', description='$edited_description', release_date='$edited_release_date', category_id='$edited_category_id' WHERE id = $id");
    }
}
?>