<?php

session_start();
include_once'../lib/db_connect.php';
$post_id = $_SESSION['post_id'];
$content = $_POST['content'];
if(!empty($post_id)) {
    $query = "INSERT INTO comments (content, post_id) VALUES ('$content', '$post_id')";
}
$result = mysqli_query($connect, $query);
if(!$result){
    print_r(mysqli_error_list($connect));
}else{
    $_SESSION['comment_message']="Baш коментар '$content' збережено!";
    return header("Location:/show.php?id={$post_id}");
}
