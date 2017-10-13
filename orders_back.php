<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("database.php");

// orders queries setup

class orders {
    
    // public static function find_all_users() {
    //     return self::find_this_query("SELECT * FROM customers WHERE deleted IS NULL");
    // }

    public static function find_all_orderss() {
        return self::find_this_query(
            "SELECT orders.id, orders.rent_date, orders.due_date, orders.actual_return_date, dvd_orders.dvd_id, customers.name, customers.surname, dvd.name dvd_name
            FROM orders 
            INNER JOIN dvd_orders ON orders.id = dvd_orders.orders_id
            INNER JOIN customers ON orders.customer_id = customers.id
            INNER JOIN dvd ON dvd_orders.dvd_id = dvd.id
            ");
    }

    public static function find_orders_by_id($orders_id) {
        global $database;
        $result_set = self::find_this_query("SELECT * FROM orders WHERE id = $orders_id LIMIT 1");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }

    // public static function delete_user($id, $date) {
    //     return self::find_this_query("UPDATE customers SET deleted='$date' WHERE id = $id");
    // }

    // public static function edit_user($id, $edited_name, $edited_surname, $edited_contact_number, $edited_email, $edited_sa_id_number, $edited_address) {
    //     return self::find_this_query("UPDATE customers SET name='$edited_name', surname='$edited_surname', contact_number='$edited_contact_number', email='$edited_email', sa_id_number='$edited_sa_id_number', address='$edited_address' WHERE id = $id");
    // }

    public static function add_orders($edited_rent_date, $edited_due_date, $edited_actual_return_date, $edited_customer_id, $edited_dvd_id) {
        $result1 = self::find_this_query("INSERT INTO orders (id, customer_id, rent_date, due_date, actual_return_date) VALUES (NULL, '$edited_customer_id', '$edited_rent_date', '$edited_due_date', '$edited_actual_return_date');");


        $result2 = self::find_this_query("INSERT INTO dvd_orders (dvd_id, orders_id) VALUES ('$edited_dvd_id', LAST_INSERT_ID());");

        return ($result1 && $result2);
    }


    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM customers WHERE deleted IS NULL");
    }


    public static function find_dvd_by_category_name() {
        return self::find_this_query("SELECT dvd.id, dvd.name, dvd.description, dvd.release_date, category.category_name FROM dvd INNER JOIN category ON dvd.category_id=category.id WHERE deleted IS NULL");
    }
}

?>