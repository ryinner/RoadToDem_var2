<?php

use App\models\Users;

require_once '../vendor/autoload.php';

$users = new Users;

$users->create();