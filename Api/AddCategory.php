<?php

use App\models\Categories;

require_once '../vendor/autoload.php';

session_start();

$category = new Categories;

$category->create();