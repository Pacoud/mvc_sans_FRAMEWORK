<?php
// app/models/Task.php
class Task {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=mvc_example', 'root', '');
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