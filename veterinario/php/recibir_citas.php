<?php

include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();

session_start();

// $listaCitas = $conexionBD->query("SELECT * FROM citas");
// $clienteCitas = $listaCitas->fetchAll();

$sql2 = "SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota INNER JOIN mascota ON mascota.id = citas.id_mascota";
$consulta = $conexionBD->prepare($sql2);
$consulta->execute();
$clienteCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);

// print_r($clienteCitas);


?>