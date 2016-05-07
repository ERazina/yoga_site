<?php
define('PAGE', 'prices');
include_once "header.html";
include_once "menu.php";
?>

<h1>С абонементом лучше!</h1>

<p class="p_text">Абонемент — это не только более доступный способ оплаты, но и простая возможность войти в ритм практики, занимаясь йогой регулярно.</p>
<div class = "price-flexbox">
<div class="block">
  <h2>5 занятий</h2>
    <ul class = "index_list">
        <p class = "price">&#8381;2250</p>
        <li class="index_li">1 месяц</li>
        <li class="index_li">450 рублей за занятие</li>
        <li class="index_li">Можно передавать другому</li>
        <li class="index_li">Выгода 250 рублей</li>
    </ul> 
    <a href = "buy.php" class = "price-button"><span>Заказать</span></a>
</div>
<div class="block">
  <h2>9 занятий</h2>
    <ul class = "index_list">
        <p class = "price">&#8381;3600</p>
        <li class="index_li">1 месяц</li>
        <li class="index_li">400 рублей за занятие</li>
        <li class="index_li">Можно передавать другому</li>
        <li class="index_li">Выгода 900 рублей</li>
    </ul> 
    <a href = "mailto:razina_elina@mail.ru" class = "price-button">Заказать</a>
</div>
<div class="block">
  <h2>14 занятий</h2>
    <ul class = "index_list">
        <p class = "price">&#8381;5000</p>
        <li class="index_li">1 месяц</li>
        <li class="index_li">357 рублей за занятие</li>
        <li class="index_li">Можно передавать другому</li>
        <li class="index_li">Выгода 2100 рублей</li>
    </ul> 
    <a href = "mailto:razina_elina@mail.ru" class = "price-button">Заказать</a>
</div>
    </div>
<div class = "price-flexbox">
<div class="block">
  <h2>21 занятие</h2>
    <ul class = "index_list">
        <p class = "price">&#8381;7000</p>
        <li class="index_li">2 месяца</li>
        <li class="index_li">333 рубля за занятие</li>
        <li class="index_li">Можно передавать другому</li>
        <li class="index_li">Выгода 3507 рублей</li>
    </ul> 
    <a href = "mailto:razina_elina@mail.ru" class = "price-button-active">Заказать</a>
</div>
<div id="price-block-free">
  <h2>Без органичений</h2>
    <ul class = "index_list">
        <p class = "price">&#8381;10000</p>
        <li class="index_li">3 месяца</li>
        <li class="index_li">222 рубля за занятие</li>
        <li class="index_li">Можно передавать другому</li>
        <li class="index_li">Выгода зависит от количества посещений</li>
    </ul> 
    <a href = "mailto:razina_elina@mail.ru" id = "price-button-white">Заказать</a>
</div>
<div class="block">
  <h2>1 занятие</h2>
    <ul class = "index_list">
        <p class = "price">&#8381;500</p>
    </ul> 
    <a href = "mailto:razina_elina@mail.ru" class = "price-button">Заказать</a>
</div>
</div>


<?php
include_once "footer.html";
?>