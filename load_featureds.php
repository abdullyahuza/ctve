<?php include 'dbh.php'; ?>
<?php include 'core/classes/Redirect.php'; ?>


<?php
    if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
        if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
            header("Location: error/");
            // Redirect::to('404');
            exit;
            # code...
        }
    }

    $sql = "SELECT * FROM featured WHERE id = 2";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    echo json_encode($row);

    mysqli_close($conn);
 ?>
