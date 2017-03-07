<?php

include_once 'lib/flash_messages.php';
include_once 'lib/db_queries.php';

$_SESSION['post_id']= $_GET['id'];

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
        <div class="comment">
            <div><a class="btn btn-primary"  href="/"><i class='glyphicon glyphicon-home'></i> Посилання на головну.</a></div>
            <?php
            echo show_flash_message('message');
            if($post = select_records('posts', 'id', $_GET['id'], true)) {
                echo '<h2>', $post->title, '</h2>';
                echo '<h4>', $post->description, '</h4>';
                echo "<ol>";
                foreach (select_records('comments', 'post_id', $_GET['id']) as $comment){
                    echo '<li>' . $comment->content ;
                    echo "<a href=comments/delete_comment.php?id=$comment->id 
                         data-toggle='tooltip' title='Видалити'>
                        <i class='glyphicon glyphicon-trash'></i></a>";
                    echo "<a href=comments/edit_comment.php?id=$comment->id
                    data-toggle='tooltip' title='Редагувати'>
                        <i class='glyphicon glyphicon-pencil'></i></a>";
                    echo '</li>';
                }
            }else{
                echo '<h2>Повідомлення відсутнє.</h2>';
            }
            echo "</ol>";
            ?>
            <a class="btn btn-primary" href="comments/new_comment.php">Створити новий коментар.</a>
        </div>
    </body>
</html>