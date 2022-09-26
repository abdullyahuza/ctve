<?php include 'includes/pages/header.php'; ?>
<?php require_once '../core/init.php'; ?>
<?php

$user = new User();
if ($user->isloggedIn()) {
    $uData = DB::getInstance()->get('staff_details',array('user_id', '=', $user->data()->id))->first();
?>
        <div id="layoutSidenav">
            <?php include 'includes/pages/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add WallPost</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="post" action="p_add_wallpost.php" id="CreateWallPost">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Title">Title</label>
                                                        <input class="form-control py-3" name="Title" id="Title" type="text" placeholder="Enter title" required="true" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputDate">Date</label>
                                                        <input class="form-control py-3" name="Date" id="Date" type="text" placeholder="e.g March 18, 2018" required="true" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLink">File link</label>
                                                        <input class="form-control py-3" name="Link" id="Link" type="text" placeholder="Enter link" required="true" />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputBody">Description</label>
                                                <textarea rows="2" cols="7" class="form-control py-3" name="Description" id="Description" true></textarea>
                                                <input type="text" name="user_id" id="user_id" value="<?php echo $uData->user_id; ?>" hidden='true'>
                                            </div>

                                            <div class="form-group mt-4 mb-0">
                                                <input type="submit" class="btn btn-success btn-block" name="AddWallPost" id="AddWallPost" value="Add WallPost" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> This form will add a post to your wall.</div>
                                        <div class="small"><b>Note:</b> Take note of the file name and extension. file link: staff/username/files/fileName.extension</div>
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

                $('#CreateWallPost').submit(function(event){
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
                                $('#CreateWallPost')[0].reset();
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
