<?php
define('PAGE', 'about');
include_once "header.html";
include_once "menu.php";
?>
<h1>Регистрация</h1>
<div id = "reg_form">
<form method="post">
    <div>Имя*<input type = "text" name = "name" placeholder="Иван" required></div>
    <div>Фамилия*<input type = "text" name = "surname" placeholder="Иванов" required></div>
    <div>Логин*<input type = "login" name = "login" placeholder="login" required></div>
    <div>Пароль*<input type = "pass" name = "login" placeholder="pass" required></div>
    <div>Email*<input type = "text" name = "email" placeholder="ivanov@ivanov.ru" required></div>
    <input type = "submit" value = "Зарегистрироваться">
</form>
</div>
* - поля, обязательные для заполнения
<?php
include_once "footer.html";
?>