<?php
require_once 'Conexion.php';

class UsuarioModel {

    public static function registrar($nombre, $correo, $apodo, $password) {
        $conexion = Conexion::conectar();

        $stmt = $conexion->prepare(
            "INSERT INTO usuarios (nombre, correo, apodo, password)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param("ssss", $nombre, $correo, $apodo, $password);
        $resultado = $stmt->execute();

        $stmt->close();
        $conexion->close();

        return $resultado;
    }

    public static function buscarPorApodo($apodo) {
        $conexion = Conexion::conectar();

        $stmt = $conexion->prepare(
            "SELECT * FROM usuarios WHERE apodo = ?"
        );

        $stmt->bind_param("s", $apodo);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        $stmt->close();
        $conexion->close();

        return $usuario;
    }
}
?>