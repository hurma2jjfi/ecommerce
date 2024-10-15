<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Где нас найти?</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Контакты</h1>
    <p>Мы находимся по адресу: ул. Примерная, д. 10, г. Москва</p>
    <h2>Связаться с нами:</h2>
    <form method="POST" action="send_message.php">
        <label for="name">Ваше имя:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" required></textarea>
        
        <button type="submit">Отправить</button>
    </form>
</body>
</html>