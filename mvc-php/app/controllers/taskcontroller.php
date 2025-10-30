
<?php
require_once '../app/models/task.php';

class TaskController {
    private $taskModel;

    public function __construct() {
        $this->taskModel = new Task();
    }

    public function index() {
        $tasks = $this->taskModel->getAllTasks();
        require '../app/views/tasklist.php';
    }

    public function addTask($taskName) {
        $this->taskModel->addTask($taskName);
        header('Location: /');
    }

    public function deleteTask($taskId) {
        $this->taskModel->deleteTask($taskId);
        header('Location: /');
    }
}