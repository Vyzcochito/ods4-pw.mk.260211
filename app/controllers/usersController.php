<?php
require_once __DIR__ . '/../model/UsuarioModel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $accion = $_POST['accion'] ?? '';

    // 🔷 REGISTRO
    if ($accion === 'registro') {

        $nombre = $_POST['nombre'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $apodo = $_POST['apodo'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!$nombre || !$correo || !$apodo || !$password) {
            echo json_encode(["success" => false, "message" => "Datos incompletos"]);
            exit;
        }

        // 🔐 hash
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $resultado = UsuarioModel::registrar($nombre, $correo, $apodo, $passwordHash);

        echo json_encode(["success" => $resultado]);
        exit;
    }

    // 🔷 LOGIN
    if ($accion === 'login') {

        $apodo = $_POST['apodo'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = UsuarioModel::buscarPorApodo($apodo);

        if ($usuario && password_verify($password, $usuario['password'])) {

            echo json_encode([
                "success" => true,
                "usuario" => [
                    "id" => $usuario['id'],
                    "apodo" => $usuario['apodo']
                ]
            ]);

        } else {
            echo json_encode(["success" => false]);
        }

        exit;
    }
}
?>