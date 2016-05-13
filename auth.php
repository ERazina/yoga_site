<?php
define('PAGE', 'auth');
include_once "header.html";
include_once "menu.php";
include_once "config.php";
include_once "function.php";
//$user = getUser(false);
//var_dump($user);
//if (!$user) {header('Location: index.php');}
?>

<h1>Добавить новость</h1>

<form method="post" enctype="multipart/form-data" action = "news.php">
    <div><input type = "text" name = "title" class = "transparent" placeholder="Введите название"></div>
    <input type = "file" name = "userfile">
    <div><textarea rows="10" cols="60" name="text"></textarea></div>
    <div><input type = "submit" value = "Отправить"></div>
</form>

<?php
include_once "footer.html";
?>

