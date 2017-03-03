<?php
session_start();

require_once '../lib/db_connect.php';
$post_id = $_SESSION['post_id'];
$id = $_GET['id'];
$content = $_POST['content'];

$query = "UPDATE comments SET content='$content' WHERE id=$id";
$result = mysqli_query($connect, $query);
if(!$result){
        print_r(mysqli_error_list($connect));
    }else{
        $_SESSION['comment_message'] = "Ваш коментар '$content' оновлено!";
        return header("Location:/show.php?id={$post_id}");
 }