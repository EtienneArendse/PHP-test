<?php
// edit DVD front-end functionality

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
        <form action="edit_dvd_back.php" method="POST">

            name:<br>
            <input type="text" name="name">
            <span class="error"> <?php if(!empty($_POST['name'])) { echo "*" . $_POST['name']; } ?></span>
            <br>
            description:<br>
            <input type="text" name="description">
            <span class="error"> <?php if(!empty($_POST['description'])) { echo "* " . $_POST['description']; } ?></span>
            <br>
            release_date:<br>
            <input type="date" name="release_date">
            <span class="error"> <?php if(!empty($_POST['release_date'])) { echo "* " . $_POST['release_date']; } ?></span>
            <br>
            category_id:<br>
            
                <select name="category_name">
                    <option value="1">Comedy</option>
                    <option value="2">Action</option>
                    <option value="3">Adventure</option>
                    <option value="4">Horror</option>
                    <option value="5">Family</option>
                </select>

            <span class="error"> <?php if(!empty($_POST['category_id'])) { echo "* " . $_POST['category_id']; } ?></span>
            <br>
            <br><br>

            <input type="hidden" name="id" value="<?php echo $result_set['id']; ?>">

            <input type="submit" value="Submit">

        </form>
    </body>

</html>