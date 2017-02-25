<?php

include_once'lib/db_connect.php';

?>
<html>
    <head>
        <title>
            Nata`s site.
        </title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
    <?php
    $query = mysqli_query($connect, "select * from posts WHERE id={$_GET['id']} LIMIT 1");
    $post = mysqli_fetch_object($query);
    echo'<h1>', $post->title,'</h1>';
    echo'<p>', $post->description, '</p>';
    echo'<a href="/main.php">Посилання назад</a>';
    ?>
    </body>
</html>