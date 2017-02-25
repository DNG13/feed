<?php
//connection to database
$connect = mysqli_connect('localhost', 'root', '*Cnfc2117');

if(!$connect){
    die('Помилка підключення: ' . mysqli_connect_error($connect));
}

//select db 'feed'
mysqli_select_db($connect, 'feed');