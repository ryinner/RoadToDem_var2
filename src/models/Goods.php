<?php

namespace App\models;

use App\App;

class Goods
{
    public function create()
    {
        $db = App::db();

        $query = $db->prepare('INSERT INTO `goods`( `name`, `price`, `country`, `model`, `year`, `count`, `photo`, `category_id`) VALUES (?,?,?,?,?,?,?,?)');

        move_uploaded_file($_FILES['photo']['tmp_name'], '../img/'.$_FILES['photo']['name']);
        $query->execute([$_POST['name'], $_POST['price'],$_POST['country'],$_POST['model'],$_POST['year'],$_POST['count'],$_FILES['photo']['name'],$_POST['category']]);

        $_SESSION['message']['good'] = 'Товар добавлен';

        header('Location: /admin.php');
    }

    public function delete()
    {
        $db = App::db();

        $query = $db->prepare('DELETE FROM `goods` WHERE `id` = ?');
        $query->execute([$_POST['good']]);
        $_SESSION['message']['good_delete'] = 'Товар удален';
        header('Location: /admin.php');
    }

    public static function select()
    {
        $db = App::db();

        $query = $db->query('SELECT * FROM `goods`');

        return $query->fetchAll();
    }

    public static function selectById($id)
    {
        $db = App::db();

        $query = $db->prepare('SELECT * FROM goods g WHERE id = ?');

        $query->execute([$id]);

        return $query->fetch();
    }

    public static function selectInner() {
        $db = App::db();

        $where = "WHERE 1=1";
        if (!empty($_GET['category'])) {
            $where = " WHERE c.id = " . $_GET['category'];
        }

        $orderBy = ' ORDER BY g.id';

        if (!empty($_GET['type'])) {
            $orderBy = " ORDER BY ".$_GET['type'];
        }

        $query = $db->query('SELECT g.name, g.id, g.price, g.country, g.model, g.year, g.photo, g.count, c.name AS category FROM goods g LEFT JOIN categories c ON  g.category_id  = c.id '.$where.$orderBy);

        return $query->fetchAll();
    }

    public static function selectCart()
    {
        $db = App::db();
        
        $cartItems = implode(',', array_keys($_SESSION['cart']));

        $query = $db->query('SELECT * FROM goods WHERE id IN ('. $cartItems.')');

        return $query->fetchAll();
    }

    public static function selectSlider()
    {
        $db = App::db();

        $query = $db->query('SELECT * FROM goods ORDER BY id DESC LIMIT 5');

        return $query->fetchAll();
    }
}
