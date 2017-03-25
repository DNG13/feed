<?php

function uploader($post_type, $id){
    $target_dir="./upload/$post_type/$id/";
    if(!is_dir($target_dir)){
        umask(0000);
        if(!mkdir($target_dir, 0777, true)){
            die('Не вдалось ствротити директорію...');
        }
    }
    $base_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir. $base_name ;
    if (!empty($_FILES["file"])) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            return $base_name;
        }
    }
}

function delete_dir($target_dir){
    if (is_dir($target_dir)) {
        $objects = scandir($target_dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($target_dir."/".$object) == "dir") {
                    delete_dir($target_dir."/".$object);
                } else {
                    unlink($target_dir."/".$object);
                }
            }
        }
        reset($objects);
        rmdir($target_dir);
    }
}
