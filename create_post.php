<?php

include_once 'lib/flash_messages.php';
include_once 'lib/db_queries.php';

$title = $_POST['title'];
$description = $_POST['description'];
$result = create_record('posts', 'title', 'description', $title, $description);
if(!$result){
    set_flash_message('message', get_message(1, 'посту'));
}else{
    set_flash_message('message', get_message(0, 'пост', $title));
}
header('Location:/');
