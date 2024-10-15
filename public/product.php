<?php
require '../includes/db.php';
require '../includes/functions.php';


if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Приведение к целому числу для безопасности
    $product = getProductById($product_id);

    if (!$product) {
        die('Товар не найден.');
    }
} else {
    die('ID товара не указан.');
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['name']) ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1><?= htmlspecialchars($product['name']) ?></h1>
    <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    <p>Цена: <?= $product['price'] ?> руб.</p>
    <p>Характеристики:</p>
    <ul>
        <li>Страна-производитель: <?= htmlspecialchars($product['country']) ?></li>
        <li>Год выпуска: <?= htmlspecialchars($product['year']) ?></li>
        <li>Модель: <?= htmlspecialchars($product['model']) ?></li>
    </ul>
    <button onclick="addToCart(<?= $product['id'] ?>)">В корзину</button>
    <a href="catalog.php">Назад в каталог</a>
</body>
</html>