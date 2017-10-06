<?php
// edit customer front-end functionality

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
        <form action="edit_user.php" method="get">

            name:<br>
            <input type="text" name="name" value="<?php echo $result_set['name']; ?>">
            <span class="error">* <?php if(!empty($_GET['name'])) { echo $_GET['name']; } ?></span>
            <br>
            surname:<br>
            <input type="text" name="surname" value="<?php echo $result_set['surname']; ?>">
            <span class="error">* <?php if(!empty($_GET['surname'])) { echo $_GET['surname']; } ?></span>
            <br>
            contact_number:<br>
            <input type="text" name="contact_number" value="<?php echo $result_set['contact_number']; ?>">
            <span class="error">* <?php if(!empty($_GET['contact_number'])) { echo $_GET['contact_number']; } ?></span>
            <br>
            email:<br>
            <input type="text" name="email" value="<?php echo $result_set['email']; ?>">
            <span class="error">* <?php if(!empty($_GET['email'])) { echo $_GET['email']; } ?></span>
            <br>
            sa_id_number:<br>
            <input type="text" name="sa_id_number" value="<?php echo $result_set['sa_id_number']; ?>">
            <span class="error">* <?php if(!empty($_GET['sa_id_number'])) { echo $_GET['sa_id_number']; } ?></span>
            <br>
            address:<br>
            <input type="text" name="address" value="<?php echo $result_set['address']; ?>">
            <span class="error">* <?php if(!empty($_GET['address'])) { echo $_GET['address']; } ?></span>
            <br><br>

            <input type="hidden" name="id" value="<?php echo $result_set['id']; ?>">
            
            <input type="submit" value="Submit">

        </form>
    </body>

</html>