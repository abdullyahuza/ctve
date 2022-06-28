<?php
include '../dbh.php';
include 'functions/func.php';

if(isset($_POST['id'])) {
    $table = $_POST['table'];

    $sql = "SELECT username FROM $table WHERE id = '".$_POST['id']."'";
    $sqlresult = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($sqlresult);
    $username = $row['username'];

    if(file_exists("../staff/".$username)){
        deleteDir("../staff/".$username);

        if (file_exists("../staff/pimg/".$username.".jpg")) {
            unlink("../staff/pimg/".$username.".jpg");
        }
    }

    $query = "DELETE FROM $table WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "User Deleted";
    }

}

?>
