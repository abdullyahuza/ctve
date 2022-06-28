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
                        Staff DataTable
                        <a href="add_staff" class="btn-success btn-sm float-right">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>GSM</th>
                                        <th>Password</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                include '../dbh.php';

                                $staff = "SELECT * FROM users";
                                $result = mysqli_query($conn, $staff);
                                if ($row = mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <tr>
                                            <td>
                                                <small>
                                                    <a href="../staff/<?php echo $row['username']; ?>/" target="blank">
                                                        <?php echo $row['name']; ?>
                                                    </a>
                                                </small>
                                            </td>
                                            <td><small><?php echo $row['email']; ?></small></td>
                                            <td><small><?php echo $row['gsm']; ?></small></td>
                                            <td>
                                                <center>
                                                    <a id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#update_data_modal" class="btn btn-info btn-sm edit_data" href="javascript:void(0)">Change</a>
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
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
                                            <td><a href="../staff/<?php echo $row['lastName'].$row['firstName']; ?>/"><?php echo $row['firstName']." ".$row['lastName']; ?></a></td>
                                            <td><?php echo $row['taking']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['gsm']; ?></td>
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
        <div class="modal fade" id="update_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" id="update_form">
                  <div class="form-group">
                    <label for="Password" class="col-form-label">Enter Password:</label>
                    <input type="password" name="Password" id="Password" class="form-control">
                    <label for="Password" id="lblPassword" class="col-form-label"></label>
                    <input type="text" name="uid" id="uid" class="form-control" hidden="true">
                  </div>

                  <div class="form-group">
                    <label for="CPassword" class="col-form-label">Comfirm Password:</label>
                    <input type="password" name="CPassword" id="CPassword" class="form-control">
                    <label for="CPassword" id="lblCPassword" class="col-form-label"></label>
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
             var table = 'users';

             $.ajax({
                  url:"fetch.php",
                  method:"POST",
                  data:{id:id, table:table},
                  dataType:"json",
                  success:function(data){
                    $('#uid').val(data.id);
                    $('#update_data_modal').modal('show');
                  }
             });
        });

        $(document).on('click', '.update', function(){
            var id = $('#uid').val();
            var table = 'users';

            if($('#Password').val() == ""){

                alert('Password is required');
            }
            else if($('#CPassword').val() == ""){
                alert('Comfirm Password is required');
            }
            else if(id != ""){
                if($('#Password').val() != $('#CPassword').val()){
                    alert('Passwords must match');
                }
                else{

                    var password = $('#CPassword').val();
                    $.ajax({
                        url: 'update_user.php',
                        type: 'post',
                        data: {id:id, password:password, table:table},
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
           var table = 'users';
           var parent = $(this).parent("center").parent('td').parent('tr');

           bootbox.dialog({
                message: "Are you sure you want to delete this User ?<br><b>Note!: </b>User data & files will be deleted.",
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
                            url: 'delete_user.php',
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
    <?php Redirect::to('../sslogin/') ?>
<?php
}?>
