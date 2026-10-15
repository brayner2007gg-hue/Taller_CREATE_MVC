
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar producto</title>
</head>
<body>

    <h1>Registrar producto</h1>

    <form action="<?= BASE_URL ?>/productos" method="POST">

        <label for="nombre">Nombre:</label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ingrese el nombre"
            maxlength="100"
            required
        >

        <br><br>

        <label for="precio">Precio:</label>

        <input
            type="number"
            id="precio"
            name="precio"
            placeholder="Ingrese el precio"
            min="0"
            step="0.01"
            required
        >

        <br><br>

        <button type="submit">Guardar</button>

    </form>

    <p>
        <a href="<?= BASE_URL ?>/productos">
            Volver al listado
        </a>
    </p>

</body>
</html>
