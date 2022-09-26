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
                        Featureds DataTable
                        <a href="featured" class="btn-success btn-sm float-right">Add</a>
                    </div>
                    <div class="card-body" id="featured_table">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Body</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <!-- <button id="help" class="btn-danger">HELP</button> -->
                                <?php
                                include '../dbh.php';

                                $staff = "SELECT * FROM featured";
                                $result = mysqli_query($conn, $staff);
                                if ($row = mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <tr>
                                            <td><small><?php echo $row['title']; ?></small></td>
                                            <td><small><?php echo $row['name']; ?></small></td>
                                            <td><small><?php echo $row['date']; ?></small></td>
                                            <td><small><?php echo $row['body']; ?></small></td>

                                            <td>
                                                <center>
                                                    <a id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#update_data_modal" class="btn btn-info btn-sm edit_data" href="javascript:void(0)">Edit</a>
                                                </center>
                                            </td>


                                            <td>
                                                <center>
                                                    <a id="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete" href="javascript:void(0)">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Update Featured</h5>
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
                    <input type="text" name="fid" id="fid" class="form-control" hidden="true">
                  </div>
                  <div class="form-group">
                    <label for="Body" class="col-form-label">Body:</label>
                    <textarea rows="5" class="form-control" name="Title" id="Body"></textarea>
                    <label for="Body" id="lblBody" class="col-form-label"></label>
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
    $(document).ready(function(){

        $(document).on('click', '.edit_data', function(){
             var id = $(this).attr("id");
             var table = 'featured';

             $.ajax({
                  url:"fetch.php",
                  method:"POST",
                  data:{id:id, table:table},
                  dataType:"json",
                  success:function(data){
                       $('#Title').val(data.title);
                       $('#fid').val(data.id);
                       $('#Body').val(data.body);
                       $('#update_data_modal').modal('show');
                  }
             });
        });

        $(document).on('click', '.update', function(){
            var id = $('#fid').val();
            var table = 'featured';

            if($('#Title').val() == ""){

                alert('Title is required');
            }
            else if($('#Body').val() == ""){
                alert('Body is required');
            }
            else if(id != ""){
                if($('#Title').val().length > 50){
                    alert('Title must not be more than 50 characters');

                }
                else if($('#Body').val().length > 300){
                       alert('Body must not be more than 300 characters');
                }
                else{

                    var title = $('#Title').val();
                    var body = $('#Body').val();
                    $.ajax({
                        url: 'update_featured.php',
                        type: 'post',
                        data: {id:id, title:title, body:body, table:table},
                        beforeSend:function(){
                             $('#update').val("updating");
                        },
                        success: function(data){
                            $('#update_data_modal').modal('hide');
                            location.reload();
                        }
                    });
                }

            }
        });

        $('.delete').click(function(e){
           e.preventDefault();
           var id = $(this).attr('id');
           var table = 'featured';
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
                            data: {id:id, table:table}
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
    <?php Redirect::to('../sslogin/'); ?>
<?php
}?>
