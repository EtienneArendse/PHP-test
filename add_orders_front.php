<?php
// add orders front-end functionality

include("orders_back.php");


if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result_set = orders::find_orders_by_id($id);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>

    <body>
        <form action="add_orders_back.php" method="POST">

            customer_id:<br>
            <input type="text" name="customer_id">
            <span class="error"> <?php if(!empty($_GET['customer_id'])) { echo "*" . $_GET['customer_id']; } ?></span>
            <br>
            rent_date:<br>
            <input type="date" name="rent_date">
            <span class="error"> <?php if(!empty($_GET['rent_date'])) { echo "* " . $_GET['rent_date']; } ?></span>
            <br>
            due_date:<br>
            <input type="date" name="due_date">
            <span class="error"> <?php if(!empty($_GET['due_date'])) { echo "* " . $_GET['due_date']; } ?></span>
            <br>
            actual_return_date:<br>
            <input type="date" name="actual_return_date">
            <span class="error"> <?php if(!empty($_GET['actual_return_date'])) { echo "* " . $_GET['actual_return_date']; } ?></span>
            <br>

            <input type="submit" value="Submit">

        </form>
    </body>

</html>