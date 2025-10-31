
<?php
require_once __DIR__ . '/../models/task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        $username = $_SESSION['username'] ?? 'Invité';
        $isAdmin = ($_SESSION['role'] ?? 'user') === 'admin';
        require '../app/views/tasklist.php';
    }

    public function addTask($taskName) {
// ... existing code ...
        $this->taskModel->addTask($taskName);
        header('Location: /');
    }

    public function deleteTask($taskId) {
        $this->taskModel->deleteTask($taskId);
        header('Location: /');
    }
}