<?php

namespace App\models;

use App\App;

class Categories
{
    public function create()
    {
        $db = App::db();

        $query = $db->prepare('SELECT * FROM `categories` WHERE `name` = ?');

        $query->execute([$_POST['category']]);

        if ($query->fetchAll() == [] ) {
            $query = $db->prepare('INSERT INTO `categories`(`name`) VALUES (?)');
            $query->execute([$_POST['category']]);
            $_SESSION['message']['category'] = 'Категория добавлена';
        } else {
            $_SESSION['message']['category'] = 'Категория уже есть';
        }

        header('Location: /admin.php');
    }

    public static function select()
    {
        $db = App::db();

        $query = $db->query('SELECT * FROM `categories`');

        return $query->fetchAll();
    }

    public function delete()
    {
        $db = App::db();

        $query = $db->prepare('DELETE FROM `categories` WHERE `id` = ?');
        $query->execute([$_POST['category']]);
        $_SESSION['message']['category_delete'] = 'Категория удалена';
        header('Location: /admin.php');
    }
}