<?php

session_start();
include_once'../lib/db_connect.php';
$post_id = $_SESSION['post_id'];
$id = $_GET['id'];
if(!empty($id)) {
    $query = "DELETE FROM comments WHERE id=$id";
    $result = mysqli_query($connect, $query);
    if (!$result) {
        print_r(mysqli_error_list($connect));
    } else {
        $_SESSION['comment_message'] = 'Baш коментар видалено.';
        return header("Location:/show.php?id={$post_id}");
    }
}else{
    $_SESSION['comment_message'] = 'Введіть коректний id.';
    return header('Location:/');
}