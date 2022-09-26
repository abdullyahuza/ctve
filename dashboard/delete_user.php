<?php
include '../dbh.php';
include '../core/functions/func.php';

if(isset($_POST['id'])) {
    $table = $_POST['table'];

    $sql = "SELECT username FROM $table WHERE id = '".$_POST['id']."'";
    $sqlresult = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($sqlresult);
    $username = $row['username'];

    if(file_exists("../staff/".$username)){
        deleteDir("../staff/".$username);

        if (file_exists("../staff/pimg/".$username.".JPG")) {
            unlink("../staff/pimg/".$username.".JPG");
        }
    }

    $query = "DELETE FROM $table WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "User Deleted";
    }

}

?>
