<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div style="color: red">
<?php echo validation_errors();?>
</div>


<form action="register_new_user_validation" method="post">
    
    <input type="text" placeholder="Full Name" name="full_name" value="<?php echo set_value('full_name'); ?>"/>
    <input type="text" placeholder="User Name" name="user_name" value="<?php echo set_value('user_name');  ?>"/>
    <?php if(isset($_POST['username_unavailable'])) echo $_POST['username_unavailable']; ?>
    <input type="email" placeholder="Email Address" name="email" value="<?php echo set_value('email'); ?>"/>
    <?php if(isset($_POST['email_unavailable'])) echo $_POST['email_unavailable']; ?>
    <input type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>"/>
    <input type="password" placeholder="Confirm Password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>"/>
    <input type="tel" placeholder="Phone Number" name="phone_number" value="<?php echo set_value('phone_number'); ?>"/>
    <button type="submit" class="btn btn-default">Signup</button>


    <br><br>

    <a href="facebook_login" class="btn btn-block btn-social btn-lg btn-facebook" >  <i class="fa fa-facebook"></i>  Fill sign up form with Facebook</a>
    <br>

    
</form>