<?php
//update_data.php
include '../dbh.php';
// $id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$text =  str_replace("'", "\'", $description);
$table = $_POST['table'];

if(isset($_POST['id'])) {
    $query = "UPDATE $table SET title='$title', description='$text' WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);
    if($result) {
        echo "Record Updated";
    }
}
mysqli_close($conn);
 ?>
