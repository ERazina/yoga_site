

<?php
define('PAGE', 'reg');
include_once "header.html";
include_once "menu.php";
include_once "config.php";
?>
<form method = "post">
    <div><input type="text" name="login"></div>
    <div><input type="password" name="pass"></div>
    <div><input type="submit" value="Поехали!"></div>
</form>

<?php
if(!empty($_POST)){
    include_once "function.php";
    
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $pass = md5($_POST['pass']);
    
    $query = mysqli_query($db, "
    SELECT `id` FROM `users` WHERE `login` = '$login'
    ");
    
    if(mysqli_num_rows($query) == 0){
        $query = mysqli_query($db, "
        INSERT INTO `users`
        SET `login` = '$login',
        `pass` = '$pass'
        ");
        
        if(mysqli_errno($db) == 0){
            $id = mysqli_insert_id($db);
            $session = getHash();
            $token = getHash();
            echo $session.'</br>';
            echo $token;
            
            mysqli_query($db, "
            INSERT INTO `connect` SET
            `id_user` = $id,
            `session` = '$session',
            `token` = '$token';
            ");
            
            setcookie('s', $session);
            setcookie('t', $token);
            header("Location: auth.php");
            
        }
    }
    else{
        echo 'Данный логин уже используется';
    }
}



?>