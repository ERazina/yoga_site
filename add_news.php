<?php
define('PAGE', 'auth');
include_once "header.html";
include_once "menu.php";
include_once "config.php";

?>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

<h1>Добавить новость</h1>

<?php

if (isset($_POST['title']) && isset($_POST['text'])){
// Переменные из формы
$title = $_POST['title'];
$text = $_POST['text'];
//$date = $_POST['datepicker'];

// Подключение к базе данных
$db = mysql_connect(HOST,USER,PASS,DB) OR DIE("Не могу создать соединение ");
    
$result = mysql_query("INSERT INTO `yoga`.`news` (`id`, `title`, `text`) VALUES ('', '$title', '$text')");

if ($result = 'true'){
    echo "Информация занесена в базу данных";
}
    else{
    echo "Информация не занесена в базу данных";
    }
}

?>

<form method="post">
    <div><input type = "text" name = "title" class = "transparent" placeholder="Введите название"></div>
    <div><textarea rows="10" cols="60" name="text"></textarea></div>
    <!--<div><input type = "text" id = "datepicker" placeholder="Выберете дату"></div>-->
    <div><input type = "submit" value = "Отправить"></div>
</form>

<?php
include_once "footer.html";
?>

