<?php
require_once 'core/init.php';
//update_data.php
include '../dbh.php';
// $id = $_POST['id'];

$password = Hash::make_hash($_POST['password']);
$table = $_POST['table'];

if(isset($_POST['id'])) {
    $query = "UPDATE $table SET password='$password' WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "Record Updated";
    }
}
mysqli_close($conn);
 ?>
