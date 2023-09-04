 <?php

require_once("crud_connect.php");
session_start();

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $id=$_GET['id'];
  if ($fname != "" || $lname != "") {
   

  if ($_SESSION['status'] == "update") {

      $sql="update employee set firstname='$fname',lastname='$lname' where id = $id";

      if ($mysqli->query($sql)) {

        echo '<h1> updated suceessfully</h1>';
        echo " <Button> <a href='./crud_view.php'> Click here to view records </a></Button> ";


      } else {
        echo "cannot  update";
      }

    }
  }

else{
  echo '<h1> Bad request </h1>';

}

?> 
