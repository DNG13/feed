<?php

include_once '../lib/flash_messages.php';
include_once '../lib/db_queries.php';
require_once '../lib/auth_check.php';

check_user_auth();

$post_id = $_SESSION['post_id'];
$content = $_POST['content'];
$data = [
    'post_id'=> $post_id,
    'content' => $content,
];

if(!empty($post_id)) {
    $result = create_record('comments', $data);
    if (!$result) {
        set_flash_message('message', get_message(1, 'коментаря'));
    } else {
        set_flash_message('message', get_message(0, 'коментар', $content));
    }
    header("Location:/show.php?id={$post_id}");
}
