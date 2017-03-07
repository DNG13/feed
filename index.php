<?php

ini_set("display_errors",1);
error_reporting(E_ALL);

include_once 'lib/flash_messages.php';
include_once 'lib/db_queries.php';

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
    <?php echo show_flash_message('message'); ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Опис</th>
                    <th>Посилання</th>
                    <th>Видалити</th>
                    <th>Редагувати</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach (select_records('posts') as $post){
                echo"<tr>";
                echo '<td>', $post->id, '</td>';
                echo '<td>', $post->title, '</td>';
                echo '<td>', $post->description, '</td>';
                echo '<td>', "<a href='/show.php?id=$post->id'>Читати більше...</a>", '</td>';
                echo '<td>', "<a href='/delete.php?id=$post->id'>Видалити</a>", '</td>';
                echo '<td>', "<a href='/edit_post.php?id=$post->id'>Редагувати</a>", '</td>';
                echo"</tr>";
            }
            ?>
            </tbody>
        </table>
    <a class="btn btn-warning" href="/new_post.php">Створити новий пост.</a>
    </body>
</html>