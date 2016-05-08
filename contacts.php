<?php
define('PAGE', 'contacts');
include_once "header.html";
include_once "menu.php";
?>

<h1>Наши контакты</h1>
<div id = "contacts_flexbox">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1999.0808500289634!2d30.337400915856797!3d59.93080058187337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469631a86fe8a695%3A0xb43e15f0df3dc885!2z0L3QsNCxLiBQ0LXQutC4INCk0L7QvdGC0LDQvdC60LgsIDM5LCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTEwMjM!5e0!3m2!1sru!2sru!4v1462616954812" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<div id = contacts_form>
    <h2 id = "contacts_header">Мы всегда рады Вам</h2>
    <p><b>Наш адрес:</b> Санкт-Петербург, наб. Фонтанки, д.39</p>
    <p><b>Телефон:</b> +7(921)318-15-20</p>
</div>
</div>
<?php
include_once "footer.html";
?>