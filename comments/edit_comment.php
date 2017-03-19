<?php

include_once '../lib/flash_messages.php';
include_once '../lib/db_queries.php';
require_once '../forms/comment_form.php';
require_once '../lib/auth_check.php';

check_user_auth();
?>
<html>
    <head>
        <title>
            Nata`s site.
        </title>
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/styles.css">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php

                $id = $_GET['id'];
                if(!empty($id)) {
                    if (!$comment = select_records('comments', 'id', $_GET['id'], true)) {
                        set_flash_message('message', get_message(5, 'коментар'));
                        return header('Location:/');
                    }else
                        echo get_comment_form("../comments/update_comment.php?id=$comment->id", 'edit', $comment);
                }else{
                    set_flash_message('message', get_message(4));
                    return header('Location:/');
                }
                ?>
            </div>
        </div>
    </body>
</html>