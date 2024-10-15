<?php
// Начинаем сессию
session_start();

// Удаляем все переменные сессии
$_SESSION = [];

// Если есть cookies для идентификатора сессии, удаляем их
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"]
    );
}

// Уничтожаем сессию
session_destroy();

// Перенаправляем на страницу входа или главную страницу
header("Location: /public"); // Замените "login.php" на нужный URL
exit;
?>