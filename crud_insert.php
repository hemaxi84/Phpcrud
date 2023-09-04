<?php

require_once("crud_connect.php");
session_start();

$fname = $_POST['fname'];
$lname = $_POST['lname'];
if ($fname != "" || $lname != "") {

  if ($_SESSION['status'] == "insert") {

    $statement = $mysqli->prepare("insert into employee (firstname,lastname) values (?,?)");
    $result = $statement->bind_param("ss", $fname, $lname);

    if ($statement->execute()) {

      echo '<h1> inserted suceessfully</h1>';

      echo " <Button> <a href='./crud_view.php'> Click here to view records </a></Button> ";

      echo " <Button> <a href='./'> Click here to insert more </a></Button> ";
    } else {

      echo "cannot insert";
    }

  } else {

    echo '<h1> Bad request </h1>';

  }

}