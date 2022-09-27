<?php
require_once '../core/init.php';

$user = new User();
$msg = '';
if ($user->isloggedIn()) {
    Session::flash('home','Welcome Back '.ucfirst(Input::get('username')));
    Redirect::to('../dashboard/');
}
else {
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
                    Session::flash('home','Welcome Back '.ucfirst(Input::get('username')));
                    
                    //check first
                    $userData = DB::getInstance()->get('staff_details',array('user_id', '=', $user->data()->id))->first();
                    if(!$userData){
                        DB::getInstance()->insert('staff_details',array(
                                    'user_id' => $user->data()->id,
                                ));
                    }

                    if ($user->hasPermission('admin')) {
                        Redirect::to('../dashboard/');
                    }else {
                        Redirect::to('../dashboard/');
                    }

                } else {
                    $msg = "<p class='alert alert-danger'>Incorrect Username / Password</p>";
                }

            } else {

                foreach ($validation->errors() as $error) {

                    echo $error, "<br>";
                }
            }

        }
    }?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Login to Continue</title>
            <!-- Favicon -->
            <link rel="icon" href="../img/core-img/favicon.ico">
            <link href="../dashboard/css/styles.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        </head>
        <body class="bg-success">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                        <div class="card-body">
                                            <?php echo $msg; ?>
                                            <form method="post" action="">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputEmailUsername">Username</label>
                                                    <input class="form-control py-4" name="username" id="username" autocomplete="off" type="text" placeholder="Enter your Username" required="true" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" name="password" id="password" autocomplete="off" type="password" placeholder="Enter password" required="true" />
                                                </div>
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" name="remember" id="remember" type="checkbox" />
                                                        <label class="custom-control-label" for="remember">Remember password</label>
                                                    </div>
                                                </div>
                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <txt class="small" href="password.html">Forgot Password? Contact the Administrator <b>!</b></txt>
                                                    <input type="hidden" name="token" value="<?php echo Token::generateToken(); ?>">
                                                    <button type="submit" class="btn btn-success">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="small">Need an account? Contact the Administrator.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div id="layoutAuthentication_footer">
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Kadpoly CTVE</div>
                                <div>
                                    Please login to Continue...
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="../dashboard/js/scripts.js"></script>
        </body>
    </html>
<?php } ?>
