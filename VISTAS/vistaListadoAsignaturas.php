<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaturas</title>
    <link rel="stylesheet" href="../VISTAS/estilo.css">
    <link rel="stylesheet" href="../VISTAS/estiloListado.css">
</head>
<body>
    <header>
        <h1>ASIGNATURAS</h1>
    </header>
    <main>
        <a class="boton" href="index.php?controlador=CAsignatura&metodo=pedirAlta">Nueva asignatura</a>

        <table>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                <th>Clase</th>
                <th>Profesor</th>
                <th>Acciones</th>
            </tr>
            <?php while($fila=$datos->fetch_array()){ ?>
                <tr>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['codigo']; ?></td>
                    <td><?php echo $fila['clase']; ?></td>
                    <td><?php echo $fila['profesor']; ?></td>
                    <td>
                        <a href="index.php?controlador=CAsignatura&metodo=pedirModificar&id=<?php echo $fila['idAsignatura']; ?>">Modificar</a>
                        <a href="index.php?controlador=CAsignatura&metodo=eliminarAsignatura&id=<?php echo $fila['idAsignatura']; ?>" onclick="return confirm('¿Eliminar la asignatura?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>
