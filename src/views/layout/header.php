<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copy star</title>
    <link rel="stylesheet" href="/style/app.css">
    <script src="/js/functions.js"></script>
</head>
<body>
    
<header>
    <nav class="d-flex space-between">
        <a href="/" class="nav-links">Каталог</a>
        <a href="/about_us.php" class="nav-links">О нас</a>
        <a href="/contacts.php" class="nav-links">Где нас найти?</a>
        <?php if (empty($_SESSION['login'])): ?>
        <a href="/login.php" class="nav-links">Вход</a>
        <a href="/registration.php" class="nav-links">Регистрация</a>
        <?php else: ?>
            <a href="/cart.php" class="nav-links">Корзина</a>
            <a href="/logout.php" class="nav-links">Выход</a>
            <?php if ($_SESSION['is_admin'] == 1): ?>
            <a href="/admin.php" class="nav-links">Админ. панель</a>
            <?php endif; ?>
        <?php endif; ?>
    </nav>
</header>

<main>