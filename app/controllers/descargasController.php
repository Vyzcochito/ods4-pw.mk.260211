<?php
echo "INICIO";
require_once __DIR__ . '/../model/DescargaModel.php';

header('Content-Type: application/json');

$contenido = $_POST['contenido'] ?? '';
$usuario_id = $_POST['usuario_id'] ?? null;

if (!$contenido || !$usuario_id) {
    echo json_encode(["success" => false, "debug" => $_POST]);
    exit;
}

DescargaModel::guardar($contenido, $usuario_id);

echo json_encode(["success" => true]);
?>