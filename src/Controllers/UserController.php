<?php

namespace src\Controllers;

use src\Services\UserService;

class UserController{
    private $userService;

    public function __construct($db)
    {
        $this->userService = new UserService($db);
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];
            $password = $_POST['mot_de_passe'];

            $user = $this->userService->login($email,$password);
            //DEBUG RAPIDE verifie si password_verify fonctionne 
            //var_dump($user); die();

            if($user){
                
                $_SESSION['utilisateur'] = $user;
                header('LOCATION: index.php?action=dashboard');
                exit;

            }else{
                echo"Email ou mot de passe incorrect";
            }
        }else{
            //Affiche le formulaire    
            require __DIR__ . '/../Views/login.php';
        }
    }
    

    public function logout(){
        session_start();
        session_destroy();

        header("Location: index.php");
        exit;
    }
}