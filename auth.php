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
  //  $uploads_dir = '/uploads';
//foreach ($_FILES["pictures"]["error"] as $key => $error) {
    //if ($error == UPLOAD_ERR_OK) {
       // $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
       // $name = $_FILES["pictures"]["name"][$key];
       // move_uploaded_file($tmp_name, "$uploads_dir/$name");
   // }
//}
//$img = $_FILES['uploadfile'];  
    
//$upload = '/files'; //в папке файлс будут храниться картинки 
//$tmp_name = $_FILES["uploadfile"]["tmp_name"];
//move_uploaded_file($img["tmp_name"], "$img"); 
    
////$img = imageCreateFromjpeg("/Applications/XAMPP/xamppfiles/htdocs/yoga_site/$img"); 
      
//header("Content-type: image/jpeg"); 
//imagejpeg($name); 
    
//$uploadfile = $upload.basename($_FILES['uploadfile']['name']);

// Копируем файл из каталога для временного хранения файлов:
//if(copy($_FILES['uploadfile']['tmp_name'], $uploadfile)){
 //   echo "<h3>Файл успешно загружен на сервер</h3>";
//}
//else {
  //  echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit;
//}
    
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
        //header("Content-type: image/jpeg"); 
    //imagejpeg($uploadfile);
     } 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Размер файла не должен превышать 512Кб";
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

<form method="post" enctype="multipart/form-data" action = "news.php">
    <div><input type = "text" name = "title" class = "transparent" placeholder="Введите название"></div>
    <input type = "file" name = "userfile">
    <div><textarea rows="10" cols="60" name="text"></textarea></div>
    <div><input type = "submit" value = "Отправить"></div>
</form>

<?php
include_once "footer.html";
?>

