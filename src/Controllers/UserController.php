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

            if($user){
                session_start();
                $_SESSION['user'] = $user;
                header('LOCATION: dashboard.php');
            }else{
                echo"Email ou mot de passe incorrect";
            }
        }

    }
}