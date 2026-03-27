<?php
require_once __DIR__ . '/../model/DescargaModel.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contenido = $_POST['contenido'] ?? '';
    $usuario_id = $_POST['usuario_id'] ?? null;

    if ($contenido != '') {
        DescargaModel::guardar($contenido, $usuario_id);
    }
    exit;
}


$descargas = DescargaModel::obtenerTodas();


require __DIR__ . '/../views/exercises.php';
?>