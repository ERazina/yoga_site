<?php
define('PAGE', 'about');
include_once "header.html";
include_once "menu.php";
include_once "config.php";

if (isset($_POST['name']) && isset($_POST['surname'])){
// Переменные из формы
$ticket = (int)$_POST['ticket'];
$name = trim(htmlspecialchars($_POST['name']));
$surname = trim(htmlspecialchars($_POST['surname']));
$phone = trim(htmlspecialchars($_POST['phone']));
$email = trim(htmlspecialchars($_POST['email']));

$db = mysql_connect(HOST, USER, PASS, DB) OR DIE("Не могу создать соединение ");

// Выборка базы
//mysql_select_db("yoga");
    
$sql = mysql_query("
    INSERT INTO `yoga`.`users` 
    (`id`, `name`, `surname`, `email`, `login`, `pass`, `phone`) 
    VALUES (NULL, '$name', '$surname', '$email', NULL, NULL, '$phone');
    ", $db);
    
$sql = mysql_query("
    INSERT INTO `yoga`.`orders` 
    (`id`, `user_id`, `ticket_name`) 
    VALUES (NULL, '2', '$ticket');
    ", $db);
    
$select_result = mysql_query($sql, $db);
    
if($select_result = 'true'){
    echo "Спасибо за покупку. Заберите Ваш абонемент на ресепшен.";
}
    else{
    echo "Информация не занесена в базу данных";
    }
}
?>
<h1>Купить абонемент</h1>
<form method ="post">
        Выберете абонемент<select class="cs-select cs-skin-rotate" name = "ticket">
            <option value="1" selected>Без ограничений</option>
            <option value="2">5 занятий</option>
            <option value="3">9 занятий</option>
            <option value="4">14 занятий</option>
            <option value="5">21 занятие</option>
    </select>
    <div><input type = "text" name = "name" placeholder = "Имя" required></div>
    <div><input type = "text" name = "surname" placeholder="Фамилия" required></div>
    <div><input type = "text" name = "phone" placeholder = "Телефон" required></div>
    <div><input type = "text" name = "email" placeholder = "Email" required></div>
    <div><input type = "submit" value = "Купить"></div>
</form>


<?php
include_once "footer.html";
?>
