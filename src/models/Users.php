<?php

namespace App\models;

use App\App;

class Users
{
    public function create()
    {
        $db = App::db();

        $query = $db->prepare('SELECT * FROM `users` WHERE `email`="'.$_POST["email"].'" OR `login`="'.$_POST["login"].'"');
        $query->execute();

        if ($query->fetchAll() == []) {
            if ($_POST["password"] == $_POST["password_repeat"]) {
                $query = $db->prepare('INSERT INTO `users`(`name`, `surname`, `patronymic`, `email`, `login`, `password`) VALUES ("'.$_POST["name"].'","'.$_POST["surname"].'", "'.$_POST["patronymic"].'","'.$_POST["email"].'","'.$_POST["login"].'","'.password_hash($_POST["password"], PASSWORD_DEFAULT).'")',);
                $query->execute();
                echo "Успешно";
            } else {
                echo "Пароли не совпадают";
            }
        } else {
            echo 'Такой аккаунт уже есть';
        }
    }

    public function login()
    {
        $db = App::db();

        $query = $db->prepare('SELECT * FROM `users` WHERE `login`="'.$_POST["login"].'"');
        $query->execute();

        if (($query = $query->fetch()) != false) {
            if (password_verify($_POST['password'], $query['password'])) {
                $_SESSION['login'] = $_POST["login"];
                $_SESSION['is_admin'] = $query['is_admin'];
                echo "Успешно";
            } else {
                echo 'Неверные данные';
            }
        } else {
            echo 'Неверные данные';
        }
    }
}

