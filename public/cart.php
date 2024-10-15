<?php
session_start();
require '../includes/functions.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1>Корзина пуста</h1>";
    exit;
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
</head>
<body>
    <h1>Корзина</h1>
    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Итог</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $item): 
                $total += $item['price'] * $item['quantity']; ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= $item['price'] ?> руб.</td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $item['price'] * $item['quantity'] ?> руб.</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Общая сумма: <?= $total ?> руб.</h2>
    <a href="checkout.php">Оформить заказ</a>
</body>
</html>