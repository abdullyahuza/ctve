<?php

if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
        header("Location: ../../../error/");
        // Redirect::to('404');
        exit;
        # code...
    }
}
$uname = $_POST['Name'];
$name = $_FILES["cv"]["name"];
$ext = strtolower(substr($name, strpos($name, ".") + 1));
$size = $_FILES["cv"]["size"];
$maxsize = 10000000;
$allowed_ext = array('pdf');
// var_dump($_SERVER['REQUEST_METHOD']);

if (isset($name)) {

    if (!empty($_FILES["cv"]["name"])) {
        if (in_array($ext, $allowed_ext)) {

            $location = "../../staff/".$uname."/";
            $rename = $uname.'.'.'pdf';

            $tmp_name = $_FILES["cv"]["tmp_name"];


            if (move_uploaded_file($tmp_name,$location.$rename)) {
                // include '../dbh.php';
                // $sql = "UPDATE users SET img = '$rename' WHERE username = '$uname'";
                // mysqli_query($conn,$sql);
                // mysqli_close($conn);
            ?>
            <div class="alert alert-success" role="alert" id="alert">
              Uploaded Successfully.
              <button type="button" class="close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            }
            else{
                echo "Error";
            }

        }
        else{
            echo "Invalid type";
        }

    }
    else{
        echo "Please select file";
    }

}
 ?>
