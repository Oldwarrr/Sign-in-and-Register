<?php

include('includes/db.php');
include('includes/functions.php');




?>

<p style="text-transform: uppercase; font-size: 22px;"><b>Регистрация</b></p>

<form method="POST">
    <input type="text" placeholder="Введите логин" name="login">
    <input type="text" placeholder="Введите пароль" name="password">
    <input type="submit">
    <a href="index.php" class="registration-btn">Перейти к авторизации</a>
</form>
<?php

if(!empty($_POST)){
    if(!empty($_POST['login']) && !empty($_POST['password'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $result = $mysql->query("SELECT `login` FROM `users` WHERE `login` = '$login'");
        if($result->num_rows > 0){
            echo "Такое имя уже существует";
        }else{
            $result = $mysql->query("INSERT INTO `users`(login,password) VALUES ('$login','$password')");
            echo "Регистрация прошла успешно, пользователь внесён в базу!";
        }
    }else{
        echo "Заполните пустые поля";
    }
    
}else{
    echo "Заполните поля для регистрации";
}


?>