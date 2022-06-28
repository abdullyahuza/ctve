<?php require_once 'core/init.php'; ?>
<?php include 'includes/pages/header.php'; ?>
<?php include 'functions/func.php'; ?>
<?php

$user = new User();
if ($user->isloggedIn()) {
?>
<div id="layoutSidenav">
    <?php include 'includes/pages/sidebar.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h6 class="mt-4">Dashboard
                    <span class="float-right">
                        <a href="../staff/<?php echo escape($user->data()->username); ?>/" target="blank">
                            <?php echo escape($user->data()->name); ?>
                        </a>
                </span>
                </h6>

                <?php
                    if (Session::exists('home')) {
                    ?>
                <div class="alert alert-success" role="alert" id='alert'>
                  <?php echo Session::flash('home'); ?>
                  <button type="button" class="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <?php } ?>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <?php
                if (!$user->hasPermission('admin')) {
                    include '../dbh.php';
                    $username = $user->data()->username;

                    $dir = "../staff/".$username."/files/";
                    $file = glob($dir."*");
                    $countFile = 0;
                    if ($file != false) {
                        $countFile = count($file);
                    }
                    $uData = DB::getInstance()->get('staff_details',array('user_id', '=', $user->data()->id))->first();
                    $result = mysqli_query($conn, "SELECT * FROM wall WHERE user_id = '$uData->user_id'");
                    $rows = mysqli_num_rows($result);

                ?>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b>My Files</b><span class="float-right"><h5>(<?php print_r($countFile); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="myfiles">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><b>My Wall</b><span class="float-right"><h5>(<?php echo $rows; ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="wall">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($user->data()->role == 'hod') {
                        $hodData = DB::getInstance()->get('staff_details',array('user_id', '=', $user->data()->id))->first();
                        $result = mysqli_query($conn, "SELECT * FROM staff_details WHERE department = '$hodData->department'");
                        $rows = mysqli_num_rows($result);
                    ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body"><b>My Staffs</b><span class="float-right"><h5>(<?php echo $rows; ?>)</h5></span></div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="mystaffs">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>

                <?php
                if ($user->hasPermission('admin')) {
                    //downloads
                    $dirDownloads = "../downloads/";
                    $dFile = glob($dirDownloads."*");
                    $countDownloads = 0;
                    if ($dFile != false) {
                        $countDownloads = count($dFile);
                    }
                    //images
                    $dirImages = "../img/images/";
                    $iFile = glob($dirImages."*");
                    $countImages = 0;
                    if ($iFile != false) {
                        $countImages = count($iFile);
                    }
                ?>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b>All Staffs</b><span class="float-right"><h5>(<?php echo rowCOunt('users'); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="allStaff">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><b>Featureds</b><span class="float-right"><h5>(<?php echo rowCOunt('featured'); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="allfeatured">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b>Results</b><span class="float-right"><h5>(<?php echo rowCOunt('results'); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="results">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><b>Images</b><span class="float-right"><h5>(<?php print_r($countImages); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="images">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b>Timetables</b><span class="float-right"><h5>(<?php echo rowCOunt('timetables'); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="timetables">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><b>Downloads</b><span class="float-right"><h5>(<?php echo rowCOunt('downloads'); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="alldownloads">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b>All Files</b><span class="float-right"><h5>(<?php print_r($countDownloads); ?>)</h5></span></div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="allfiles">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Kadpoly CTVE</div>
                    <div>
                        <?php
                        if ($user->hasPermission('admin')) {
                            echo "<txt>Admin Site</txt>";
                        } else{
                            echo "<txt>Staff Site</txt>";
                        }
                         ?>

                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#alert').delay(4000).slideUp(200, function() {
                    $(this).alert('close');
                });
            });
        </script>
        <?php include 'includes/pages/footer.php'; ?>
<?php
} else { ?>
    <?php Redirect::to('../sslogin/') ?>
<?php
}?>
