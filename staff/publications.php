<?php
require_once '../core/init.php';
$username = Input::get('s');
//$actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// echo $actualLink;
if (!$username) {
    Redirect::to('../error/');
} else {
    $user = new User($username);
    if (!$user->exists()) {
        Redirect::to('../error/');
    } else {
        $projectDirName = explode('/', $_SERVER['REQUEST_URI'])[1];
        $data = $user->data();
        $sData = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
        // echo $sData->firstName;
    ?>

    <html lang="en-us">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon -->
      <link rel="icon" href="../../img/core-img/favicon.ico">
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700&display=swap" rel="stylesheet">
      <link href="../../staff/styles.css" rel="stylesheet">
      <link href="../../staff/all.css" rel="stylesheet">
      <script src="../../staff/jquery.min.js"></script>
      <script src="../../staff/bootstrap.bundle.min.js"></script>
      <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php include 'includes/pages/staff_profile_sidebar.php' ?>
                <main class="col-md-7">
                    <h1 style="text-align: center;">Publications</h1>
                        <?php echo $sData->publications; ?>
                </main>
            </div>
        </div>
    <?php include 'includes/pages/staff_footer.php'; ?>

<?php
    }
}
?>
