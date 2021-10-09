<?php
session_start();
require_once('includes/db.php');
require_once('includes/functions.php');
$sql = "SELECT * FROM `students`";



?>
<a href="index.php">Главная страница</a>
<style>
    table,tr,td{
        border:  1px solid black;
        border-collapse: collapse;
        padding: 7px;
    }
    .add-form{
        margin-top: 30px;
        padding: 20px;
        border: 2px solid black;
        
        width: fit-content;
        box-sizing: border-box;
    }
    .block{
        display: block;
        margin-top: 10px;
    }
    .change,.change:visited{
        color: #000;
    }
    
    span{
        padding-left: 60px;
    }
    .range {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: #444;
    height: 3px;
    vertical-align: bottom;
    }
    .range::-webkit-slider-thumb{
        appearance: none;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #444;
    }
    .block.range{
        margin-bottom: 20px;
    }
    .rangeValue{
        border: 1px solid #444;
        padding: 5px;
        width: fit-content;
        margin-left: 40px;
        width: 32px;
        text-align: center;
    }
    input[value = 'Отправить']{
        

        background-color: #fff;
        color: #444;
        border: 1px solid #444;

        padding: 5px 10px;

        cursor: pointer;

        box-sizing: border-box;
    }
    input[value = 'Отправить']:hover{
        background-color: #444;
        color: #fff;
    }

    

</style>




<!-- Внесли -->
<?php
    
    if(!empty($_POST)){
        $addName = $_POST['name'];
        $addAge = $_POST['age'];
        $addSalary = $_POST['salary'];
        if(!empty($addName)){
            $add = $mysql->query("INSERT INTO `students`(name,age,salary) 
            VALUES(
            '$addName',
            '$addAge',
            '$addSalary'
            )
            ");
            echo "<p style = 'margin-bottom: 20px'>Добавлен 1 человек</p>";
            header('Location: table.php');
        }else{
            echo "<p style = 'margin-bottom: 20px'>Заполните поле Имя</p>";
            header('Location: table.php');
        }
    }else{
        // echo 'Проверочное сообщение пустого массива $_POST';
    }



?>





<?php
if(isset($_GET['del'])){
    $id = (integer)$_GET['id'];
    $delete = $mysql->query("DELETE FROM `students` WHERE `id` = '$id'");
   
}



$result = $mysql->query($sql);
?>





<form class="add-form" action="" method="POST">
    <p>Добавить человека</p>
    <input class="block" type="text" name="name">
    <span class="block rangeValue" id="rangeValueAge">18</span>
    <input class="block range" type="range" name="age" value="18" min="18" max="50" onchange="rangeSlideAge(this.value)" onmousemove="rangeSlideAge(this.value)">
    <span class="block rangeValue" id="rangeValueSalary">100</span>
    <input class="block range" type="range" name="salary" value="100" min="100" max="5000" step="100" onchange="rangeSlideSalary(this.value)" onmousemove="rangeSlideSalary(this.value)">
    <input class="block" type="submit" name="submit" value="Отправить">
</form>
<script type="text/javascript">
    function rangeSlideAge(value){
        document.getElementById('rangeValueAge').innerHTML = value;
    }
    function rangeSlideSalary(value){
        document.getElementById('rangeValueSalary').innerHTML = value;
    }
</script>




<!-- Вывели -->
<table>


    <?php

    
    while($row = $result->fetch_assoc()){
        echo "<tr>";
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $salary = $row['salary'];

            echo "
            <form action='' method='GET'>
            <input type = 'hidden' name = 'id' value = '$id'>
            <td>$name</td>
            <td>$age</td> 
            <td>$salary</td>
            <td><input type = 'submit' name = 'del' value = 'Удалить'></td>
            <td><a href= 'table-change.php?id&=$id' name = 'change' class = 'change' value = ''>Редактировать</a></td>
            </form>
            ";

        echo "</tr>";
        
    }
    
    ?>

</table>

<!-- 
последовательность:
Отправляется форма - данные добавляются в базу - данные получаются из базы - данные выводятся в браузер -->








