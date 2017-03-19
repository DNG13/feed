<?php

require_once 'forms/post_form.php';
require_once  'lib/auth_check.php';
require_once 'lib/uploader.php';

check_user_auth();
?>
<html>
    <head>
        <title>
            Nata`s site.
        </title>
        <link rel="stylesheet" type="text/css" href="assets/bootstrap3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php echo get_post_form('create_post.php', 'new'); ?>
            </div>
        </div>
    </body>
</html>