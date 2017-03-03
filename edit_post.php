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

        session_start();
        include_once'lib/db_connect.php';
        require_once 'forms/post_form.php';

        $id = $_GET['id'];
        if(!empty($id)) {
            $query = "SELECT * FROM posts WHERE id=$id";
            $result = mysqli_query($connect, $query);
            if (!$post = mysqli_fetch_object($result)) {
                $_SESSION['message'] = 'Ваш пост не знайдено.';
                return header('Location:/');
            }else
                echo get_post_form("update_post.php?id=$post->id", 'edit', $post);
        }else{
            $_SESSION['message'] = 'Введіть коректний id.';
            return header('Location:/');
        }
        ?>
    </div>
</div>
</body>
</html>