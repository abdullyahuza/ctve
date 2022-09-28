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
            'UserName' => array(
                'min' => 2,
                'max' => 30,
                'unique' => 'users'
            ),
            'PhoneNo' => array(
                'required' => true,
                'min' => 11,
                'max' => 13
            )
        ));

        //check validation
        if ($validation->passed()) {
            //create User
            //try creating a user
            $db = DB::getInstance();
            try {

                $user = new User();

                // $name = Input::get('FirstName');
                //lastname+firsname to be username
                $uname = Input::get('LastName').Input::get('FirstName');
                //name
                $name = Input::get('FirstName')." ".Input::get('LastName');
                //function to insert user to users table
                $user->create(array(
                    'username' => $uname,
                    'email' => Input::get('EmailAddress'),
                    'title' => Input::get('SelectTitle'),
                    'gsm' => Input::get('PhoneNo'),
                    'password' => Hash::make_hash(Input::get('PhoneNo')),
                    'name' => $name,
                    'joined' => date('Y-m-d H:i:s'),
                    'group' => 2,
                    'role' => Input::get('SelectRole')
                ));
                // create a dir with username
                mkdir("../../staff/".$uname);
                mkdir("../../staff/".$uname."/files/");

                // insert user id to db data to details
                $new_user_id = $db->get('users', array('username','=',$uname))->first()->id;
                //insert id into staff details
                $db->insert('staff_details', array(
                    'user_id' => $new_user_id,
                    'firstName' => Input::get('FirstName'),
                    'lastName' => Input::get('LastName'),
                    'email' => Input::get('EmailAddress'),
                    'title' => Input::get('SelectTitle'),
                    'gsm' => Input::get('PhoneNo')
                ));

                ?>
                <div class="alert alert-success" role="alert" id="alert">
                  Profile Created Successfully.
                  <button type="button" class="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?php
            } catch (Exception $e) {
                die($e->getMessage());
            }

        } else {
            foreach ($validation->errors() as $error) {
                            echo "<li>".$error, "</li>";
            }
        }
    // }


}




 ?>
