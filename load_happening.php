<?php include 'dbh.php'; ?>
<?php include 'dashboard/classes/Redirect.php'; ?>


<?php
    if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
        if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
            header("Location: error/");
            // Redirect::to('404');
            exit;
            # code...
        }
    }

    $sql = "SELECT body FROM happening WHERE id=1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['body'];
    mysqli_close($conn);
 ?>
