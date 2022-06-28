<?php
// include '../../dbh.php';

//Redirect
function redirect($url) {
    ob_start();
    header('Location:' .$url);
    ob_end_flush();
    die();
}

function rowCount($table){

    $conn = mysqli_connect('localhost','root','','kadpoly_ctve');
    $result = mysqli_query($conn, "SELECT * FROM $table");
    $rows = mysqli_num_rows($result);
    mysqli_close($conn);

    return $rows;
}

function deleteDir($src){
    $dir = opendir($src);

    while (false !== ($file=readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src.'/'.$file)) {
                deleteDir($src.'/'.$file);
            }
            else{
                unlink($src.'/'.$file);
            }
        }
    }
    closedir($dir);
    rmdir($src);

}
 ?>
