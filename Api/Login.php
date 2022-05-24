<?php

use App\models\Users;

require_once '../vendor/autoload.php';

session_start();

$users = new Users;

$users->login();