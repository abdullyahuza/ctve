<?php include 'core/init.php'; ?>


<?php
    if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
        if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
            header("Location: error/");
            // Redirect::to('404');
            exit;
            # code...
        }
    }

    $db = DB::getInstance();

    $quicklinks = $db->get('quicklinks', array('id','=',1))->first();

    echo $quicklinks->body;
 ?>
