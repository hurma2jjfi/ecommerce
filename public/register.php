<?php
require '../includes/db.php'; // Подключаем базу данных
require '../includes/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Регистрация пользователя
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Проверка на существование пользователя
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $exists = $stmt->fetchColumn();
    
    if ($exists) {
        echo "Пользователь с таким именем уже существует.";
    } else {
        // Вставка в базу данных
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        
        if ($stmt->execute(['username' => $username, 'password' => $password])) {
            $_SESSION['user'] = $username; // После регистрации сразу авторизуем пользователя
            header('Location: index.php');
            exit;
        } else {
            echo "Произошла ошибка при регистрации.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Регистрация</h1>
    
    <form method="POST" action="register.php">
        <label for="username">Имя пользователя:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Зарегистрироваться</button>
    </form>

    <p>Уже есть аккаунт? <a href="login.php">Войдите здесь</a></p>
</body>
</html>