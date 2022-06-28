<?php
//update_data.php
include '../dbh.php';
// $id = $_POST['id'];
$title = $_POST['title'];
$link = $_POST['link'];
$table = $_POST['table'];

if(isset($_POST['id'])) {
    $query = "UPDATE $table SET title='$title', link='$link' WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "Record Updated";
    }
}
mysqli_close($conn);
 ?>
