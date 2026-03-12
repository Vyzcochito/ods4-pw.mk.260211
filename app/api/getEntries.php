<?php
require_once __DIR__ . '/../model/DescargaModel.php';

header('Content-Type: application/json');

$datos = DescargaModel::obtenerTodas();

echo json_encode($datos);
?>