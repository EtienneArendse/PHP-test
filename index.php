<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once("database.php");

$sql = "SELECT * FROM customers";
$result = $database->query($sql);
$found_user = $database->fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
<table style="width:100%">
  <tr>
    <th>id</th>
    <th>name</th> 
    <th>surname</th>
    <th>contact_no</th>
    <th>email</th>
    <th>sa_id_number</th>
    <th>address</th>
  </tr>
  <tr>
  <td>
  <?php
    echo $found_user['id'];
  ?>
  </td>
  <td>
  <?php
    echo $found_user['name'];
  ?>
  </td>
  <td>
  <?php
    echo $found_user['surname'];
  ?>
  </td>
  <td>
  <?php
    echo $found_user['contact_number'];
  ?>
  </td>
  <td>
  <?php
    echo $found_user['email'];
  ?>
  </td>
  <td>
  <?php
    echo $found_user['sa_id_number'];
  ?>
  </td>
  <td>
  <?php
    echo $found_user['address'];
  ?>
  </td>
  </tr>
</table>
</body>
</html>