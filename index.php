<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once("admin_content.php");

var_dump($row);
exit;

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
  <?php if(!empty($users)): ?>
  <?php foreach($users as $user): ?>
  <tr>
  <td>
  <?php
    echo $user[0];
  ?>
  </td>
  <td>
  <?php
    echo $user[1];
  ?>
  </td>
  <td>
  <?php
    echo $user[2];
  ?>
  </td>
  <td>
  <?php
    echo $user[3];
  ?>
  </td>
  <td>
  <?php
    echo $user[4];
  ?>
  </td>
  <td>
  <?php
    echo $user[5];
  ?>
  </td>
  <td>
  <?php
    echo $user[6];
  ?>
  </td>
  </tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
</body>
</html>