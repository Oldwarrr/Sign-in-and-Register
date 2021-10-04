<?php
function pre($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}



function resultQuery($result){
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<p>Данные из базы : $row[name] ----- $row[age] ----- $row[salary] </p>";
        }
    }else{
        echo "Нет результатов таблицы";
    }
}