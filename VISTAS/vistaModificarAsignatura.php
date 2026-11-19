<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar asignatura</title>
    <link rel="stylesheet" href="../VISTAS/estilo.css">
</head>
<body>
    <header>
        <h1>MODIFICAR ASIGNATURA</h1>
    </header>
    <main>
        <form action="index.php?controlador=CAsignatura&metodo=modificarAsignatura" method="POST">
            <input type="hidden" name="id" value="<?php echo $cAsignatura->asignatura['idAsignatura']; ?>"> <!--campo invisible para el id de la asignatura-->
            <input type="text" class="corto" name="nombre" placeholder="Nombre" value="<?php echo $cAsignatura->asignatura['nombre']; ?>">
            <input type="text" class="corto" name="codigo" placeholder="Código" maxlength="5" value="<?php echo $cAsignatura->asignatura['codigo']; ?>">

            <select name="idClase" class="corto">
                <?php
                    while($fila=$cAsignatura->clases->fetch_array()){
                        $seleccionada="";
                        if($fila['idClase']==$cAsignatura->asignatura['idClase']){//dejo marcada la clase actual
                            $seleccionada=" selected";
                        }
                        echo "<option value='" . $fila['idClase'] . "'" . $seleccionada . ">" . $fila['nombre'] . "</option>";
                    }
                ?>
            </select>

            <select name="idProfesor" class="corto">
                <?php
                    while($fila=$cAsignatura->profesores->fetch_array()){
                        $seleccionada="";
                        if($fila['idProfesor']==$cAsignatura->asignatura['idProfesor']){//dejo marcado el profesor actual
                            $seleccionada=" selected";
                        }
                        echo "<option value='" . $fila['idProfesor'] . "'" . $seleccionada . ">" . $fila['nombre'] . "</option>";
                    }
                ?>
            </select>

            <input type="submit" value="Guardar cambios">
        </form>
    </main>
</body>
</html>
