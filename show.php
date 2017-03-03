<?php

include_once'lib/db_connect.php';
session_start();
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
        if(!empty($_SESSION['comment_message'])) echo $_SESSION['comment_message'];
        $query_post = mysqli_query($connect, "SELECT * FROM posts WHERE id={$_GET['id']}");
        if($post = mysqli_fetch_object($query_post)) {
            echo '<h2>', $post->title, '</h2>';
            echo '<h4>', $post->description, '</h4>';
            $query_comments = mysqli_query($connect, "SELECT * FROM comments WHERE post_id={$_GET['id']}");
            echo "<ol>";
            while ($comments = mysqli_fetch_object($query_comments)) {
                echo '<li>' . $comments->content ;
                echo "<a href=comments/delete_comment.php?id=$comments->id 
                     data-toggle='tooltip' title='Видалити'>
                    <i class='glyphicon glyphicon-trash'></i></a>";
                echo "<a href=comments/edit_comment.php?id=$comments->id
                data-toggle='tooltip' title='Редагувати'>
                    <i class='glyphicon glyphicon-pencil'></i></a>";
                echo '</li>';
            }
        }else{
            echo '<h2>Пост відсутній.</h2>';
        }
        echo "</ol>";
        ?>
        <a class="btn btn-primary" href="comments/new_comment.php">Створити новий коментар.</a>
    </div>
    </body>
</html>