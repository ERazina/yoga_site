<?php
define('PAGE', 'auth');
include_once "header.html";
include_once "menu.php";
?>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

<h1>Добавить новость</h1>

<?php
if(!empty($_POST['title'])){
    $title = $_POST['title'];
    echo "$title";
}
?>
<form method="post">
    <div><input type = "text" name = "title" class = "transparent" placeholder="Введите название"></div>
    <input type = "file">
    <div><textarea rows="10" cols="60" name="text"></textarea></div>
    <div><input type = "text" id = "datepicker" placeholder="Выберете дату"></div>
    <div><input type = "submit" value = "Отправить"></div>
</form>

<?php
include_once "footer.html";
?>

