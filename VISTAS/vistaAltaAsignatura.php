<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de asignatura</title>
    <link rel="stylesheet" href="../VISTAS/estilo.css">
</head>
<body>
    <header>
        <h1>ALTA DE ASIGNATURAS</h1>
    </header>
    <main>
        <form action="index.php?controlador=CAsignatura&metodo=guardarAsignatura" method="POST">
            <input type="text" class="corto" name="nombre" placeholder="Nombre">
            <input type="text" class="corto" name="codigo" placeholder="Código" maxlength="5">

            <select name="idClase" class="corto">
                <?php
                    while($fila=$cAsignatura->clases->fetch_array()){
                        echo "<option value='" . $fila['idClase'] . "'>" . $fila['nombre'] . "</option>";
                    }
                ?>
            </select>

            <select name="idProfesor" class="corto">
                <?php
                    while($fila=$cAsignatura->profesores->fetch_array()){
                        echo "<option value='" . $fila['idProfesor'] . "'>" . $fila['nombre'] . "</option>";
                    }
                ?>
            </select>

            <input type="submit" value="Guardar">
        </form>
    </main>
</body>
</html>
