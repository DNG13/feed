<?php

function uploader($post_type, $id){
    $target_dir="./upload/$post_type/$id/";
    if(!is_dir($target_dir)){
        if(!mkdir($target_dir)){
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
