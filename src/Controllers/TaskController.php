<?php 

namespace src\Controllers;

use src\Services\TaskService;

//Gere les requetes HTTP  (recup des donnees, apelle le service puis redirige)
class TaskController{
    private $taskService;

    public function __construct($db)
    {
        $this->taskService = new TaskService($db);
    }

    //Afficher les taches
    public function index() {
        //Si pas de session renvoie au formulaire de connection
        if(!isset($_SESSION['utilisateur'])) {
            header("Location: index.php?action=login");
            exit;
        } 
        $utilisateur_id = $_SESSION['utilisateur']['id'];
        //recupere les taches
        $taches = $this->taskService->getUserTasks($utilisateur_id);
        //compte les
        $nbTaches = count($taches);

        require __DIR__ .'/../Views/tasks.php';

    }

    // ajouter une tâche
    public function create() {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $titre = htmlspecialchars($_POST['titre']); //evite les injection HTML
            $description = htmlspecialchars($_POST['description']);
            $utilisateur_id = $_SESSION['utilisateur']['id']; 

            $this->taskService->createTask($titre, $description, $utilisateur_id);

            //permet de compter le nombre de taches creer en forma json puis le decoder en format lisible
            $data = json_decode(file_get_contents(__DIR__ . '/../../data/stat.json'), true);

            $data['total_tasks_created']++;

            file_put_contents(__DIR__ . '/../../data/stat.json', json_encode($data));

            //message succes creation
            $_SESSION['success'] = "Tâche ajoutée avec succès";
            exit;
        }
    }

    //Supprimer une tache
    public function delete(){
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $this->taskService->deleteTask($id);

            //message success supression tache
            $_SESSION['success'] = "Tâche supprimée";
            exit;
        }
    }

    //Modifier statut
    public function updateStatus(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $statut = $_POST['statut'];

            $this->taskService->updateStatus($id, $statut);

            //message succes MAJ
            $_SESSION['success'] = "Statut mis à jour";
            exit;
        }
    }
}