<?php

include_once('../../../config/bd.php');
include_once('../../../classes/Cliente.php');
include_once('../../../classes/Mascota.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();


// session_start();
$_SESSION['usuario'];

$cliente = new Cliente();

$cliente->setId($_SESSION['usuario']);

$listaMascotas = $cliente->getMascotas($conexionBD);

// $consulta = $conexionBD->prepare("SELECT * FROM clientemascotas");
// $consulta->execute();
// $listaMascotas = $consulta->fetchAll();

Mascota::operaciones($conexionBD, $cliente->getId());

//ver registro médico
//lleva a otra págiana y ahí te salen los datos de las mascotas

?>
