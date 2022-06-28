<?php
require_once 'core/init.php';

if (Input::exists()) {

    if (Token::check(Input::get('token'))) {

        $validate = new Validate();

        $validation = $validate->check($_POST,array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));

        if ($validation->passed()) {

            $user = new User();

            $remember = (Input::get('remember') === 'on') ? true : false;

            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {
                Session::flash('home','Welcome '.ucfirst(Input::get('username')));
                Redirect::to('../dashboard/');

            } else {

                echo "<br><p style='text-align:center; font-family: cursive; color:red;'>Login failed, please try again.</p>";
            }
        } else {

            foreach ($validation->errors() as $error) {

                echo $error, "<br>";
            }
        }

    }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

      <form action="" class="login-form" method="post">
        <h1>Login</h1>

        <div class="txtb">
          <input type="text" name="username" id="username" autocomplete="off" placeholder="Username">
          <!-- <span data-placeholder="Username"></span> -->
        </div>

        <div class="txtb">
          <input type="password" name="password" id="password" autocomplete="off" placeholder="Password">
          <!-- <span data-placeholder="Password"></span> -->
        </div>

          <!-- <input type="checkbox" name="remember" id="remember"> -->
          <label for="remember">
            <input type="checkbox" name="remember" id="remember">
            <font style="font-size: 13px; text-align: left; font-family: 'Lato', sans-serif; text-decoration: none;">
                Remember me
            </font>

        <input type="hidden" name="token" value="<?php echo Token::generateToken(); ?>">

        <input type="submit" class="logbtn" value="Login">

        <div class="bottom-text">
          Don't have account? | forgot password? <br><br>
          <a href="#">Contact the Administrator</a>
        </div>

      </form>

      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>


  </body>
</html>
