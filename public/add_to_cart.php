<?php
session_start();
require '../includes/db.php';
require '../includes/functions.php';

// Получаем данные из POST-запроса
$data = json_decode(file_get_contents('php://input'), true);
$productId = $data['id'] ?? null;

if ($productId) {
    // Получение информации о товаре из базы данных
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch();

    if ($product) {
        // Если корзина еще не существует в сессии, создаем ее
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Проверяем, есть ли уже этот товар в корзине
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] === $productId) {
                $item['quantity']++; // Увеличиваем количество
                $found = true;
                break;
            }
        }

        // Если товара нет в корзине, добавляем его
        if (!$found) {
            $_SESSION['cart'][] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }

        // Возвращаем успешный ответ
        echo json_encode(['success' => true]);
    } else {
        // Возвращаем ошибку, если товар не найден
        echo json_encode(['success' => false, 'message' => 'Товар не найден.']);
    }
} else {
    // Возвращаем ошибку, если ID товара не передан
    echo json_encode(['success' => false, 'message' => 'ID товара не передан.']);
}
?>