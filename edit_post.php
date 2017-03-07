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

                include_once 'lib/flash_messages.php';
                include_once 'lib/db_queries.php';
                require_once 'forms/post_form.php';

                $id = $_GET['id'];
                if(!empty($id)) {
                    if (!$post = select_records('posts', 'id', $_GET['id'], true)) {
                        set_flash_message('message', get_message(5, 'пост'));
                        header('Location:/');
                    }else
                        echo get_post_form("update_post.php?id=$post->id", 'edit', $post);
                }else{
                    set_flash_message('message', get_message(4));
                    header('Location:/');
                }
                ?>
            </div>
        </div>
    </body>
</html>