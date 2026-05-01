<?php

namespace src\Models;

use PDO;

class Task {
    private $conn;
    private $table = "tache";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Recuperation de toutes ls d'un utilisateur 
    public function getTasksByUser($utilisateur_id){
        $query = "SELECT * FROM " . $this->table . " WHERE utilisateur_id = :utilisateur_id";
        $stmt = $this->conn->prepare($query);
        $stmt ->bindParam(":utilisateur_id", $utilisateur_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Ajouter une tache
    public function createTask($titre, $description, $utilisateur_id){
        $query = "INSERT INTO " . $this->table . " (titre, description, utilisateur_id)
                 VALUES (:titre, :description, :utilisateur_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titre" , $titre);
        $stmt->bindParam(":description" , $description);
        $stmt->bindParam(":utilisateur_id", $utilisateur_id);

        return $stmt->execute();
    }

    //Supprimer une tâche
    public function deleteTask($id){
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    //Modifier le statut d'une tache
    public function updateStatus($id, $statut){
        $query = "UPDATE " .$this->table . " SET statut = :statut WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":statut", $statut);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
    
}