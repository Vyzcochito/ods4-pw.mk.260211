<?php
require_once __DIR__ . '/../model/PublicacionModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['accion'] ?? '';

    if ($accion === 'crear') {

        $texto = $_POST['texto'] ?? '';
        $usuario_id = $_POST['usuario_id'] ?? null;

        if (!$texto || !$usuario_id) {
            echo json_encode(["success" => false]);
            exit;
        }

        PublicacionModel::guardar($texto, $usuario_id);

        echo json_encode(["success" => true]);
        exit;
    }

    if ($accion === 'listar') {

        $datos = PublicacionModel::obtenerTodas();
        echo json_encode($datos);
        exit;
    }
}
?>