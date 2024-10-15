<?php
require '../includes/db.php'; // Подключаем базу данных
require '../includes/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Получаем информацию о пользователе из базы данных
    $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $hashedPassword = $stmt->fetchColumn(); // Получаем хэш пароля

    // Проверяем, существует ли пользователь и правильный ли пароль
    if ($hashedPassword && password_verify($password, $hashedPassword)) {
        $_SESSION['user'] = $username; // Сохраняем имя пользователя в сессии
        header('Location: index.php'); // Перенаправляем на главную страницу
        exit;
    } else {
        $error = "Неправильное имя пользователя или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<h1>Вход</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Войти</button>
    </form>

    <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь здесь</a></p>
</body>
</html>