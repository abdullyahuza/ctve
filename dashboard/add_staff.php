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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Staff Profile</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="post" action="p_add_staff.php" id="CreateStaff">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-3" name="FirstName" id="FirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-3" name="LastName" id="LastName" type="text" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-3" name="EmailAddress" id="EmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Department">Phone No.</label>
                                                        <input class="form-control py-3" name="PhoneNo" id="PhoneNo" type="text" placeholder="Enter Phone Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="SelectTitle">Select Title</label>
                                                        <select class="form-control" name="SelectTitle" id="SelectTitle">
                                                            <option>--Select Title--</option>
                                                            <option>Mr.</option>
                                                            <option>Mal.</option>
                                                            <option>Mrs.</option>
                                                            <option>Dr.</option>
                                                            <option>Prof.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="SelectRole">Select Role</label>
                                                        <select class="form-control" name="SelectRole" id="SelectRole">
                                                            <option value="staff">staff</option>
                                                            <option value="hod">hod</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" name="UserName" id="UserName" value="" hidden="true">
                                            <div class="form-group mt-4 mb-0">
                                                <input type="submit" class="btn btn-success btn-block" name="AddStaff" id="AddStaff" value="Create Account" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> username will be autumatically set to lastname+firstname</div>
                                        <div class="small"><b>Note:</b> password is your mobile number.</div>
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


                $('#CreateStaff').submit(function(event){
                    event.preventDefault();
                    var fname=$("#FirstName").val();
                    var lname=$("#LastName").val();
                    var username = lname+''+fname;
                    console.log(username);
                    $('#UserName').val(lname+fname);
                    $form = $(this);
                    $.ajax({
                        url:$form.attr('action'),
                        method:'POST',
                        data:$form.serialize(),
                        success:function(response){
                           $("#msg").html(response);
                            $('#alert').delay(4000).slideUp(200, function() {
                                $(this).alert('close');
                                $('#CreateStaff')[0].reset();
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
