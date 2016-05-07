<?php
define('PAGE', 'about');
include_once "header.html";
include_once "menu.php";
include_once "config.php";



if (isset($_POST['title']) && isset($_POST['text'])){
// Переменные из формы
$title = $_POST['title'];
$text = $_POST['text'];
//$date = $_POST['datepicker'];

// Параметры для подключения
//$db_host = "localhost"; 
//$db_user = "root"; // Логин БД
//$db_password = ""; // Пароль БД
///$db = "yoga";
//$db_table = `news`; // Имя Таблицы БД

// Подключение к базе данных
$db = mysql_connect(HOST,USER,PASS,DB) OR DIE("Не могу создать соединение ");


// Выборка базы
//mysqli_select_db("yoga");
$result = mysql_query("INSERT INTO `yoga`.`news` (`id`, `title`, `text`) VALUES ('', '$title', '$text')");

if ($result = 'true'){
    echo "Информация занесена в базу данных";
}else{
    echo "Информация не занесена в базу данных";
}
}
?>
<h1>Купить абонемент</h1>
<form method ="post">
        Выберете абонемент<select class="cs-select cs-skin-rotate">
        <option value="1">Без ограничений</option>
        <option value="2">5 занятий</option>
        <option value="3">9 занятий</option>
        <option value="4">14 занятий</option>
        <option value="5">21 занятие</option>
    </select>
    <div><input type = "text" name = "surname" placeholder = "Фамилия" required></div>
    <div><input type = "text" name = "abonement" placeholder="Имя" required></div>
    <div><input type = "text" name = "abonement" placeholder = "Телефон" required></div>
    <div><input type = "text" name = "abonement" placeholder = "Email" required></div>
    <div><input type = "submit" value = "Купить"></div>
</form>


<?php
include_once "footer.html";
?>