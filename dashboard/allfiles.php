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
            <div class="container-fluid">
                <h6 class="mt-5">
                </h6>


                <?php
                if ($user->hasPermission('admin')) {
                ?>
                <!-- users Table Here -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Files DataTable
                        <a href="downloads" class="btn-success btn-sm float-right">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Files</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  <?php
                                  $downloads = scandir('../downloads/',1);
                                  $results = scandir('../results/', 1);

                                  $download_dir = 'downloads/';
                                  $results_dir = 'results/';

                                  foreach ($downloads as $file) {
                                    if (!is_dir("../downloads/$file")) {
                                    ?>
                                      <tr>
                                        <td>
                                          <small>
                                          <a href="../downloads/<?php echo $file; ?>" target="blank"><?php echo $file; ?></a>
                                          </small>
                                      </td>

                                        <td>
                                            <center>
                                                <a id="<?php echo $download_dir.$file;  ?>" class="btn btn-danger btn-sm delete" href="javascript:void(0)">Delete</a>
                                            </center>
                                        </td>


                                      </tr>
                                  <?php
                                    }
                                  }

                                  foreach ($results as $file) {
                                    if (!is_dir("../results/$file")) {
                                    ?>
                                      <tr>
                                        <td>
                                          <small>
                                          <a href="../results/<?php echo $file; ?>" target="blank"><?php echo $file; ?></a>
                                          </small>
                                      </td>

                                        <td>
                                            <center>
                                                <a id="<?php echo $results_dir.$file;  ?>" class="btn btn-danger btn-sm delete" href="javascript:void(0)">Delete</a>
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
            <?php } ?>

            </div>
        </main>
        <div class="modal fade" id="update_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" id="update_form">
                  <div class="form-group">
                    <label for="Title" class="col-form-label">Title:</label>
                    <input type="text" name="Title" id="Title" class="form-control">
                    <label for="Title" id="lblTitle" class="col-form-label"></label>
                    <input type="text" name="rid" id="rid" class="form-control" hidden="true">
                  </div>
                  <div class="form-group">
                    <label for="Image" class="col-form-label">File link:</label>
                    <input type="text" name="Link" id="Link" class="form-control">
                    <label for="Link" id="lblLink" class="col-form-label"></label>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" name="update" id="update" class="btn btn-primary btn-sm update">Update</button>
              </div>
            </div>
          </div>
        </div>

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
