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

$db = mysql_connect(HOST, USER, PASS, DB);
mysql_select_db("yoga", $db);
$sql = "SELECT 
    `date`, `title`, `text` 
    FROM `news` 
    ORDER BY `date` DESC
    LIMIT 5";
$select_result = mysql_query($sql, $db);
// выводим в форму все данные из таблицы
while($data = mysql_fetch_array($select_result)){ 
    echo '<div class = "news">';
    //echo;
    echo '<h2>' . $data['title'] . '</h2>'; 
    echo '<p>' . $data['text'] . '</p>';
    echo '<p>' . $data['date'] . '</p>';
    //imagejpeg($im);
    echo '</div>';
    
} 
echo '<a href = "index.php">Читать дальше</a>';
?>

<?php
include_once "footer.html";
?>

