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
        'Title' => array(
            'required' => true,
            'min' => 5,
            'max' => 100
        ),
        'Download' => array(
            'required' => true,
            'min' => 5,
            'max' => 500
        )
    ));

    //check validation
    if ($validation->passed()) {

        try {
            $conn = DB::getInstance()->insert('downloads',array(
                'link' => Input::get('Download'),
                'title' => Input::get('Title')
            ));

            ?>
            <div class="alert alert-success" role="alert" id="alert">
              Download Added Successfully.
              <button type="button" class="close">
                  <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
        } catch (Exception $e) {
            die(e.getMessage());
        }

    } else {
        /*foreach ($validation->errors() as $error) {
                        echo "<li>".$error, " link</li>";
        }*/
        for ($i=0; $i < count($validation->errors()) ; $i++) {

            if ($validation->errors()[$i] == 'Title is required') {
                # code.
                echo "<li>title is required</li>";
            }
            if ($validation->errors()[$i] == 'Download is required') {
                # code.
                echo "<li>link is required</li>";
            }
            if ($validation->errors()[$i] == 'Title must be a minimum of 5 characters') {
                # code.
                echo "<li>Title must be a minimum of 5 characters</li>";
            }
            if ($validation->errors()[$i] == 'Download must be a minimum of 15 characters') {
                # code.
                echo "<li>Filename must be a minimum of 15 characters</li>";
            }
        }
    }

}




 ?>
