<?php

require_once __DIR__ . '/../config/Database.php';

class Producto
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->conectar();
    }

    
    public function obtenerTodos()
    {
        $sql = "SELECT * FROM productos ORDER BY id DESC";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();

        return $consulta->fetchAll();
    }

    
    public function guardar($nombre, $precio)
    {
        $sql = "INSERT INTO productos (nombre, precio)
                VALUES (:nombre, :precio)";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':precio', $precio);

        return $consulta->execute();
    }
}