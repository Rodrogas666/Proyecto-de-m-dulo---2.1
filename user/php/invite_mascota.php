<?php

session_start();
include_once('../../config/bd.php');
include_once('../../classes/Cliente.php');
include_once('../../classes/Mascota.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();


// session_start();
$_SESSION['usuario'];

$cliente = new Cliente();
$mascota = new Mascota();

$cliente->setId($_SESSION['usuario']);
$mascota->setId($_GET['id_mascota']);

Mascota::agregar_mascota_cliente($conexionBD, $mascota, $cliente);
