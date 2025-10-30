<?php
// app/models/Task.php
class Task {
    private $db;

    public function __construct() {
        # Configuration de la base de données
        $host= '127.0.0.1';
        $dbname= 'db_gwenole';
        $user = 'root';
        $password = 'mdp';
        $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    }

    public function getAllTasks() {
        $query = $this->db->prepare("SELECT * FROM tasks");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($taskName) {
        $query = $this->db->prepare("INSERT INTO tasks (name) VALUES (:name)");
        $query->bindParam(':name', $taskName);
        $query->execute();
    }

    public function deleteTask($taskId) {
        $query = $this->db->prepare("DELETE FROM tasks WHERE id = :id");
        $query->bindParam(':id', $taskId);
        $query->execute();
    }
}