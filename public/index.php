<?php
session_start();
// Проверка на авторизацию пользователя
$is_logged_in = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <h1>Добро пожаловать в наш интернет-магазин</h1>
        <nav>
            <ul>
                <li><a href="about.php">О нас</a></li>
                <li><a href="catalog.php">Каталог</a></li>
                <li><a href="contact.php">Где нас найти?</a></li>
                <li><a href="cart.php">Корзина</a></li>
                <?php if (!$is_logged_in): ?>
                    <li><a href="login.php">Вход</a></li>
                <?php else: ?>
                    <li><a href="logout.php">Выйти</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <!-- Содержимое главной страницы -->
</body>
</html>