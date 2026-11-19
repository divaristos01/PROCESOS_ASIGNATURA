<?php
class Conexion{
    private $servidor='localhost';
    private $usuario='root';
    private $password='';
    private $bbdd='horario3';
    public $conexion;

    public function __construct(){
        $this->conexion=new mysqli($this->servidor, $this->usuario, $this->password, $this->bbdd);
    }
}
?>