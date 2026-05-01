<?php 

namespace src\Config;

use PDO;
use PDOException;

class Database {
    public $conn;

    public function getConnection(){

    $host = $_ENV['DB_HOST'];
    $db = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $pass = $_ENV['DB_PASS'];

        try {
            $this->conn = new PDO ("mysql:host=$host;dbname=$db", $user, $pass);

        }catch(PDOException $exception){
            die ( "Erreur de connexion à la base");
        }
        return $this->conn;
    }
}