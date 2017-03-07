<?php

session_start();

function  set_flash_message($key, $message_text){
    $_SESSION[$key] = $message_text;
}
function show_flash_message($key){
    $message = '';
    if(!empty($_SESSION[$key])){
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
    }
    return $message;
}

function get_message($i, $type_text, $title=false)
{
    $messages = [
        "Baш $type_text '$title' збережено!",
        "Помилка створення $type_text.",
        "Помилка видалення.",
        "Baш  $type_text видалено.",
        "Введіть коректний id.",
        "Ваш $type_text  не знайдено.",
        "Помилка оновлення $type_text.",
        "Ваш $type_text '$title' оновлено!"
    ];
    return $messages[$i];
}