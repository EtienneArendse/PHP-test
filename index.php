<?php

ini_set('display_errors', 1);
error_reporting(~0);

require_once("admin_content.php");

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
  <?php if(!empty($result_set)): ?>
  <?php foreach($result_set as $user): ?>
  <tr>
  <td>
  <?php
    echo $user['id'];
  ?>
  </td>
  <td>
  <?php
    echo $user['name'];
  ?>
  </td>
  <td>
  <?php
    echo $user['surname'];
  ?>
  </td>
  <td>
  <?php
    echo $user['contact_number'];
  ?>
  </td>
  <td>
  <?php
    echo $user['email'];
  ?>
  </td>
  <td>
  <?php
    echo $user['sa_id_number'];
  ?>
  </td>
  <td>
  <?php
    echo $user['address'];
  ?>
  </td>
  </tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
</body>
</html>