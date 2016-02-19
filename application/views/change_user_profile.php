<!DOCTYPE html>
<html lang="en">
<?php include ('components/head_section.php'); ?>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<? echo base_url();?>css/bootstrap-social.css">

<body>
<?php include ('components/body_header.php'); ?>

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h1 style="color: orange"> Profile</h1>
                    <h2><b>Change your Name, e-mail Address or Phone number</b></h2>


                    <form action="../welcome/changeNameOrEmail" method="post">
                        <div style="color: red">
                        <?php if(isset($_POST['changeNameOrEmailErrors'])) echo $_POST['changeNameOrEmailErrors']; ?>
                        </div>

                        <label for="User_fullname">Enter new full name</label>
                        <input type="text" placeholder="<?php echo $this->session->userdata("Name"); ?>" name="newUserName" value="<?php  echo set_value('newUserName'); ?>"/>

                        <label for="User_email">Enter new email</label>
                        <input type="text" placeholder="<?php echo $this->session->userdata("Email"); ?>" name="newEmail" value="<?php  echo set_value('newEmail'); ?>"/>
                        <?php  if(isset($_POST['new_email_invalid'])) echo $_POST['new_email_invalid']; ?>

                        <label for="User_tel">Enter new telephone number</label>
                        <input type="number" placeholder="<?php echo $this->session->userdata("Phone"); ?>" name="newPhone" value="<?php  echo set_value('newPhone'); ?>"/>

                        <label for="User_password">Enter current password</label>
                        <input type="password" placeholder="Enter current password" name="current_password" value="<?php // echo set_value('current_password'); ?>"/>
                        <?php  if(isset($_POST['password_invalid'])) echo $_POST['password_invalid']; ?>

                        <span>
                        <button type="submit" class="btn btn-default">Change Details</button>
                        </span>

                    </form>

                    <br><br><br>

                    <h2><b>Change your password</b></h2>


                    <form action="../welcome/changeUserPassword" method="post">
                        <div style="color: red">
                            <?php if(isset($_POST['changePasswordErrors'])) echo $_POST['changePasswordErrors']; ?>
                        </div>
                        <label for="User_current_pass">Enter current password</label>
                        <input type="password" placeholder="Enter current password" name="old_password" value="<?php echo set_value('old_password'); ?>"/>
                        <?php  if(isset($_POST['change_password_invalid'])) echo $_POST['change_password_invalid']; ?>

                        <label for="User_new_pass">Enter new password</label>
                        <input type="password" placeholder="Enter new password" name="new_password" value="<?php echo set_value('new_password'); ?>"/>

                        <label for="User_new_pass2">Enter new password again</label>
                        <input type="password" placeholder="Enter new password again" name="new_password_again" value="<?php echo set_value('new_password_again'); ?>"/>
                        <?php // if(isset($_POST['invalid_password'])) echo $_POST['invalid_password']; ?>

                        <button type="submit" class="btn btn-default">Change Password</button>
                    </form>

                </div>
        </div>
    </div>




</section><!--/form




<?php include ('components/footer.php'); ?>



<script src="js/jquery.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>