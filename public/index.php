<?php
//Doit changer les dependances

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Config/Database.php';
require_once __DIR__ . '/../src/Routes/Routes.php';

use src\Config\Database;

//Charge .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
//Protege la session empechant lacces aux pages
if(!isset($_SESSION['utilisateur']) && ($_GET['action'] ?? '') !== 'login'){
    header("location: index.php?action=login");
    exit;
}

//Connecter la base 
$db = (new Database())->getConnection();

//Apeller les routes (Pass la DB aux routes)
\src\Routes\handleRequest($db); 



?>