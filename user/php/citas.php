<?php

include_once('../../../config/bd.php');
include_once('../../../classes/Cita.php');
include_once('../../../classes/Cliente.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

$cliente = new Cliente();

$cliente->setId($_SESSION['usuario']); 

Cita::operaciones($conexionBD);

// $sql="SELECT * FROM alumnos WHERE id = :id_cliente";
// $consulta = $conexionBD->prepare($sql);
// $consulta->bindParam(':id_cliente', $id_cliente);
// $consulta=$conexionBD->prepare($sql);
// $consulta->execute();
// $clientes=$consulta->fetchAll(PDO::FETCH_ASSOC);


// $listaClientes=$conexionBD->query($sql);
// $clientes=$listaAlumnos->fetchAll();





// $sql1 = "SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $id_cliente";
// $listaClienteMascotas = $conexionBD->query($sql1);
// $clientemascotas = $listaClienteMascotas->fetchAll();
$clientemascotas =  $cliente->getMascotas($conexionBD); 

// print_r($clientemascotas);

// $sql2 = "SELECT * FROM `citas` WHERE id_cliente = $id_cliente";
// $consulta = $conexionBD->prepare($sql2);
// $consulta->execute();
// $clienteCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);

// print_r($clienteCitas);
//SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota WHERE citas.id_cliente = 1

$clienteCitas = Cita::obtenerCitasPorCliente($conexionBD, $cliente);


// print_r($clientemascotas);
// echo '<pre>';
// var_dump($clientemascotas);
// echo '</pre>';
// echo "<br>";


// $listaMascotas=$conexionBD->query($sql2);
// $mascotas=$listaMascotas->fetchAll();
// $sql2="SELECT * FROM mascota WHERE id = 1";
// $consulta = $conexionBD->prepare($sql2);
// $consulta->execute();
// $mascotas = $consulta->fetch(PDO::FETCH_ASSOC);

// print_r($mascotas);
