<?php

namespace src\Models;

use PDO;

class User {
    private $conn;
    private $table_name = "utilisateur";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($email, $mot_de_passe){
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //Vertification du MP haché en BDD
        if($user && password_verify($mot_de_passe, $user['mot_de_passe'])){
            return $user;
        }
        return false;
    }
}