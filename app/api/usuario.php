<?php
require_once '../controllers/UsuarioController.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'register':
        UsuarioController::register();
        break;

    case 'login':
        UsuarioController::login();
        break;

    default:
        echo json_encode(["success" => false, "message" => "Acción no válida"]);
}
?>