<?php
$mysql = new mysqli('logining','root','','logining');
$mysql->query("SET NAMES 'utf8'");

if($mysql == false){
    echo 'Не удалось подключиться к базе данных! <br>';
    echo mysqli_connect_error();
    exit;
}else{
    echo 'Подключение к базе данных успешно! <hr>';
}