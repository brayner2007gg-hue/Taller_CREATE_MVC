
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
</head>
<body>

    <h1>Listado de productos</h1>

    <p>
        <a href="<?= BASE_URL ?>/productos/crear">
            Crear producto
        </a>
    </p>

    <?php if (isset($_GET['guardado'])): ?>
        <p>Producto registrado correctamente.</p>
    <?php endif; ?>

    <?php if (empty($productos)): ?>

        <p>No hay productos registrados.</p>

    <?php else: ?>

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= (int) $producto['id'] ?></td>

                        <td>
                            <?= htmlspecialchars(
                                $producto['nombre'],
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>
                        </td>

                        <td>
                            $<?= number_format(
                                (float) $producto['precio'],
                                2,
                                ',',
                                '.'
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</body>
</html>
