<?php

include_once'lib/db_connect.php';

?>
<html>
    <head>
        <title>
            Nata`s site.
        </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        $query_post = mysqli_query($connect, "SELECT * FROM posts WHERE id={$_GET['id']}");
        $post = mysqli_fetch_object($query_post);
        echo'<h2>', $post->title,'</h2>';
        echo'<h4>', $post->description, '</h4>';
        $query_comments = mysqli_query($connect, "SELECT * FROM comments WHERE post_id={$_GET['id']}");
        echo "<ol>";
        while ($comments = mysqli_fetch_object($query_comments)){
            echo '<li>' . $comments->content . '</li>';
        }
        echo "</ol>";
        ?>
        <a href="/">Посилання на головну сторінку.</a>
    </body>
</html>