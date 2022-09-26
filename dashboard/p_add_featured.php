<?php
require_once '../core/init.php';
if (empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && $_SERVER["HTTP_X_REQUESTED_WITH"] != "XMLHttpRequest") {
    if (realpath($_SERVER["SCRIPT_FILENAME"]) == __FILE__) {
        header("Location: ../error/");
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
            'Name' => array(
                'required' => true,
                'min' => 3,
                'max' => 50
            ),
            'Date' => array(
                'required' => true,
                'min' => 3,
                'max' => 20
            ),
            'Role' => array(
                'required' => true,
                'min' => 2,
                'max' => 30,
            ),
            'Title' => array(
                'required' => true,
                'min' => 5,
                'max' => 50
            ),
            'Image' => array(
                'required' => true,
                'min' => 5,
                'max' => 50
            ),
            'Body' => array(
                'required' => true,
                'min' => 200,
                'max' => 300
            )
        ));

        //check validation
        if ($validation->passed()) {
            try {

                $role = Input::get('Role');
                if ($role === 'staff') {
                    $role = 1;
                }else{
                    $role = 2;
                }

                $conn = DB::getInstance()->insert('featured',array(
                    'img' => Input::get('Image'),
                    'name' => Input::get('Name'),
                    'date' => Input::get('Date'),
                    'role' => $role,
                    'title' => Input::get('Title'),
                    'body' => Input::get('Body')
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
