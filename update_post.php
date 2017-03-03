<?php
session_start();

require_once 'lib/db_connect.php';

$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];

$query = "UPDATE posts SET title='$title', description='$description' WHERE id=$id";
$result = mysqli_query($connect, $query);
if(!$result){
        print_r(mysqli_error_list($connect));
    }else{
        $_SESSION['message'] = "Ваш пост '$title' оновлено!";
        return header('Location:/');
 }