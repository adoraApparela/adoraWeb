
<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change your profile data
        </h1>

        <br/>

        <div class="panel panel-default">
            <div class="panel-body">

                <form action="../welcome/validate_and_update_admin_profile_info" method="post">

                    <div class="row">
                        <div class="col-xs-5" >
                            <div class="input-group"  >
                                <span class="input-group-addon" >Enter new name</span> <input
                                    type="text" class="form-control"
                                    id="name" name="admin_new_name" placeholder="<?php echo $_SESSION['Admin_Name'] ?>"
                                    />
                            </div>

                        </div>

                    </div>


                    </br>

                    <div class="row">
                        <div class="col-xs-5" >
                            <div class="input-group"  >
                                <span class="input-group-addon" >Enter new email</span> <input
                                    type="email" class="form-control"
                                    id="name" name="admin_new_email" placeholder="<?php echo $_SESSION['Admin_Email'] ?>"
                                    />
                            </div>

                        </div>
                    </div>

                    <br/>

                    <div class="row">
                        <div class="col-xs-5" >
                            <div class="input-group"  >
                                <span class="input-group-addon" >Enter new phone</span> <input
                                    type="number" class="form-control"
                                    id="name" name="admin_new_phone" placeholder="<?php echo $_SESSION['Admin_Phone'] ?>"
                                    />
                            </div>

                        </div>
                    </div>

                    <br/>

                    <div class="row">
                        <div class="col-xs-5" >
                            <div class="input-group"  >
                                <span class="input-group-addon" >Enter current password</span> <input
                                    type="password" class="form-control"
                                    id="name" name="admin_current_password" placeholder="Enter current Password"
                                    />
                            </div>

                        </div> <div style="color: red"><?php if(isset($_SESSION['incorrect_admin_password'])){ echo $_SESSION['incorrect_admin_password'];} ?></div>
                    </div>

                    <br>

                    <button type="submit" name="submit" class="btn btn-primary">Change Details</button>
                    </form>


        </div>



        <div class="panel panel-default">
            <div class="panel-heading"><h3>Change Password</h3></div>
            <div class="panel-body">

                <form action="../welcome/change_admin_password" method="post">

                <div class="row">
                    <div class="col-xs-5" >
                        <div class="input-group"  >
                            <span class="input-group-addon" >Enter current password</span> <input
                                type="password" class="form-control"
                                id="name" name="admin_old_password" placeholder="Enter current Password"
                                />
                        </div>

                    </div>
                </div>

                <br/>

                <div class="row">
                    <div class="col-xs-5" >
                        <div class="input-group"  >
                            <span class="input-group-addon" >Enter new password</span> <input
                                type="password" class="form-control"
                                id="name" name="admin_new_password" placeholder="Enter new Password"
                                />
                        </div>

                    </div>
                </div>


                <br/>

                <div class="row">
                    <div class="col-xs-5" >
                        <div class="input-group"  >
                            <span class="input-group-addon" >Enter new password again</span> <input
                                type="password" class="form-control"
                                id="name" name="admin_new_password_again" placeholder="Enter new Password again"
                                />
                        </div>

                    </div>
                </div>

                <br/>

                <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>



    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->