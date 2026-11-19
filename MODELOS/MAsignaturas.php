<?php
    require_once '../configdb.php';

    class Asignaturas extends Conexion{
        public function mostrarAsignaturasPorClase($clase){
            $sql="SELECT * FROM asignaturas WHERE idClase='$clase'";
            $resultado=$this->conexion->query($sql);
            return $resultado;
        }

        public function mostrarTodas(){//TODAS LAS ASIGNATURAS CON EL NOMBRE DE SU CLASE Y DE SU PROFESOR
            $sql="SELECT a.idAsignatura, a.nombre, a.codigo, c.nombre AS clase, p.nombre AS profesor
                  FROM asignaturas a
                  JOIN clases c ON c.idClase=a.idClase
                  JOIN profesores p ON p.idProfesor=a.idProfesor
                  ORDER BY c.nombre, a.nombre";
            return $this->conexion->query($sql);
        }

        public function obtenerAsignatura($id){
            $sql="SELECT * FROM asignaturas WHERE idAsignatura='$id'";
            $resultado=$this->conexion->query($sql);
            return $resultado;
        }

        public function insertarAsignatura($nombre, $codigo, $idProfesor, $idClase){
            $sql="INSERT INTO asignaturas (nombre, codigo, idProfesor, idClase) VALUES ('$nombre', '$codigo', '$idProfesor', '$idClase')";
            $this->conexion->query($sql);
            return $this->conexion->affected_rows;
        }

        public function modificarAsignatura($id, $nombre, $codigo, $idProfesor, $idClase){
            $sql="UPDATE asignaturas SET nombre='$nombre', codigo='$codigo', idProfesor='$idProfesor', idClase='$idClase' WHERE idAsignatura='$id'";
            $this->conexion->query($sql);
            return $this->conexion->affected_rows;//0 SI NO HAS CAMBIADO NINGUN DATO, -1 SI FALLA
        }

        public function eliminarAsignatura($id){
            $sql="DELETE FROM asignaturas WHERE idAsignatura='$id'";
            $this->conexion->query($sql);
            return $this->conexion->affected_rows;//-1 SI FALLA (POR EJEMPLO, SI TIENE HORARIOS)
        }
    }
?>
