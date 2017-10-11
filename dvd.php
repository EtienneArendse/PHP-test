<?php

// dvds table front-end

ini_set('display_errors', 1);
error_reporting(~0);

include("dvd_queries.php");

$result_set = DVD::find_dvd_by_category_name();

?>


<!DOCTYPE html>
<html>
  <head>
    <style>
      .dvdAnchor:link    {color:orange;}
      .dvdAnchor:visited {color:green;}
      .dvdAnchor:hover   {color:yellow;}
      .dvdAnchor:active  {color:red;}
    </style>
  </head>

  <body>
    <table style="width:100%">
      <tr>
        <th>id</th>
        <th>name</th> 
        <th>description</th>
        <th>release_date</th>
        <th>category_name</th>
        <th>actions</th>
      </tr>
      <?php if(!empty($result_set)): ?>
      <?php foreach($result_set as $dvd): ?>
      <tr>
        <td>
          <?php
          echo $dvd['id'];
          ?>
          </td>
        <td>
          <?php
          echo $dvd['name'];
          ?>
        </td>
        <td>
          <?php
          echo $dvd['description'];
          ?>
        </td>
        <td>
          <?php
          echo $dvd['release_date'];
          ?>
        </td>
        <td>
          <?php
          echo $dvd['category_name'];
          ?>
        </td>

        <td>
        <form action="edit_dvd_front.php" method="get">
        <input type="hidden" name="id" value="<?php echo $dvd['id']; ?>">
        <input type="submit" value="edit">
        </form>

        <form action="delete_dvd.php" method="get">
        <input type="hidden" name="id" value="<?php echo $dvd['id']; ?>">
        <input type="submit" value="delete">
        </form>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php endif; ?>
    </table>

    <a href="add_dvd_front.php" class="dvdAnchor">Add DVD</a>

    <br><br>

    <a href="index.php" class="customerAnchor">Customers</a>

  </body>
</html>