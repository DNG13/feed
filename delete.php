<?php

session_start();
include_once'lib/db_connect.php';
$id = $_GET['id'];
if(!empty($id)) {
    $query = "DELETE FROM posts WHERE id=$id";
    $result = mysqli_query($connect, $query);
    if (!$result) {
        print_r(mysqli_error_list($connect));
    } else {
        $_SESSION['message'] = 'Baш пост видалено.';
        return header('Location:/');
    }
}else{
    $_SESSION['message'] = 'Введіть коректний id.';
    return header('Location:/');
}