<?php
//connection to database
$connect = mysqli_connect('localhost', 'root', '*Cnfc2117');

if(!$connect){
    die('Помилка підключення: ' . mysqli_connect_error($connect));
}

//select db 'feed'
mysqli_select_db($connect, 'feed');

// make query
$query = mysqli_query($connect, 'select * from posts WHERE id=2');

// return only first row of query
$rows = mysqli_fetch_assoc($query);

//echo data
echo $rows['id'], $rows['title'] , ' <br> ';

mysqli_query($connect, "");

// echo data as object
$query = mysqli_query($connect, 'select * from posts');
$rows = mysqli_fetch_object($query);
echo $rows->id, $rows->title, ' <br> ';
echo"<pre>";
var_dump($rows);
echo"<pre><hr>";

$query = mysqli_query($connect, 'select * from posts where id in(1, 5)');
while ($post = mysqli_fetch_object($query)){
    echo"<pre>";
    var_dump($post);
    echo"<pre>";