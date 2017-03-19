<?php
include_once '../lib/flash_messages.php';
include_once '../lib/db_queries.php';
require_once '../lib/auth_check.php';

check_user_auth();

$post_id = $_SESSION['post_id'];
$id = $_GET['id'];
$content = $_POST['content'];
$data = [
    'post_id' => $post_id,
    'id' => $id,
    'content' => $content
];

$result = update_record('comments', $data, 'id');
if(!$result){
    set_flash_message('message', get_message(6, 'коментаря'));
}else{
    set_flash_message('message', get_message(7, 'коментар', $content));
 }
header("Location:/show.php?id={$post_id}");
