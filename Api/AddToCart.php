<?php 

use App\models\Goods;

require_once '../vendor/autoload.php';

session_start();

if (!array_key_exists('cart', $_SESSION)) {
    $_SESSION['cart'] = [];
}

$good = Goods::selectById($_POST['good_id']);

if (array_key_exists($_POST['good_id'],$_SESSION['cart'])) {
    if ($good['count'] <= $_SESSION['cart'][$_POST['good_id']]) {
        echo 'Невозможно добавить в корзину, максимум товара в корзине';
    } else {
        $_SESSION['cart'][$_POST['good_id']] += 1;
        echo 'Товар добавлен в корзину';
    }
} else {
    if ($good['count'] < 1) {
        echo 'Невозможно добавить в корзину товар кончился :(';
    } else {
        $_SESSION['cart'][$_POST['good_id']] = 1;
        echo 'Товар добавлен в корзину';
    }
}