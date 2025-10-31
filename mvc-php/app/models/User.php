<?php

require_once __DIR__ . '/../../config/database.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findByUsername($username) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        return $stmt->execute([$username, $hashedPassword]);
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query('SELECT id, username, role, created_at FROM users ORDER BY created_at DESC');
        return $stmt->fetchAll();
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
