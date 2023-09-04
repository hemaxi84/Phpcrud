<?php

session_start();

require_once("crud_connect.php");

if (isset($_GET['status']) && $_GET['status'] == "update") {

    $_SESSION['status'] = "update";
    $id = $_GET['id'];
    $sql = "select *  from employee where id=" . $id;
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
}
else {
  $_SESSION['status'] = "insert";
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div style="margin:100px">
    <h4> enter records to insert / update </h4>
    <form action="
    <?php
    if ($_SESSION['status'] == "update") {
      echo 'crud_update.php?id=' . $id;
    } else {
      echo 'crud_insert.php';
    } ?>" method="post">

      <label>
        First Name:
      </label>
      <input name="fname" type="text" required value="<?php if ($_SESSION['status'] == "update") {
        echo $row['firstname'];
      } ?>" />
      <label>
        last Name:
      </label>
      <input name="lname" type="text" required value="<?php if ($_SESSION['status'] == "update") {
        echo $row['lastname'];
      } ?>" />
      <input name="submit" type="submit" value="submit">
    </form>
  </div>
  <Button> <a href='/crud_view.php'> Click here to view records </a></Button>
</body>

</html>


