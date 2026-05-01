<?php

namespace src\Routes;

use src\Controllers\UserController;
use src\Controllers\TaskController;

require_once __DIR__ ."/../Config/Database.php";
require_once __DIR__ ."/../Models/User.php";
require_once __DIR__ ."/../Services/UserService.php";
require_once __DIR__ ."/../Controllers/UserController.php";

require_once __DIR__ ."/../Models/Task.php";
require_once __DIR__ ."/../Services/TaskService.php";
require_once __DIR__ ."/../Controllers/TaskController.php";
/*
 //USER
$db = (new Database())->getConnection();

$controller = new UserController($db);

if($_GET['action'] === 'login') {
    $controller->login();
}

//TASKS

$taskController = new TaskController($db);

if(isset($_GET['action'])){
    if($_GET['action'] === 'tasks'){
        $taskController->index();
    }
    if($_GET['action'] === 'createTask'){
        $taskController->create();
    }
    if($_GET['action'] === 'deleteTask'){
        $taskController->delete();
    }
    if($_GET['action'] === 'updateStatus'){
        $taskController->updateStatus();
    }
}*/

function handleRequest($db){
    $action = $_GET['action'] ?? 'Home';

    switch ($action){

    case 'login':
        $controller = new UserController($db);
        $controller->login();
        break;

    case 'tasks':
        $controller = new TaskController($db);
        $controller->index();
        break;

    case 'createTask':
        $controller = new TaskController($db);
        $controller->create();
        break;

    case 'deleteTask':
        $controller = new TaskController($db);
        $controller->delete();
        break;

    case 'updateStatus':
        $controller = new TaskController($db);
        $controller->updateStatus();
        break;

    case 'logout':
        $controller = new UserController($db);
        $controller->logout();
        break;
    case 'dashboard':
        require __DIR__ .'/../Views/dashboard.php';
        break;

    default:
    header("Location: index.php?action=login");
    exit;
    break;
    }

}