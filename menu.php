<nav>
    <ul>
        <li <?php if (PAGE == 'index') echo 'class = "active"'; ?>><a href = "index.php">Главная</a></li>
        <li <?php if (PAGE == 'about') echo 'class = "active"'; ?>><a href = "about.php">О нас</a></li>
        <li <?php if (PAGE == 'prices') echo 'class = "active"'; ?>><a href = "prices.php">Цены</a></li>
        <li <?php if (PAGE == 'schedule') echo 'class = "active"'; ?>><a href = "schedule.php"> Расписание</a></li>
                <li <?php if (PAGE == 'news') echo 'class = "active"'; ?>><a href = "news.php"> Новости</a></li>
        <li <?php if (PAGE == 'contacts') echo 'class = "active"'; ?>></li><a href = "contacts.php">Контакты</a>
    </ul>

</nav>
