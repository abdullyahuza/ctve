<?php

if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
        header("Location: ../../error/");
        // Redirect::to('404');
        exit;
        # code...
    }
}

$name = $_FILES["table"]["name"];
$ext = strtolower(substr($name, strpos($name, ".") + 1));
$size = $_FILES["table"]["size"];
$maxsize = 100000000;
$allowed_ext = array('pdf','htm');
// var_dump($_SERVER['REQUEST_METHOD']);

if (isset($name)) {

    if (!empty($_FILES["table"]["name"])) {
        if (in_array($ext, $allowed_ext)) {

            $location = "../timetables/";
            $tmp_name = $_FILES["table"]["tmp_name"];


            if (move_uploaded_file($tmp_name,$location.$name)) {
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
