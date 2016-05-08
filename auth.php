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
$title = trim(htmlspecialchars($_POST['title']));
$text = trim(htmlspecialchars($_POST['text']));
    
$upload = '/files'; //здесь хранятся картинки
$uploadfile = $upload.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
if(copy($_FILES['uploadfile']['tmp_name'], $uploadfile)){
    echo "<h3>Файл успешно загружен на сервер</h3>";
}
else {
    echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit;
}

// Подключение к базе данных
$db = mysql_connect(HOST,USER,PASS,DB) OR DIE("Не могу создать соединение ");
$result = mysql_query("INSERT INTO `yoga`.`news` (`id`, `title`, `text`, `date`) VALUES ('', '$title', '$text', NOW())");

if ($result = 'true'){
    echo "Новость записана";
}
    else{
    echo "Информация не занесена в базу данных";
    }
}

?>

<form method="post" enctype="multipart/form-data">
    <div><input type = "text" name = "title" class = "transparent" placeholder="Введите название"></div>
    <input type = "file" name = "uploadfile">
    <div><textarea rows="10" cols="60" name="text"></textarea></div>
    <div><input type = "submit" value = "Отправить"></div>
</form>

<?php
include_once "footer.html";
?>

