<?php

// customers table front-end

ini_set('display_errors', 1);
error_reporting(~0);

include("user.php");

$result_set = User::find_all_users();

// $found_user = User::find_user_by_id(3);
// echo $found_user['surname'];

// require_once("admin_content.php");

if (isset($_GET["update"]) && ($_GET["update"] == "success")) {
  echo "<script>
  alert('Customer successfully updated');
  </script>";
}

if (isset($_GET["add"]) && ($_GET["add"] == "success")) {
  echo "<script>
  alert('Customer successfully added');
  </script>";
}

if (isset($_GET["delete"]) && ($_GET["delete"] == "success")) {
  echo "<script>
  alert('Customer successfully deleted from database');
  </script>";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      .customerAnchor:link    {color:orange;}
      .customerAnchor:visited {color:green;}
      .customerAnchor:hover   {color:yellow;}
      .customerAnchor:active  {color:red;}
    </style>
  </head>

  <body>
    <table style="width:100%">
      <tr>
        <th>id</th>
        <th>name</th> 
        <th>surname</th>
        <th>contact_number</th>
        <th>email</th>
        <th>sa_id_number</th>
        <th>address</th>
        <th>actions</th>
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
        <td>
        <form action="update_user.php" method="get">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="submit" value="edit">
        </form>

        <form action="delete_user.php" method="get">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="submit" value="delete">
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </table>

    <a href="add_user_front.php" class="customerAnchor">Add Customer</a>

    <br><br>

    <a href="dvd.php" class="customerAnchor">DVDs</a>

    <br><br>

    <a href="orders.php" class="customerAnchor">Orders</a>

  </body>
</html>