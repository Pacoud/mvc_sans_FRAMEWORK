<?php

// Verbose pour le débogage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../app/controllers/taskcontroller.php';

$controller = new TaskController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['taskName'])) {
    $controller->addTask($_POST['taskName']);
} elseif (isset($_GET['id'])) {
    $controller->deleteTask($_GET['id']);
} else {
    $controller->index();
}