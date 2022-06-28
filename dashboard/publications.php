<?php
require_once 'core/init.php';
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
        $data = $user->data();
        $sData = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
        // echo $sData->firstName;
    ?>

    <?php include 'includes/pages/staff_header.php'; ?>
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
