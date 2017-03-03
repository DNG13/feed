<?php require_once '../forms/comment_form.php'; ?>
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
        <?php echo get_comment_form('../comments/create_comment.php', 'new'); ?>
    </div>
</div>
</body>
</html>