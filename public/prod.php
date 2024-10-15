<?php
require '../includes/db.php';
require '../includes/functions.php';

// Получение товаров из БД
$stmt = $pdo->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары - ООО - «Copy Star»</title>
</head>
<body>
<h1>Товары и рубрики сайта</h1>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="../uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h2><?= $product['name'] ?></h2>
                <p>Цена: <?= $product['price'] ?> руб.</p>
            </div>
        <?php endforeach; ?>
    </div>


<script src="../js/script.js"></script>
</body>
</html>