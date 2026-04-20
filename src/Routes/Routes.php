<?php

namespace src\Routes;

use src\Config\Database;
use src\Controllers\UserController;

require_once __DIR__ ."/../Config/Database.php";
require_once __DIR__ ."/../Models/User.php";
require_once __DIR__ ."/../Services/UserService.php";
require_once __DIR__ ."/../Controllers/UserController.php";

$db = (new Database())->getConnection();

$controller = new UserController($db);

if($_GET['action'] === 'login') {
    $controller->login();
}