<?php include 'includes/pages/header.php'; ?>
<?php require_once 'core/init.php'; ?>
<?php require_once '../dbh.php'; ?>

<?php

$user = new User();
if ($user->isloggedIn()) {
$sql = "SELECT body FROM pwv WHERE id = 2";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
        <div id="layoutSidenav">
            <?php include 'includes/pages/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Philosophy</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="post" action="p_welcome.php" id="Update">
                                            <div class="form-row-">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea rows="5" cols="7" class="form-control py-3" name="Welcome" id="Welcome" required="true"><?php echo $row['body']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-success" name="UpdateWelcome" id="UpdateWelcome" value="Update Welcome" />
                                                    </div>
                                                </div>

                                        </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> This form will update welcome section in the homepage.</div>
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


                $('#Update').submit(function(event){
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
                                $('#Update')[0].reset();
                            });
                           // alert(response);
                       }
                    });
                    // console.log($form.serialize());
                });

                // $('#CreateStaff').unbind('submit').submit();
            });
        </script>
        <?php
        include 'includes/pages/footer.php';
        mysqli_close($conn);
         ?>
<?php
} else { ?>
    <?php Redirect::to('../sslogin/') ?>
<?php
}?>
