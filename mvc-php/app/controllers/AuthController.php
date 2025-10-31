<?php

require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showLoginForm() {
        require '../app/views/login.php';
    }

    public function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: /');
        } else {
            // Gérer l'erreur de connexion
            header('Location: /login?error=1');
        }
    }

    public function showRegisterForm() {
        require '../app/views/register.php';
    }

    public function register() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($this->userModel->findByUsername($username)) {
            // L'utilisateur existe déjà
            header('Location: /register?error=1');
            return;
        }

        if ($this->userModel->createUser($username, $password)) {
            header('Location: /login');
        } else {
            // Gérer l'erreur d'inscription
            header('Location: /register?error=2');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
    }
}
