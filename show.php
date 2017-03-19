<?php

include_once 'lib/flash_messages.php';
include_once 'lib/db_queries.php';
require_once 'lib/auth_check.php';

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
        <div class="comment form-horizontal col-md-4 col-md-offset-3">
            <div><a class="btn btn-primary"  href="/">
                    <i class='glyphicon glyphicon-home'></i>
                    Посилання на головну</a>
            </div>
            <?php if(flash_exists('message')):?>
                <div class="alert alert-info">
                    <?php echo show_flash_message('message'); ?>
                </div>
            <?php endif;
            if($post = select_records('posts', 'id', $_GET['id'], true)) {
                echo '<h2>Загаловок: ', $post->title, '</h2>';
                echo '<h3>Текст: ', $post->description, '</h4>';
                if($post->file_name) {
                    $img = "upload/posts/$post->id/$post->file_name";
                    echo "<img src = $img width='350' height='250'/>";
                }
                echo '<h4>Коментарі:</h4>';
                echo "<ol>";
                foreach (select_records('comments', 'post_id', $_GET['id']) as $comment){
                    echo '<li>' . $comment->content ;
                    if(user_exists()){
                        echo "<a href=comments/delete_comment.php?id=$comment->id 
                         data-toggle='tooltip' title='Видалити'>
                        <i class='glyphicon glyphicon-trash'></i></a>";
                        echo "<a href=comments/edit_comment.php?id=$comment->id
                    data-toggle='tooltip' title='Редагувати'>
                        <i class='glyphicon glyphicon-pencil'></i></a>";
                    }
                    echo '</li>';
                }
            }else{
                echo '<h2>Повідомлення відсутнє.</h2>';
            }
            echo "</ol>";
            if(user_exists()): ?>
            <a class="btn btn-primary" href="comments/new_comment.php">Створити новий коментар</a>
            <?php endif; ?>
        </div>
    </body>
</html>