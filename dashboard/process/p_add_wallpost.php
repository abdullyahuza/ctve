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
    //check token
    // if (Token::check(Input::get('token'))) {
        // validate all inputs
        $validate = new Validate();

        $validation = $validate->check($_POST, array(
            'Date' => array(
                'required' => true,
                'min' => 3,
                'max' => 20
            ),
            'Title' => array(
                'required' => true,
                'min' => 5,
                'max' => 50
            ),
            'Link' => array(
                'required' => true,
                'min' => 5,
                'max' => 50
            ),
            'Description' => array(
                'required' => true,
                'min' => 10,
                'max' => 100
            )
        ));

        //check validation
        if ($validation->passed()) {
            try {

                $conn = DB::getInstance()->insert('wall',array(
                    'link' => Input::get('Link'),
                    'date' => Input::get('Date'),
                    'user_id' => Input::get('user_id'),
                    'title' => Input::get('Title'),
                    'description' => Input::get('Description')
                ));

                ?>
                <div class="alert alert-success" role="alert" id="alert">
                  Featured Added Successfully.
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
    // }


}




 ?>
