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
        $title = Input::get('SelectTitle'); //get title

        if ($title === '--Select Title--') { //check title
            $title = '';
        }else{
            $title = $title;
        }
        $validate = new Validate();

        $validation = $validate->check($_POST, array(
            'MiddleName' => array(
                'min' => 3,
                'max' => 20
            ),
            'Field' => array(
                'required' => true,
                'min' => 10,
                'max' => 500
            ),
            'PhoneNo' => array(
                'required' => true,
                'min' => 11,
                'max' => 13
            ),
            'Department' => array(
                'required' => true,
                'min' => 5,
                'max' => 100
            ),
            'FirstName' => array(
                'required' => true,
                'min' => 3,
                'max' => 20
            ),
            'LastName' => array(
                'required' => true,
                'min' => 3,
                'max' => 20
            ),
            'Bio' => array(
                'required' => false,
                'min' => 100,
                'max' => 10000
            ),
            'Teaching' => array(
                'required' => false,
                'min' => 10,
                'max' => 10000
            ),
            'Publications' => array(
                'required' => false,
                'min' => 100,
                'max' => 10000
            ),
            'SelectTitle' => array(
                'required' => true
            ),
            'Taking' => array(
                'required' => true,
                'min' => 5,
                'max' => 50
            ),

        ));

        //check validation
        if ($validation->passed()) {
            //create User
            //try creating a user
            try {

                $user = new User();
                $data = $user->data();
                $id = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
                $uData = DB::getInstance()->update('staff_details',$id->id,array(
                    'title' => $title,
                    'middleName' => Input::get('MiddleName'),
                    'firstName' => Input::get('FirstName'),
                    'lastName' => Input::get('LastName'),
                    'email' => Input::get('EmailAddress'),
                    'field' => Input::get('Field'),
                    'department' => Input::get('Department'),
                    'taking' => Input::get('Taking'),
                    'gsm' => Input::get('PhoneNo'),
                    'bio' => Input::get('Bio'),
                    'teaching' => Input::get('Teaching'),
                    'publications' => Input::get('Publications')
                ));

                // $user->update(array(
                //     'name' => Input::get('name'),
                //     'name' => Input::get('name'),
                //     'name' => Input::get('name')
                // ));
                ?>
                <div class="alert alert-success" role="alert" id="alert">
                  Profile updated Successfully.
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
