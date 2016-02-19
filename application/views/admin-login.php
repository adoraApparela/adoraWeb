<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>Fullscreen Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap-social.css">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/supersized.css">
        <link rel="stylesheet" href="/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="page-container">
            
            <h1>Adora Apparels Administrator Login</h1>

            <form action="../welcome/admin_login" method="post">

                <input type="text" name="admin_username" class="username" placeholder="Username" value="<?php echo set_value('admin_username'); ?>">
                <?php if(isset($_POST['invalid_admin_email_or_username'])) echo $_POST['invalid_admin_email_or_username']; ?>
                <input type="password" name="admin_password" class="password" placeholder="Password" value="<?php echo set_value('admin_password'); ?>">
                <?php if(isset($_POST['invalid_admin_password'])) echo $_POST['invalid_admin_password']; ?>
                <button type="submit">Sign me in</button>

            </form>
        </div>

        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/supersized.3.2.7.min.js"></script>
        <script src="<?php echo base_url(); ?>js/supersized-init.js"></script>
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>

    </body>

</html>