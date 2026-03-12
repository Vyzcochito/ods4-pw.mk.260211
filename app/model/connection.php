<?php

class Connection {
    public static function connect() {
        $host = "localhost:3307";
        $usuario = "root";
        $password = "";
        $bd = "bienestar";

        $connection = new mysqli($host, $usuario, $password, $bd);

        if ($connection->connect_error) {
            die("Error de conexión: " . $connection->connect_error);
        }

        return $connection;
    }
}
?>