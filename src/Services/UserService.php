<?php

namespace src\Services;

use src\Models\User;

class UserService {
    private $userModel;

    public function __construct($db){
        $this->userModel = new User($db);
    }

    public function login($email, $mot_de_passe){
        return $this->userModel->login($email,$mot_de_passe);
    }

}