<?php
 //fetch.php
include '../dbh.php';

 $table = $_POST['table'];

 if(isset($_POST["id"]))
 {
      $query = "SELECT * FROM $table WHERE id = '".$_POST["id"]."'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 mysqli_close($conn);
 ?>
