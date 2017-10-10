<?php
// add DVD front-end functionality

include("dvd_queries.php");


if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $result_set = DVD::find_DVD_by_id($id);
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
        <form action="add_dvd_back.php" method="get">

            name:<br>
            <input type="text" name="name">
            <span class="error"> <?php if(!empty($_GET['name'])) { echo "*" . $_GET['name']; } ?></span>
            <br>
            description:<br>
            <input type="text" name="description">
            <span class="error"> <?php if(!empty($_GET['description'])) { echo "* " . $_GET['description']; } ?></span>
            <br>
            release_date:<br>
            <input type="text" name="release_date">
            <span class="error"> <?php if(!empty($_GET['release_date'])) { echo "* " . $_GET['release_date']; } ?></span>
            <br>
            category:<br>
            <input type="text" name="category">
            <span class="error"> <?php if(!empty($_GET['category'])) { echo "* " . $_GET['category']; } ?></span>
            <br>

            <input type="submit" value="Submit">

        </form>
    </body>

</html>