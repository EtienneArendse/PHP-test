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
</head>

    <body>
        <form action="edit_user.php" method="get">

            name:<br>
            <input type="text" name="name" value="<?php echo $result_set['name']; ?>">
            <br>
            surname:<br>
            <input type="text" name="surname" value="<?php echo $result_set['surname']; ?>">
            <br>
            contact_number:<br>
            <input type="text" name="contact_number" value="<?php echo $result_set['contact_number']; ?>">
            <br>
            email:<br>
            <input type="text" name="email" value="<?php echo $result_set['email']; ?>">
            <br>
            sa_id_number:<br>
            <input type="text" name="sa_id_number" value="<?php echo $result_set['sa_id_number']; ?>">
            <br>
            address:<br>
            <input type="text" name="address" value="<?php echo $result_set['address']; ?>">
            <br><br>

            <input type="hidden" name="id" value="<?php echo $result_set['id']; ?>">
            
            <input type="submit" value="Submit">

        </form>
    </body>

</html>