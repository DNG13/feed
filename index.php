<?php
session_start();
include_once'lib/db_connect.php';

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
    <?php
    if(!empty($_SESSION['message'])) echo $_SESSION['message'];
    ?>
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
            $query = mysqli_query($connect, 'SELECT * FROM posts ');
            while ($post = mysqli_fetch_object($query)){
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