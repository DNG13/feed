<?php

include_once 'lib/flash_messages.php';
include_once 'lib/db_queries.php';

$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$data = [
    'id' => $id,
    'title' => $title,
    'description' => $description
];

$result = update_record('posts', $data, 'id');
if(!$result){
    set_flash_message('message', get_message(6, 'посту'));
}else{
    set_flash_message('message', get_message(7, 'пост', $title));
 }
header('Location:/');