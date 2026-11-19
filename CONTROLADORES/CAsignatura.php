<?php
    require_once "../MODELOS/MClases.php";
    require_once "../MODELOS/MProfesores.php";
    require_once "../MODELOS/MAsignaturas.php";
    require_once "../MODELOS/MClases.php";

    class CAsignatura{
        public $vista;
        public $clases;//LISTA DE CLASES PARA EL DESPLEGABLE
        public $profesores;//LISTA DE PROFESORES PARA EL DESPLEGABLE
        public $asignatura;//DATOS DE LA ASIGNATURA QUE SE VA A MODIFICAR

        private function cargarListas(){
            $objMClase=new Clases();
            $objMProfesor=new Profesores();

            $this->clases=$objMClase->mostrarDatos();
            $this->profesores=$objMProfesor->mostrarProfesores();
        }

        public function listarAsignaturas(){
            $objMAsignatura=new Asignaturas();

            $this->vista="../VISTAS/vistaListadoAsignaturas.php";
            return $objMAsignatura->mostrarTodas();
        }

        public function pedirAlta(){
            $this->cargarListas();

            $this->vista="../VISTAS/vistaAltaAsignatura.php";
        }

        public function guardarAsignatura(){
            $objMAsignatura=new Asignaturas();

            $nombre=$_POST['nombre'];
            $codigo=$_POST['codigo'];
            $idProfesor=$_POST['idProfesor'];
            $idClase=$_POST['idClase'];

            $this->vista="../VISTAS/mensajeAsignatura.php";
            if($nombre=="" || $codigo==""){
                return "Rellena el nombre y el código.";
            }
            if($objMAsignatura->insertarAsignatura($nombre, $codigo, $idProfesor, $idClase)>0){
                return "Asignatura guardada correctamente.";
            }
            return "No se ha podido guardar la asignatura.";
        }

        public function pedirModificar(){
            $objMAsignatura=new Asignaturas();

            $this->asignatura=$objMAsignatura->obtenerAsignatura($_GET['id'])->fetch_array();
            $this->cargarListas();

            $this->vista="../VISTAS/vistaModificarAsignatura.php";
        }

        public function modificarAsignatura(){
            $objMAsignatura=new Asignaturas();

            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $codigo=$_POST['codigo'];
            $idProfesor=$_POST['idProfesor'];
            $idClase=$_POST['idClase'];

            $this->vista="../VISTAS/mensajeAsignatura.php";
            if($nombre=="" || $codigo==""){
                return "Rellena el nombre y el código.";
            }
            if($objMAsignatura->modificarAsignatura($id, $nombre, $codigo, $idProfesor, $idClase)>=0){
                return "Asignatura modificada correctamente.";
            }
            return "No se ha podido modificar la asignatura.";
        }

        public function eliminarAsignatura(){
            $objMAsignatura=new Asignaturas();

            $this->vista="../VISTAS/mensajeAsignatura.php";
            if($objMAsignatura->eliminarAsignatura($_GET['id'])>0){
                return "Asignatura eliminada correctamente.";
            }
            return "No se ha podido eliminar la asignatura. Puede que tenga horarios asociados.";
        }
    }
?>
