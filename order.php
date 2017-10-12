<?php

// orders table front-end

ini_set('display_errors', 1);
error_reporting(~0);

include("order_back.php");

$result_set = Order::find_all_orders();


if (isset($_GET["update"]) && ($_GET["update"] == "success")) {
  echo "<script>
  alert('Order successfully updated');
  </script>";
}

if (isset($_GET["add"]) && ($_GET["add"] == "success")) {
  echo "<script>
  alert('Order successfully added');
  </script>";
}

if (isset($_GET["delete"]) && ($_GET["delete"] == "success")) {
  echo "<script>
  alert('Order successfully deleted from database');
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
      <?php foreach($result_set as $order): ?>
      <tr>
        <td>
          <?php
          echo $order['id'];
          ?>
          </td>
        <td>
          <?php
          echo $order['customer_id'];
          ?>
        </td>
        <td>
          <?php
          echo $order['rent_date'];
          ?>
        </td>
        <td>
          <?php
          echo $order['due_date'];
          ?>
        </td>
        <td>
          <?php
          echo $order['actual_return_date'];
          ?>
        </td>
       
        <td>
        <form action="update_order.php" method="get">
        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
        <input type="submit" value="edit">
        </form>

        <form action="delete_order.php" method="get">
        <input type="hidden" name="id" value="<?php echo $order['id']; ?>">
        <input type="submit" value="delete">
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </table>

    <a href="add_order_front.php" class="customerAnchor">Add Order</a>

    <br><br>

    <a href="index.php" class="customerAnchor">Customers</a>

  </body>
</html>