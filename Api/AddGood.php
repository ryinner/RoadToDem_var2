<?php

use App\models\Goods;

require_once '../vendor/autoload.php';

session_start();

$good = new Goods;

$good->create();