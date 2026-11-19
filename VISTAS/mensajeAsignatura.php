<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje</title>
    <link rel="stylesheet" href="../VISTAS/estilo.css">
    <link rel="stylesheet" href="../VISTAS/estiloListado.css">
</head>
<body>
    <header>
        <h1>ASIGNATURAS</h1>
    </header>
    <main>
        <p><?php echo $datos; ?></p>
        <a class="boton" href="index.php?controlador=CAsignatura&metodo=listarAsignaturas">Volver al listado</a>
    </main>
</body>
</html>
