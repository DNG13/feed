<?php

session_start();
include_once'lib/db_connect.php';

$title = $_POST['title'];
$description = $_POST['description'];
$query = "INSERT INTO posts (title, description) VALUES ('$title', '$description')";
$result = mysqli_query($connect, $query);
if(!$result){
    print_r(mysqli_error_list($connect));
}else{
    $_SESSION['message']="Baш пост '$title' збережено!";
    return header('Location:/');
}
