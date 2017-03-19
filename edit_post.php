<?php

require_once 'lib/auth_check.php';
require_once 'lib/flash_messages.php';
require_once 'lib/db_queries.php';
require_once 'forms/post_form.php';

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
                <?php

                $id = $_GET['id'];
                if(!empty($id)) {
                    if (!$post = select_records('posts', 'id', $_GET['id'], true)) {
                        set_flash_message('message', get_message(5, 'пост'));
                        return header('Location:/');
                    }else
                        echo get_post_form("update_post.php?id=$post->id", 'edit', $post);
                }else{
                    set_flash_message('message', get_message(4));
                    return header('Location:/');
                }
                ?>
            </div>
        </div>
    </body>
</html>