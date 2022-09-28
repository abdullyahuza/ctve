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
$user = new User();
if (Input::exists()) {
    // if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'current_password' => array(
                'required' => true,
                'min' => 6
            ),
            'new_password' => array(
                'required' => true,
                'min' => 6
            ),
            'comfirm_password' => array(
                'required' => true,
                'min' => 6,
                'matches' => 'new_password'
            )
        ));

        if ($validation->passed()) {
        
            if(Hash::un_hash(Input::get('current_password'),$user->data()->password)) {
                $user->update(array(
                    'password' => Hash::make_hash(Input::get('new_password'))
                ));
                echo "<div class='alert alert-success' role='alert' id='alert'>";
                echo "Password Changed successfully.";
                echo "<button type='button' class='close'>";
                echo "<span aria-hidden='true'>&times;</span>";
                echo "</button>";
                echo "</div>";
            }else{
                echo "Your current password is wrong.";
            }
        } else {
            // foreach ($validation->errors() as $error) {
            //     echo $error."<br>";
            // }
            for ($i=0; $i < count($validation->errors()) ; $i++) {
                if ($validation->errors()[$i] == 'current_password is required') {
                    # code...
                    echo "<li>Current password is required</li>";
                }
                if ($validation->errors()[$i] == 'new_password is required') {
                    # code.
                    echo "<li>New password is required</li>";
                }
                if ($validation->errors()[$i] == 'comfirm_password is required') {
                    # code.
                    echo "<li>Comfirm password is required</li>";
                }
                if ($validation->errors()[$i] == 'new_password must match comfirm_password') {
                    # code.
                    echo "<li>New and Comfirm must match</li>";
                }
            }
        }
    // }
}
?>
