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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Result Link</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="POST" action="./process/p_addresult.php" id="Result">
                                            <div class="form-row-">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputTitle">Title</label>
                                                        <input type="text" class="form-control py-3" name="Title" id="Title" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLink">Link</label>
                                                        <input type="text" class="form-control py-3" name="AddResult" id="AddResult" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-success" name="UpdateResult" id="UpdateResult" value="Update Results" />
                                                    </div>
                                                </div>

                                        </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> This form will add result in the result section.</div>
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


                $('#Result').submit(function(event){
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
                                $('#Result')[0].reset();
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
<?php
} else { ?>
    <?php Redirect::to('../sslogin/') ?>
<?php
}?>
