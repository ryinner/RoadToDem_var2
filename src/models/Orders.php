<?php

namespace App\models;

use App\App;

class Orders
{
    public function create()
    {
        $db = App::db();
        $query = $db->query('SELECT * FROM `users` WHERE `login`="'.$_POST["login"].'"');

        $user = $query->fetch();

        if (!password_verify($_POST['password'], $user['password'])) {
            echo 'Пароль неправильный!';
        } else {
            $query = $db->prepare('INSERT INTO `orders`(`name`, `user_id`) VALUES (?,?)');
            $query->execute([rand(), $user['id']]);

            foreach($_SESSION['cart'] as $key => $good) {
                $query = $db->query('INSERT INTO `goods_orders`(`good_id`, `order_id`, `count`) VALUES ('.$key.', (SELECT id FROM orders ORDER BY id DESC LIMIT 1) ,'.$good.')');
            }

            echo 'Заказ создан';
        }
    }
}
