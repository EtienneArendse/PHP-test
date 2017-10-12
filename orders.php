<?php

// orderss table front-end

ini_set('display_errors', 1);
error_reporting(~0);

include("orders_back.php");

$result_set = orders::find_all_orderss();

var_dump($result_set);

if (isset($_GET["update"]) && ($_GET["update"] == "success")) {
  echo "<script>
  alert('orders successfully updated');
  </script>";
}

if (isset($_GET["add"]) && ($_GET["add"] == "success")) {
  echo "<script>
  alert('orders successfully added');
  </script>";
}

if (isset($_GET["delete"]) && ($_GET["delete"] == "success")) {
  echo "<script>
  alert('orders successfully deleted from database');
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
        <th>customer_id</th> 
        <th>rent_date</th>
        <th>due_date</th>
        <th>actual_return_date</th>
        <th>actions</th>
      </tr>
      <?php if(!empty($result_set)): ?>
      <?php foreach($result_set as $orders): ?>
      <tr>
        <td>
          <?php
          echo $orders['id'];
          ?>
          </td>
        <td>
          <?php
          echo $orders['customer_id'];
          ?>
        </td>
        <td>
          <?php
          echo $orders['rent_date'];
          ?>
        </td>
        <td>
          <?php
          echo $orders['due_date'];
          ?>
        </td>
        <td>
          <?php
          echo $orders['actual_return_date'];
          ?>
        </td>
       
        <td>
        <form action="update_orders.php" method="get">
        <input type="hidden" name="id" value="<?php echo $orders['id']; ?>">
        <input type="submit" value="edit">
        </form>

        <form action="delete_orders.php" method="get">
        <input type="hidden" name="id" value="<?php echo $orders['id']; ?>">
        <input type="submit" value="delete">
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </table>

    <a href="add_orders_front.php" class="customerAnchor">Add orders</a>

    <br><br>

    <a href="index.php" class="customerAnchor">Customers</a>

  </body>
</html>