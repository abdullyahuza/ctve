<?php include 'includes/pages/header.php'; ?>
<?php require_once 'core/init.php'; ?>
<?php

$user = new User();
if ($user->isloggedIn()) {
?>
        <div id="layoutSidenav">
            <?php include 'includes/pages/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Upload Wall Image</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="POST" id="UploadImage" enctype="multipart/form-data">

                                            <div class="form-row-">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" name="image" id="image">
                                                    </div>

                                                    <div class="form-group mt-4 mb-0">
                                                        <input type="text" name="Name" id="Name" value="<?php echo $user->data()->username; ?>" hidden=true/>
                                                        <input type="submit" class="btn btn-success" name="UploadImage" id="UploadImage" value="Upload File" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> This form will upload a new image.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Kadpoly CTVE</div>
                            <div>
                                <txt>Admin Site</txt>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#UploadImage').submit(function(event){
                    event.preventDefault();
                    $.ajax({
                        url: 'p_upic.php',
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#msg").html(data);
                             $('#alert').delay(4000).slideUp(200, function() {
                                 $(this).alert('close');
                                 $('#UploadImage')[0].reset();
                             });
                        }
                    });
                });
            });

        </script>
        <?php include 'includes/pages/footer.php'; ?>
<?php
} else { ?>
    <?php Redirect::to('../sslogin/') ?>
<?php
}?>
