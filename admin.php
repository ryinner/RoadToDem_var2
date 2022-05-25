<?php

use App\App;

require_once 'vendor/autoload.php';

$app = new App;

session_start();

if ($_SESSION['is_admin'] == 0) {
    header("Location: /index.php");
}

$app->init('admin');
