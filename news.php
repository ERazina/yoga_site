<?php
define('PAGE', 'news');
include_once "header.html";
include_once "menu.php";
?>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>

<h1>Наши новости</h1>

<?php
if(!empty($_POST['title'])){
    $title = $_POST['title'];
    echo "$title";
}
?>


<?php
include_once "footer.html";
?>

