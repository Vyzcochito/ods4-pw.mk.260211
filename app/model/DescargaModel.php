<?php
require_once 'connection.php';

class DescargaModel {

public static function guardar($contenido, $usuario_id) {
    $connection = Connection::connect();

    $stmt = $connection->prepare(
        "INSERT INTO descargas (contenido, fecha, usuario_id)
         VALUES (?, NOW(), ?)"
    );

    $stmt->bind_param("si", $contenido, $usuario_id);

    if (!$stmt->execute()) {
        die("Error SQL: " . $stmt->error);
    }

    $stmt->close();
    $connection->close();
}

    public static function obtenerTodas() {
        $connection = Connection::connect();

        $result = $connection->query("SELECT * FROM descargas ORDER BY fecha DESC");

        $datos = [];

        while ($fila = $result->fetch_assoc()) {
            $datos[] = $fila;
        }

        $connection->close();
        return $datos;
    }
}
?>