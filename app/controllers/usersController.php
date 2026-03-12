<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['accion'] === 'registro') {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $apodo = $_POST['apodo'];
    $password = $_POST['password'];

    UsuarioModel::registrar($nombre, $correo, $apodo, $password);

    echo "ok";
    exit;
}
?>