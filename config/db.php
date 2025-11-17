<?php
class Database {
    public static function conectar() {
        $conexion = new mysqli("localhost", "root", "", "citas_medicas");
        $conexion->set_charset("utf8");
        return $conexion;
    }
}
?>