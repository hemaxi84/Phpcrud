<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="crud_css.css">
</head>

<body>
  <div style="margin:100px">
    <div>
      <?php
      require_once("crud_connect.php");
      session_start();
      ?>

    </div>
    <table border=1>
      <tr>
        <th> id </th>
        <th> First Name </th>
        <th> Last Name </th>
      </tr>
      <?php


      $_SESSION['status'] = "view";
      $sql = "select * from employee";


      $result = $mysqli->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          $id = $row['id'];
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['firstname'] . "</td>";
          echo "<td>" . $row['lastname'] . "</td>";
          echo "<td>" . " <a href='index.php?id=" . $row['id'] . "&status=update'> <button name='edit' id=" . $id . "> edit </button> </a>" . "</td>";
          echo "<td>" . "<button name='delete' id=" . $id . "> <a href='crud_delete.php?id=" . $row['id'] . "&status=delete'>delete</a>
           </button>" . "</td>";
          echo "</tr>";

        }
      }

      ?>
    </table>

    <br />
    <Button> <a href='./index.php'> Click here to insert records </a></Button>


  </div>

</body>

</html>