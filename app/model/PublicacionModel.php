<?php
require_once 'connection.php';

class PublicacionModel {

    public static function guardar($texto, $usuario_id) {
        $connection = Connection::connect();

        $stmt = $connection->prepare(
            "INSERT INTO publicaciones (texto, fecha, usuario_id)
             VALUES (?, NOW(), ?)"
        );

        $stmt->bind_param("si", $texto, $usuario_id);

        if (!$stmt->execute()) {
            die("Error SQL: " . $stmt->error);
        }

        $stmt->close();
        $connection->close();
    }

    public static function obtenerTodas() {
        $connection = Connection::connect();

        $query = "
            SELECT p.texto, p.fecha, u.apodo
            FROM publicaciones p
            INNER JOIN usuarios u ON p.usuario_id = u.id
            ORDER BY p.fecha DESC
        ";

        $result = $connection->query($query);

        $datos = [];

        while ($fila = $result->fetch_assoc()) {
            $datos[] = $fila;
        }

        $connection->close();
        return $datos;
    }
}
?>