<?php
require_once '../controllers/PublicacionController.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'crear':
        PublicacionController::crear();
        break;

    case 'listar':
        PublicacionController::listar();
        break;

    default:
        echo json_encode(["success" => false]);
}
?>