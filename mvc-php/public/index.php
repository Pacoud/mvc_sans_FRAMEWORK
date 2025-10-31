<?php
session_start();

// Verbose pour le débogage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/controllers/taskcontroller.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

// Routes non protégées
if ($request_uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new AuthController())->showLoginForm();
    exit;
}
if ($request_uri === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new AuthController())->login();
    exit;
}
if ($request_uri === '/register' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    (new AuthController())->showRegisterForm();
    exit;
}
if ($request_uri === '/register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new AuthController())->register();
    exit;
}
if ($request_uri === '/logout') {
    (new AuthController())->logout();
    exit;
}

// Middleware de protection
if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

// Routes protégées
$taskController = new TaskController();

if ($request_uri === '/' || $request_uri === '/index.php') {
    $taskController->index();
} elseif ($request_uri === '/add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskController->addTask($_POST['taskName']);
} elseif ($request_uri === '/delete' && isset($_GET['id'])) {
    $taskController->deleteTask($_GET['id']);
} 
// Routes Admin
elseif ($request_uri === '/admin') {
    (new AdminController())->index();
} elseif ($request_uri === '/admin/delete' && isset($_GET['id'])) {
    (new AdminController())->deleteUser($_GET['id']);
}
else {
    http_response_code(404);
    echo "Page non trouvée";
}