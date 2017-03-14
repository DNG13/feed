<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

include_once '../lib/config.php';
include_once '../lib/flash_messages.php';

if(empty($_POST['login']) || empty($_POST['password'])){
    set_flash_message('message', 'Ви повинні заповнити всі поля!');
    header('Location:/login');
}else{
$user_info = get_user_info();
$login = $_POST['login'];
$password = $_POST['password'];

if($user_info['password'] == md5($password) &&
    $user_info['login'] == $login){
    $_SESSION['auth_user'] = true;
    set_flash_message('message', 'Дякую за вхід!');
    header('Location:/');
}else{
    set_flash_message('message', 'Помилка логіну чи пароля!!!');
    header('Location:/login');
}}
