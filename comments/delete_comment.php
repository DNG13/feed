<?php

include_once '../lib/flash_messages.php';
include_once '../lib/db_queries.php';
require_once '../lib/auth_check.php';

check_user_auth();

$post_id = $_SESSION['post_id'];
$id = $_GET['id'];
if(!empty($id)) {
    if (!delete_records('comments', 'id', $id)) {
        set_flash_message('message', get_message(2));
    } else {
        set_flash_message('message',  get_message(3, 'коментар'));
    }
    return header("Location:/show.php?id={$post_id}");
}else{
    set_flash_message('message',  get_message(4));
    return header('Location:/');
}