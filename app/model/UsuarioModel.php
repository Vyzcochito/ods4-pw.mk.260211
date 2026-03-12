<?php
require_once 'connection.php';

class UsuarioModel {

    public static function registrar($nombre, $correo, $apodo, $password) {
        $connection = Connection::connect();

        $stmt = $connection->prepare(
            "INSERT INTO usuarios (nombre, correo, apodo, password)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param("ssss", $nombre, $correo, $apodo, $password);
        $resultado = $stmt->execute();

        $stmt->close();
        $connection->close();

        return $resultado;
    }

    public static function buscarPorApodo($apodo) {
        $connection = Connection::connect();

        $stmt = $connection->prepare(
            "SELECT * FROM usuarios WHERE apodo = ?"
        );

        $stmt->bind_param("s", $apodo);
        $stmt->execute();

        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        $stmt->close();
        $connection->close();

        return $usuario;
    }
}
?>