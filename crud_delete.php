<?php

require_once("crud_connect.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "GET") {

  $id = $_GET['id'];

  $sql = "delete from employee where id=" . $id;

  if ($mysqli->query($sql)) {
    header("Location: crud_view.php");
  } else {
    echo " record not deleted";
  }

}

?>