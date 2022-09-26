<?php include 'includes/pages/header.php'; ?>
<?php require_once '../core/init.php'; ?>
<?php
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../sslogin/');
}
?>

<div id="layoutSidenav">
    <?php include 'includes/pages/sidebar.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Change ya Password</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="p_updatepassword.php" id="UpdatePassword">
                                <ul id="msg" class="msg"></ul>
                                <br>
                                    <div class="form-row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="small mb-1" for="current_password">Current Password</label>
                                                <input class="form-control py-3" type="password" name="current_password" id="current_password" />
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="small mb-1" for="new_password">New Password</label>
                                                <input class="form-control py-3" name="new_password" id="new_password" type="password" />
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="small mb-1" for="comfirm_password">Comfirm Password</label>
                                                <input class="form-control py-3" name="comfirm_password" id="comfirm_password" type="password" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4 mb-0">
                                        <input type="submit" class="btn btn-success float-right" value="Update" />
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><b>Note:</b> This form will update your Password</div>
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
                        <txt>Staff Site</txt>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('#UpdatePassword').submit(function(event){
            event.preventDefault();
            $form = $(this);
            $.ajax({
                url:$form.attr('action'),
                method:'POST',
                data:$form.serialize(),
                success:function(response){
                   $("#msg").html(response);
                    $('#alert').delay(4000).slideUp(200, function() {
                        $(this).alert('close');
                        $('#UpdatePassword')[0].reset();
                    });
                   // alert(response);
               }
            });
            // console.log($form.serialize());
        });

        // $('#CreateStaff').unbind('submit').submit();
    });
</script>
<?php include 'includes/pages/footer.php'; ?>
