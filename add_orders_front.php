<?php
// add orders front-end functionality

include("orders_back.php");

if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result_set = orders::find_orders_by_id($id);
}




$result_set_users = mysqli_fetch_all(orders::find_all_users());
echo '<pre>';
var_dump($result_set_users);

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

            customer:<br>
            <input type="text" name="name">

            <select name="customer_id">
                <?php 
                    echo $result_set_users[0][0];
                    echo 'hi';
                    for ($x = 0; $x < count($result_set_users); $x++) { 
                ?>
                    <option value="<?php echo $result_set_users[$x][0];?>">
                    <?php echo $result_set_users[$x][1]; ?> <?php echo $result_set_users[$x][2]; ?>
                    </option>
                <?php } ?>
            </select>

            <span class="error"> <?php if(!empty($_GET['name'])) { echo "*" . $_GET['name']; } ?></span>
            <br>
            customer_surname:<br>
            <input type="text" name="surname">
            <span class="error"> <?php if(!empty($_GET['surname'])) { echo "*" . $_GET['surname']; } ?></span>
            <br>
            dvd_name:<br>
            <input type="text" name="name(1)">
            <span class="error"> <?php if(!empty($_GET['name(1)'])) { echo "*" . $_GET['name(1)']; } ?></span>
            <br>

            <input type="submit" value="Submit">

        </form>
    </body>

</html>