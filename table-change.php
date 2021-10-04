<?php
require_once(__DIR__ . '/includes/db.php');
require_once(__DIR__ . '/includes/functions.php');

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$id = substr($url, 30);
// $info = $mysql->query("SELECT * FROM `students` WHERE `id`= $id");
// resultQuery($info);
echo "<br>" . "Новые данные :";

?>


<form action="" method="POST" style="margin-top: 20px;">
    <input type = 'hidden' name = 'id' value = '$id'>
    <input type="text" name="name" placeholder="Имя">
    <input type="text" name="age" placeholder="Лет">
    <input type="text" name="salary" placeholder="Зп">
    <input type = "submit" name="change">

</form>

<?php

if(isset($_POST['change'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

    if(empty($name)){
        $name = $mysql->query("SELECT `name` FROM `students` WHERE `id` = '$id'");
    }else{
        $changeName = $mysql->query("UPDATE `students` SET `name` = '$name' WHERE `students` . `id` = '$id'" );
        echo "<li>Имя изменено.</li>";
    }

    if(empty($age)){
        $age = $mysql->query("SELECT `age` FROM `students` WHERE `id` = '$id'");
    }else{
        $changeAge = $mysql->query("UPDATE `students` SET `age` = '$age' WHERE `students` . `id` = '$id'" );
        echo "<li>Количество лет изменено.</li>";
    }

    if(empty($salary)){
        $salary = $mysql->query("SELECT `$salary` FROM `students` WHERE `id` = '$id'");
    }else{
        $changeSalary = $mysql->query("UPDATE `students` SET `salary` = '$salary' WHERE `students` . `id` = '$id'" );
        echo "<li>Зп изменена.</li>";
    }
    
}else{
    // echo "Ошибка";
}



?>
<a href="table.php">Вернуться к базе данных</a>
<?php
$info = $mysql->query("SELECT * FROM `students` WHERE `id`= $id");
echo "<br>";
resultQuery($info);
?>