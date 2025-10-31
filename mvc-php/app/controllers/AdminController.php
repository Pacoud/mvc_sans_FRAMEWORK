<?php

require_once __DIR__ . '/../models/User.php';

class AdminController {
    private $userModel;

    public function __construct() {
        // Protéger la page d'administration
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: /');
            exit;
        }
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require __DIR__ . '/../views/admin.php';
    }

    public function deleteUser($id) {
        // Empêcher l'admin de se supprimer lui-même
        if ($id == $_SESSION['user_id']) {
            header('Location: /admin?error=self_delete');
            return;
        }
        
        $this->userModel->deleteUser($id);
        header('Location: /admin');
    }
}
