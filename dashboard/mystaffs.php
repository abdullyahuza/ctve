<?php include 'includes/pages/header.php'; ?>
<?php require_once 'core/init.php'; ?>
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
                <h6 class="mt-5">

                </h6>

                <!-- HOD staff Data table -->
                <?php
                if ($user->data()->role == 'hod') {
                ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Staff DataTable
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Taking</th>
                                        <th>Email</th>
                                        <th>GSM</th>
                                        <th>SMS</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                include '../dbh.php';
                                $hodData = DB::getInstance()->get('staff_details',array('user_id', '=', $user->data()->id))->first();

                                $staff = "SELECT * FROM staff_details WHERE department = '$hodData->department'";
                                $result = mysqli_query($conn, $staff);
                                if ($row = mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <tr>
                                            <td><small><a href="../staff/<?php echo $row['lastName'].$row['firstName']; ?>/"><?php echo $row['firstName']." ".$row['lastName']; ?></a></a></td>
                                            <td><small><?php echo $row['taking']; ?></small></td>
                                            <td><small><?php echo $row['email']; ?></small></td>
                                            <td><small><?php echo $row['gsm']; ?></small></td>
                                            <td><center><input type="checkbox" name="sms" value="<?php echo $row['gsm']; ?>"></center></td>
                                        </tr>
                                    <?php
                                    }
                                }
                                 ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                }
                 ?>
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
