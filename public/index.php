
<?php

define('BASE_URL', '/Taller_CREATE_MVC/public');

require_once __DIR__ . '/../controllers/ProductoController.php';

$method = $_SERVER['REQUEST_METHOD'];

$rutaCompleta = parse_url(
    $_SERVER['REQUEST_URI'],
    PHP_URL_PATH
);

// Quitar el prefijo del proyecto si está presente
$prefijo = BASE_URL;

if (strpos($rutaCompleta, $prefijo) === 0) {
    $uri = substr($rutaCompleta, strlen($prefijo));
} else {
    $uri = $rutaCompleta;
}

$uri = rtrim($uri, '/') ?: '/';

if ($method === 'GET' && $uri === '/productos') {
    $controller = new ProductoController();
    $controller->index();

} elseif ($method === 'GET' && $uri === '/productos/crear') {
    $controller = new ProductoController();
    $controller->crear();

} elseif ($method === 'POST' && $uri === '/productos') {
    $controller = new ProductoController();
    $controller->guardar();

} else {
    http_response_code(404);
    echo 'Página no encontrada. Ruta recibida: ' . htmlspecialchars($uri);
}
