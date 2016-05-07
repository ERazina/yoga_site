<?php
if (isset($_POST['login']) && isset($_POST['pass'])){
    $login = mysqli_real_escape_string($_POST['login']);
    $pass = md5($_POST['pass']);
    
    $db = mysqli_connect("localhost", "root", "", "yoga");
    
    $query = mysqli_query($db, "
    SELECT `id` FROM `users` 
    WHERE `login` = '$login'
    AND `pass` = '$pass'
    ");
        if(mysqli_errno($db) == 0){
            header("Location: auth.php");
        }
        else{
            echo "Неверная пара логин/пароль";
        }
    }
    else{
        echo "Ошибка авторизации";
    }

?>