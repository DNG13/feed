<?php

require_once 'lib/auth_check.php';
include_once 'lib/flash_messages.php';
include_once 'lib/db_queries.php';
require_once 'lib/uploader.php';

check_user_auth();

$id = $_GET['id'];
if(!empty($id)) {
    if (!delete_records('posts', 'id', $id)) {
        set_flash_message('message', get_message(2));
    } else {
        //delete all comments to the post
        delete_records('comments', 'post_id', $id);

        //delete dir with picture
        $target_dir="./upload/posts/$id/";
        delete_dir($target_dir);
        set_flash_message('message', get_message(3, 'пост'));
    }
}else{
    set_flash_message('message', get_message(4));
}
return header('Location:/');