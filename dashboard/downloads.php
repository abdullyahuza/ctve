<?php include 'includes/pages/header.php'; ?>
<?php require_once '../core/init.php'; ?>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Upload File</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="POST" id="UploadDownload" enctype="multipart/form-data">

                                            <div class="form-row-">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="file" name="download" id="Download">
                                                    </div>

                                                    <div class="form-group mt-4 mb-0">
                                                        <input type="submit" class="btn btn-success" name="UploadDownload" id="AddDownload" value="Upload File" />
                                                        <a href="adddownload" class="btn btn-success float-right"> Add Download</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> This form will upload a file.</div>
                                        <div class="small"><b>Note:</b> Click Add Download to manage downloads in downloads page.</div>
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

                $('#UploadDownload').submit(function(event){
                    event.preventDefault();
                    $.ajax({
                        url: './process/p_download.php',
                        method: 'POST',
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            $("#msg").html(data);
                             $('#alert').delay(4000).slideUp(200, function() {
                                 $(this).alert('close');
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
