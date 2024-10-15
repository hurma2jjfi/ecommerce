<?php
session_start();
// Обработка заказа после оформления
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header('Location: cart.php');
    exit;
}

// Здесь вы можете обработать заказ, например, сохранить его в базе данных

// Очистка корзины после завершения заказа
unset($_SESSION['cart']);

echo "Ваш заказ успешно оформлен!";
?>
<a href="index.php">Вернуться на главную</a>