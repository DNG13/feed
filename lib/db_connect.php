<?php

include_once 'config.php';
$config = get_db_config();

//connection to database
$connect = mysqli_connect('localhost', $config['user'], $config['password']);

if(!$connect){
    die('Помилка підключення: ' . mysqli_connect_error());
}

//select db 'feed'
mysqli_select_db($connect, 'feed');