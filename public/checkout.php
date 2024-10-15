<?php
session_start();
// Проверка наличия товаров в корзине
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Оформление заказа</h1>
    <form method="POST" action="process_order.php">
        <label for="name">Ваше имя:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="address">Адрес доставки:</label>
        <input type="text" id="address" name="address" required>
        
        <h2>Ваши товары:</h2>
        <ul>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li><?= htmlspecialchars($item['name']) ?> - <?= $item['quantity'] ?> шт.</li>
            <?php endforeach; ?>
        </ul>
        
        <button type="submit">Подтвердить заказ</button>
    </form>
</body>
</html>