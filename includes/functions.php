<?php
session_start();

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getProductById($id) {
    global $pdo; // Предполагается, что $pdo - это соединение с вашей базой данных
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}


?>