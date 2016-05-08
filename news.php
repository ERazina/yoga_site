<?php
define('PAGE', 'news');
include_once "header.html";
include_once "menu.php";
include_once "config.php";
?>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

<h1>Наши новости</h1>

<?php

if (isset($_POST['title']) && isset($_POST['text'])){
// Переменные из формы
$title = trim(htmlspecialchars($_POST['title']));
$text = trim(htmlspecialchars($_POST['text']));
    
$uploaddir = 'images/';
// это папка, в которую будет загружаться картинка
$apend=date('YmdHis').rand(100,1000).'.jpg'; 
// это имя, которое будет присвоенно изображению 
$uploadfile = "$uploaddir$apend"; 
//в переменную $uploadfile будет входить папка и имя изображения

// В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
// И проходит ли изображение по весу. В нашем случае до 512 Кб
if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=512000)) 
{ 
// Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб 
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
   { 
   //Здесь идет процесс загрузки изображения 
   $size = getimagesize($uploadfile); 
   // с помощью этой функции мы можем получить размер пикселей изображения 
     if ($size[0] < 501 && $size[1]<1501) 
     { 
     // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
     echo "Файл загружен"; 
        header("Location: news.php");
     } else {
     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
     unlink($uploadfile); 
     // удаление файла 
     } 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Размер файла не должен превышать 512Кб";
} 
    
// Подключение к базе данных
$db = mysql_connect(HOST,USER,PASS,DB) OR DIE("Не могу создать соединение ");
$result = mysql_query("INSERT INTO `yoga`.`news` (`id`, `title`, `text`, `date`, `img`) VALUES ('', '$title', '$text', NOW(), '$apend')");

if ($result = 'true'){
    echo "Новость записана";
}
    else{
    echo "Информация не занесена в базу данных";
    }
}

$db = mysql_connect(HOST, USER, PASS, DB);
mysql_select_db("yoga", $db);
$sql = "SELECT 
    `date`, `title`, `text`, `img`
    FROM `news` 
    ORDER BY `date` DESC
    LIMIT 5";
$select_result = mysql_query($sql, $db);
// выводим в форму все данные из таблицы
while($data = mysql_fetch_array($select_result)){ 
    echo '<div class = "news">';
    //echo;
    echo '<h2>' . $data['title'] . '</h2>'; 
    echo '<img src="images/'.$data['img'].'" >';
    echo '<p>' . $data['text'] . '</p>';
    echo '<p>' . $data['date'] . '</p>';
    echo '</div>';
    
} 
?>

<?php
include_once "footer.html";
?>

