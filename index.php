
<?php
define('PAGE', 'index');
include_once "header.html";
include_once "menu.php";
?>

<h1>наши преимущества:</h1>
<div id = "index-flexbox">
<div class="index_block">
<img src="img/yoga1.jpg" class = "index_image">
  <h2>методика</h2>
    <ul class = "index_list">
        <li class="index_li">Йога Айенгара – самая безопасная и эффективная методика</li>
        <li class="index_li">Йога для начинающих и продолжающих</li>
        <li class="index_li">Йога терапия. Занятия йогой для решения проблем со здоровьем.</li>
        <li class="index_li">Квалифицированные преподаватели.</li>
    </ul> 
</div>
<div class="index_block">
  <img src="img/price3.jpg" class="index_image">
    <h2>цены</h2>
    <ul class = "index_list">
        <li class="index_li">Доступные цены и акции</li>
        <li class="index_li">Занятия не пропадают. Не использованный остаток переноситься на любой следующий абонемент.</li>
        <li class="index_li">Рассрочка и большой срок действия абонементов.</li>
        <li class="index_li">Скидка при продлении абонемента.</li>
        <li class="index_li">Все доступные способы оплаты.</li>
    </ul>
</div>
<div class="index_block">
<img src="img/yoga_clock.jpg" class = "index_image">
  <h2>расписание</h2>
    <ul class = "index_list">
        <li class="index_li">30 занятий в неделю.</li>
        <li class="index_li">Семь дней в неделю: Утро / День / Вечер.</li>
        <li class="index_li">Мини-группы до 6 человек.</li>
        <li class="index_li">Удобная запись</li>
    </ul>
</div>
</div>




<?php
include_once "footer.html";
?>