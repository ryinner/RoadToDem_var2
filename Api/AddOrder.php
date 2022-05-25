<?php

use App\models\Orders;

session_start();

require_once '../vendor/autoload.php';

$order = new Orders;