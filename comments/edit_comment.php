<html>
<head>
    <title>
        Nata`s site.
    </title>
    <link rel="stylesheet" type="text/css" href="..assets/bootstrap3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles.css">

</head>
<body>
<div class="container">
    <div class="row">

        <?php
        session_start();
        include_once'../lib/db_connect.php';
        require_once '../forms/comment_form.php';
        $id = $_GET['id'];
        if(!empty($id)) {
            $query = "SELECT * FROM comments WHERE id=$id";
            $result = mysqli_query($connect, $query);
            if (!$comment = mysqli_fetch_object($result)) {
                $_SESSION['comment_message'] = 'Ваш коментар не знайдено.';
                return header('Location:/');
            }else
                //var_dump( $result);
                echo get_comment_form("../comments/update_comment.php?id=$comment->id", 'edit', $comment);
        }else{
            $_SESSION['comment_message'] = 'Введіть коректний id.';
            return header('Location:/');
        }
        ?>
    </div>
</div>
</body>
</html>