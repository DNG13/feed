<?php

require_once 'lib/auth_check.php';
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
        <?php if(flash_exists('message')):?>
            <div class="alert alert-warning col-md-offset">
                <?php echo show_flash_message('message'); ?>
            </div>
        <?php endif?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Опис</th>
                    <th>Посилання</th>
                    <?php if(user_exists()): ?>
                    <th>Видалити</th>
                    <th>Редагувати</th>
                    <?php endif; ?>
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
                if(user_exists()) {
                    echo '<td>', "<a href='/delete.php?id=$post->id'>Видалити</a>", '</td>';
                    echo '<td>', "<a href='/edit_post.php?id=$post->id'>Редагувати</a>", '</td>';
                }
                echo"</tr>";
            }
            ?>
            </tbody>
        </table>
        <?php if(user_exists()): ?>
        <a class="btn btn-warning" href="/new_post.php">Створити новий пост</a>
            <a class="btn btn-warning" href="/login/user_auth_delete.php">Вихід</a>
        <?php else: ?>
            <a class="btn btn-danger" href="/login/user_auth.php">Вхід</a>
        <?php endif; ?>
    </body>
</html>