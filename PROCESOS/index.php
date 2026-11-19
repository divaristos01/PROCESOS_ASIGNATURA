<?php
    $controlador=$_GET["controlador"];
    $metodo=$_GET["metodo"];

    require_once "../CONTROLADORES/" . $controlador . ".php";

    $cAsignatura=new $controlador();
    $datos=$cAsignatura->$metodo();

    include $cAsignatura->vista;
?>
