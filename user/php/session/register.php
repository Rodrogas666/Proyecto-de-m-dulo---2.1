<?php

session_start();
include_once '../../../config/bd.php';
include_once '../../../classes/Cliente.php';
//Hace la conexión a la base de datos

$conexionBD = BD::crearInstancia();

Cliente::registrar($conexionBD);

?>