<?php

require_once 'lib/auth_check.php';
require_once 'lib/flash_messages.php';
require_once 'lib/db_queries.php';
require_once 'lib/uploader.php';

check_user_auth();

$title = $_POST['title'];
$description = $_POST['description'];
$data = [
    'title'=> $title,
    'description' => $description
];

$result = create_record('posts', $data);
$last_id = mysqli_insert_id($connect);
$img = uploader('posts', $last_id);
$update_data = [
    'id' =>  $last_id,
    'file_name' => $img
];
$result = update_record('posts', $update_data, 'id');

if(!$result){
    set_flash_message('message', get_message(1, 'посту'));
}else{
    set_flash_message('message', get_message(0, 'пост', $title));
}
header('Location:/');
