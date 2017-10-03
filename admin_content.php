<?php

ini_set('display_errors', 1);
error_reporting(~0);

include("user.php");

$result_set = User::find_all_users();

// $found_user = $user->find_user_by_id(3);

// echo $found_user['surname'];
?>