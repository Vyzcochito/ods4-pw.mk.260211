<?php
require_once 'Connection.php';

class DescargaModel {

    public static function guardar($contenido) {
        $connection = Connection::connect();

        $stmt = $connection->prepare("INSERT INTO descargas (contenido) VALUES (?)");
        $stmt->bind_param("s", $contenido);
        $stmt->execute();

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