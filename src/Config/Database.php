<?php 

namespace src\Config;

use PDO;
use PDOException;

class Database {
    public $conn;

    public function getConnection(){

    $host = getenv('DB_HOST');
    $db = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');

        try {
            $this->conn = new PDO ("mysql:host=$host;dbname=$db", $user, $pass);

        }catch(PDOException $exception){
            echo "Erreur de connexion :" . $exception->getMessage();
        }
        return $this->conn;
    }
}