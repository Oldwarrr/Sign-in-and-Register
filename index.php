<?php

include('includes/db.php');
include('includes/functions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
    <p><b style="text-transform: uppercase; font-size: 22px;">Авторизация</b></p>
    <form method="POST">
        <input type="text" placeholder="Введите логин" name="login">
        <input type="text" placeholder="Введите пароль" name="password">
        <input type="submit">
        <a href="registration.php" class="registration-btn">Нет аккаунта? Зарегистрироваться</a>
    </form>


<?php
    if(isset($_POST)){
    if(!empty($_POST)){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $check_login = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' ");
        if($check_login->num_rows > 0){
            $result = $mysql->query("SELECT `password` FROM `users` WHERE `login` = '$login'");
            $check_password = $result->fetch_assoc();
        
            if($password == $check_password['password']){
                echo "<li>Вход выполнен успешно</li>";
            }else{
                echo "<li>Неверный пароль</li>";
            }
        }else{
            echo "<li>Такой логин не существует</li>";
        }
    }else{
        echo "<li>Заполните поля Логин и Пароль</li>";
    }
}







?>
<a href="table.php">Открыть таблицу базы данных.</a>

</body>
</html>