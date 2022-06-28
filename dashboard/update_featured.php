<?php
//update_data.php
include '../dbh.php';
// $id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];
$text =  str_replace("'", "\'", $body);
$table = $_POST['table'];

if(isset($_POST['id'])) {
    $query = "UPDATE $table SET title='$title', body='$text' WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "Record Updated";
    }
}
mysqli_close($conn);
 ?>
