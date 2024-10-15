function addToCart(productId) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: productId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Товар добавлен в корзину!');
        } else {
            alert('Ошибка при добавлении товара: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
    });
}

// Функция для обновления количества товаров в корзине
function updateCartCount() {
const cartCount = document.getElementById('cart-count'); // Находим элемент для отображения количества товаров
if (cartCount) {
    fetch('/get_cart_count.php') // Запрос на получение количества товаров в корзине
        .then(response => response.json())
        .then(data => {
            cartCount.textContent = data.count; // Обновляем текст элемента с количеством
        })
        .catch(error => console.error('Ошибка при обновлении количества корзины:', error)); // Логируем возможные ошибки
}
}