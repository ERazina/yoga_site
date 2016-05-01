<?php
define('PAGE', 'news');
include_once "header.html";
include_once "menu.php";
?>
<h1>Наши новости</h1>
<p>Добавить новость</p>
<div><input type = "text" name = "title"></div>
<div><input type = "text" name = "text"></div>
<div><input type = "submit" value = "Отправить"></div>

<?php
include_once "footer.html";
?>