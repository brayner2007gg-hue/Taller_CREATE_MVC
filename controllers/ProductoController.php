
<?php

require_once __DIR__ . '/../models/Producto.php';

class ProductoController
{
    private $producto;

    public function __construct()
    {
        $this->producto = new Producto();
    }

    
    public function index()
    {
        $productos = $this->producto->obtenerTodos();

        require __DIR__ . '/../views/productos/index.php';
    }

    
    public function crear()
    {
        require __DIR__ . '/../views/productos/crear.php';
    }

    
    public function guardar()
    {
        $nombre = trim($_POST['nombre'] ?? '');
        $precio = $_POST['precio'] ?? '';

        // Validar los datos recibidos
        if (
            $nombre === '' ||
            !is_numeric($precio) ||
            $precio < 0
        ) {
            http_response_code(400);
            echo 'Error: ingresa un nombre y un precio válido.';
            return;
        }

        // Enviar los datos al modelo
        $resultado = $this->producto->guardar(
            $nombre,
            $precio
        );

        
        if ($resultado) {
            header(
                'Location: ' . BASE_URL . '/productos?guardado=1'
            );
            exit;
        }

        http_response_code(500);
        echo 'No se pudo registrar el producto.';
    }
}
