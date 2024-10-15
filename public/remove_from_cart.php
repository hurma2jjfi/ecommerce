<?php
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Удаление товара из корзины
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}

header('Location: cart.php');
exit;
?>