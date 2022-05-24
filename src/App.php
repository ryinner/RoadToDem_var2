<?php

namespace App;

use PDO;

class App
{
    // Запуск приложения
    public function init(string $page): void
    {
        $this->render($page);
    }
    // Сборка страницы
    private function render(string $page): void
    {
        require_once 'views/layout/header.php';
        require_once 'views/pages/'.$page.'.php';
        require_once 'views/layout/footer.php';
    }
    // db
    public static function db(): PDO
    {
        return new PDO('mysql:host=localhost;dbname=exam;charset=utf8;', 'root', '');
    }
}
