<?php

include_once '../lib/flash_messages.php';
include_once '../lib/db_queries.php';

$post_id = $_SESSION['post_id'];
$id = $_GET['id'];
$content = $_POST['content'];

$result = update_record('comments', $id, 'content', $content);
if(!$result){
    set_flash_message('message', get_message(6, 'коментаря'));
}else{
    set_flash_message('message', get_message(7, 'коментар', $content));
 }
header("Location:/show.php?id={$post_id}");
