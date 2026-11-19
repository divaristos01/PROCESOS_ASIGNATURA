<?php
    require_once '../configdb.php';

    class Clases extends Conexion{
        public function mostrarDatos(){
            $sql="SELECT * FROM clases";
            $resultado=$this->conexion->query($sql);
            return $resultado;
        }

        public function conseguirNombre($clase){
            $sql="SELECT nombre FROM clases WHERE idClase='$clase'";
            $resultado=$this->conexion->query($sql);
            $fila=$resultado->fetch_array();
            return $fila['nombre'];
        }
    }
?>