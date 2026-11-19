<?php
    require_once '../configdb.php';

    class Profesores extends Conexion{
        public function mostrarProfesores(){
            $sql="SELECT idProfesor, nombre FROM profesores ORDER BY nombre";
            return $this->conexion->query($sql);
        }
    }
?>
