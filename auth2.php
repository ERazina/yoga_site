
<?php
define('PAGE', 'auth1');
include_once "header.html";
include_once "menu.php";
include_once "config.php";

include_once "function.php"; 

if (!empty($_POST)) { 
$db = mysqli_connect(HOST, USER, PASS, DB); 

$login = mysqli_real_escape_string($db, $_POST['login']); 
$pass = md5($_POST['pass']); 

    $query = mysqli_query($db, " 
SELECT `id` FROM `users` 
WHERE `login` = '$login' 
AND `pass` = '$pass'; 
"); 

if (mysqli_num_rows($query) > 0) { 
    $user = mysqli_fetch_assoc($query); 
    $id = $user['id']; 
    $session = getHash(); 
    $token = getHash(); 

    mysqli_query($db, " 
        INSERT INTO `connect` SET 
        `id_user` = $id, 
        `session` = '$session', 
        `token` = '$token'; 
    "); 

    setcookie('s', $session); 
    setcookie('t', $token); 
    header ("Location: auth.php"); 
} 
else { 
echo "Неверная связка Логин/Пароль!</br>";
    echo '<a href = "index.php">На главную</a>';
} 
}

include_once 'footer.html';
?>
            