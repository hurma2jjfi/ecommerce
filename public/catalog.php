<?php
require '../includes/db.php';
require '../includes/functions.php';

// Получение товаров из БД
$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог</title>
</head>
<body>
<h1>Каталог товаров</h1>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="../uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h2><?= $product['name'] ?></h2>
                <p>Цена: <?= $product['price'] ?> руб.</p>
                <button onclick="addToCart(<?= $product['id'] ?>)">В корзину</button>
            </div>
        <?php endforeach; ?>
    </div>


<script src="../js/script.js"></script>
</body>
</html>