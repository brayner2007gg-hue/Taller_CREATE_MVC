<?php

class Database
{
    private $conexion;

    public function __construct()
    {
        $rutaEnv = dirname(__DIR__) . '/.env';

        if (!file_exists($rutaEnv)) {
            throw new RuntimeException('No se encontró el archivo .env');
        }

        $variables = parse_ini_file($rutaEnv);

        if ($variables === false) {
            throw new RuntimeException('No se pudo leer el archivo .env');
        }

        $host = $variables['DB_HOST'];
        $puerto = $variables['DB_PORT'];
        $baseDatos = $variables['DB_NAME'];
        $usuario = $variables['DB_USER'];
        $contrasena = $variables['DB_PASSWORD'];

        $dsn = "mysql:host=$host;port=$puerto;dbname=$baseDatos;charset=utf8mb4";

        $this->conexion = new PDO(
            $dsn,
            $usuario,
            $contrasena,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public function conectar()
    {
        return $this->conexion;
    }
}