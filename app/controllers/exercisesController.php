<?php
require_once __DIR__ . '/../model/DescargaModel.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contenido = $_POST['contenido'] ?? '';

    if ($contenido != '') {
        DescargaModel::guardar($contenido);
    }
    exit;
}


$descargas = DescargaModel::obtenerTodas();


require __DIR__ . '/../views/exercises.php';
?>