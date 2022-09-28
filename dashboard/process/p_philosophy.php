<?php
require_once '../../core/init.php';

if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
        header("Location: ../../error/");
        // Redirect::to('404');
        exit;
        # code...
    }
}
//check if it's a normal request
if (Input::exists()) {
    // validate all inputs
    $validate = new Validate();

    $validation = $validate->check($_POST, array(
        'Philosophy' => array(
            'required' => true,
            'min' => 30,
            'max' => 1000
        )
    ));

    //check validation
    if ($validation->passed()) {

        try {
            $conn = DB::getInstance()->update('pwv',1,array(
                'body' => Input::get('Philosophy')
            ));

            ?>
            <div class="alert alert-success" role="alert" id="alert">
              Philosophy Updated Successfully.
              <button type="button" class="close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
        } catch (Exception $e) {
            die(e.getMessage());
        }

    } else {
        foreach ($validation->errors() as $error) {
                        echo "<li>".$error, "</li>";
        }
    }

}




 ?>
