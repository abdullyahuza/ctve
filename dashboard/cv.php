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
        $data = $user->data();
        $sData = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
        // echo $sData->firstName;
    ?>

    <?php include 'includes/pages/staff_header.php'; ?>
        <div class="container">
            <div class="row">
                <?php include 'includes/pages/staff_profile_sidebar.php' ?>
                <main class="col-md-7">
                    <h1 style="text-align: center; margin-bottom: -25px;">CV</h1>
                        <a class="float-right mb-1 small text-muted text-right" href="/ctve1/staff/<?php echo $data->username; ?>/<?php echo $data->username; ?>.pdf" target="_blank">
                            Open
                            <i class="fas fa-external-link-alt ml-1"></i>
                        </a>


                        <div class="embed-responsive embed-responsive-85by110 mt-1">
                            <iframe class="b-0 embed-responsive-item" src="/ctve1/dashboard/assets/pdfjs-2.5.207/web/viewer.html?file=/ctve1/staff/<?php echo $data->username; ?>/<?php echo $data->username; ?>.pdf#pagemode=none"></iframe>
                        </div>

                </main>
            </div>
        </div>
    <?php include 'includes/pages/staff_footer.php'; ?>

<?php
    }
}
?>
