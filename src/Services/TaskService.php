<?php

namespace src\Services;

use src\Models\Task;

class TaskService{
    private $taskModel;

    public function __construct($db)
    {
        $this->taskModel = new Task($db);
    }

    public function getUserTasks($utilisateur_id){
        return $this->taskModel->getTasksByUser($utilisateur_id);
    }

    public function createTask($titre, $description, $utilisateur_id){
        return $this->taskModel->createTask($titre, $description, $utilisateur_id);
    }

    public function deleteTask($id){
        return $this->taskModel->deleteTask($id);
    }

    public function updateStatus($id, $statut){
        return $this->taskModel->updateStatus($id, $statut);
    }
}