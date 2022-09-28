<?php
include '../dbh.php';
if(isset($_POST['id'])) {
$table = $_POST['table'];

    if ($table != 'featured') {
        # code...
        $sql = "SELECT link FROM $table WHERE id = '".$_POST['id']."'";
        $sqlresult = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($sqlresult);
        $link = $row['link'];

        if(file_exists("../".$link)){
            unlink("../".$link);
        }
    }

    $query = "DELETE FROM $table WHERE id = '".$_POST['id']."'";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "Record Deleted";
    }

}
else{
    $dir = $_POST['dir'];
    $file = $_POST['filename'];
    if(file_exists("../".$file)){
        unlink("../".$file);
    }

}
?>
