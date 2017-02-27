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
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Опис</th>
                    <th>Посилання</th>
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
                echo"</tr>";
            }
            ?>
            </tbody>
        </table>
    </body>
</html>