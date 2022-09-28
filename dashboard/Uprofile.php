<?php include 'includes/pages/header.php'; ?>
<?php require_once '../core/init.php'; ?>
<?php

$user = new User();
if ($user->isloggedIn()) {
    $data = $user->data();
    $uData = DB::getInstance()->get('staff_details',array('user_id', '=', $data->id))->first();
?>
        <div id="layoutSidenav">
            <?php include 'includes/pages/sidebar.php' ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Profile</h3>
                                    </div>

                                    <div class="card-body">
                                        <ul id="msg" class="msg">

                                        </ul>
                                        <br>
                                        <form method="post" action="./process/p_uprofile.php" id="UpdateProfile">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input value="<?php echo $uData->firstName; ?>" class="form-control py-3" type="text" name="FirstName" id="FirstName"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Middle Name</label>
                                                        <input value="<?php echo $uData->middleName; ?>" class="form-control py-3" name="MiddleName" id="MiddleName" type="text"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Last Name</label>
                                                        <input value="<?php echo $uData->lastName; ?>" class="form-control py-3" type="text" name="LastName" id="LastName"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Field</label>
                                                        <input value="<?php echo $uData->field; ?>" class="form-control py-3" name="Field" id="Field" type="text"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input value="<?php echo $uData->email; ?>" class="form-control py-3" name="EmailAddress" id="EmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Department">Phone No.</label>
                                                        <input value="<?php echo $uData->gsm; ?>" class="form-control py-3" name="PhoneNo" id="PhoneNo" type="text" placeholder="Enter Phone Number" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Department">Department</label>
                                                        <input value="<?php echo $uData->department; ?>" class="form-control py-3" name="Department" id="Department" type="text" placeholder="Enter Department" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Taking">Taking</label>
                                                        <input value="<?php echo $uData->taking; ?>" class="form-control py-3" name="Taking" id="Taking" type="text" placeholder="Enter Taking" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
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
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputBio">Bio</label>
                                                <textarea rows="10" cols="7" class="form-control py-3" name="Bio" id="Bio"><?php echo $uData->bio;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputTeaching">Teaching</label>
                                                <textarea rows="10" cols="7" class="form-control py-3" name="Teaching" id="Teaching"><?php echo $uData->teaching;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPublications">Publications</label>
                                                <textarea rows="10" cols="7" class="form-control py-3" name="Publications" id="Publications"><?php echo $uData->publications;?></textarea>
                                            </div>

                                            <input type="text" name="UserName" id="UserName" value="" hidden="true">
                                            <div class="form-group mt-4 mb-0">
                                                <input type="submit" class="btn btn-success btn-block" name="UpdateStaff" id="UpdateStaff" value="Update Profile" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><b>Note:</b> This form will update your Personal information</div>
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
            alert('Please contact the site administrator to update your profile if you are not familir with some HTML.');


                $('#UpdateProfile').submit(function(event){
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
                                $('#UpdateProfile')[0].reset();
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
