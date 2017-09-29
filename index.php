<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once("database.php");

if(isset($database)) { echo "true"; } else { echo "false"; }
echo "<br />";

echo "Is this working?";

?>