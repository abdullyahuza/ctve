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

            <!-- users Table Here -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    My Files DataTable
                    <a href="upload_file" class="btn-success btn-sm float-right">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php
                              $username = $user->data()->username;

                              $files = scandir("../staff/".$username."/files/",1);
                              $dir = "staff/".$username."/files/";

                              foreach ($files as $file) {
                                if (!is_dir("../staff/".$username."/files/".$file."")) {
                                ?>
                                  <tr>
                                    <td>
                                      <small>
                                      <a href="../staff/<?php echo $username; ?>/files/<?php echo $file; ?>" target="blank"><?php echo $file; ?></a>
                                      </small>
                                  </td>

                                    <td>
                                        <center>
                                            <a id="<?php echo $dir.$file;  ?>" class="btn btn-danger btn-sm delete" href="javascript:void(0)">Delete</a>
                                        </center>
                                    </td>


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


        $('.delete').click(function(e){
           e.preventDefault();
           var filename = $(this).attr('id');
           var parent = $(this).parent("center").parent('td').parent('tr');
           bootbox.dialog({
                message: "Are you sure you want to delete ?",
                title: "<i class='glyphicon glyphicon-trash'></i>",
                buttons: {
                    success: {
                          label: "No",
                          className: "btn-success btn-sm",
                          callback: function() {
                          $('.bootbox').modal('hide');
                          dataTable.ajax.reload();
                      }
                    },
                    danger: {
                      label: "Delete!",
                      className: "btn-danger btn-sm",
                      callback: function() {
                       $.ajax({
                            type: 'POST',
                            url: 'delete_data.php',
                            data: {filename:filename}
                       })
                       .done(function(response){
                            parent.fadeOut('slow');
                            bootbox.alert(response);
                       })
                       .fail(function(){
                            bootbox.alert('Error....');
                       })
                      }
                    }
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
