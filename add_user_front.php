<?php
// add customer front-end functionality

include("user.php");


if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result_set = User::find_user_by_id($id);
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
        <form action="add_user_back.php" method="get">

            name:<br>
            <input type="text" name="name">
            <span class="error"> <?php if(!empty($_GET['name'])) { echo "*" . $_GET['name']; } ?></span>
            <br>
            surname:<br>
            <input type="text" name="surname">
            <span class="error"> <?php if(!empty($_GET['surname'])) { echo "* " . $_GET['surname']; } ?></span>
            <br>
            contact_number:<br>
            <input type="text" name="contact_number">
            <span class="error"> <?php if(!empty($_GET['contact_number'])) { echo "* " . $_GET['contact_number']; } ?></span>
            <br>
            email:<br>
            <input type="text" name="email">
            <span class="error"> <?php if(!empty($_GET['email'])) { echo "* " . $_GET['email']; } ?></span>
            <br>
            sa_id_number:<br>
            <input type="text" name="sa_id_number">
            <span class="error"> <?php if(!empty($_GET['sa_id_number'])) { echo "* " . $_GET['sa_id_number']; } ?></span>
            <br>
            address:<br>
            <input type="text" name="address">
            <span class="error"> <?php if(!empty($_GET['address'])) { echo "* " . $_GET['address']; } ?></span>
            <br><br>
            
            <input type="submit" value="Submit">

        </form>
    </body>

</html>