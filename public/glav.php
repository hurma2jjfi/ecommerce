<?php
session_start();
// Проверка на авторизацию пользователя
$is_logged_in = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ООО - «Copy Star»</title>
</head>
<body>
<header>
        <h1>Добро пожаловать в наш интернет-магазин</h1>
        <nav>
            <ul>
                <li><a href="about.php">О нас</a></li>
                <li><a href="prod.php">Товары сайта</a></li>
                <li><a href="contact.php">Где нас найти?</a></li>
                <?php if (!$is_logged_in): ?>
                    <li><a href="login.php">Вход</a></li>
                <?php else: ?>
                    <li><a href="logout.php">Выйти</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>
</html>