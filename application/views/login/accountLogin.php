<form action="log_current_user_validation" method="post">
    <?php if(isset($_POST['cart_error'])) echo $_POST['cart_error']; ?>
    <input type="text" placeholder="User Name or Email" name="username_or_email" value="<?php echo set_value('username_or_email'); ?>"/>
    <?php if(isset($_POST['invalid_email_or_username'])) echo $_POST['invalid_email_or_username']; ?>
    <input type="password" placeholder="Password" name="password_login" value="<?php echo set_value('password_login'); ?>"/>
    <?php if(isset($_POST['invalid_password'])) echo $_POST['invalid_password']; ?>
<span>
    <input type="checkbox" class="checkbox" name="remember_me">
    Keep me signed in
</span>
    <button type="submit" class="btn btn-default">Login</button>
</form>
