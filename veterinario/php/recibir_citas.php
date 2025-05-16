<?php

include_once('../../config/bd.php');
include_once('../../classes/Cita.php');
include_once('../../classes/Veterinario.php');


$conexionBD = BD::crearInstancia();

// $id_veterinario = $_SESSION['veterinario'];

// $sql2 = "SELECT * FROM `veterinario` WHERE id = $id_veterinario";
// $consulta2 = $conexionBD->prepare($sql2);
// $consulta2->execute();
$veterinario = Veterinario::getVeterinarioLogged($conexionBD);



//Para traer todas las citas no tomadas con el nombre de la mascota
// $sql = "SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota INNER JOIN mascota ON mascota.id = citas.id_mascota WHERE estado = 'Not taken'";
// $consulta = $conexionBD->prepare($sql);
// $consulta->execute();
$clienteCitas = Cita::obtenerCitasNotTaken($conexionBD);

// print_r($clienteCitas);


$sql3 = "SELECT COUNT(*) FROM `citas` WHERE estado = 'Not taken'";
$consulta3 = $conexionBD->prepare($sql3);
$consulta3->execute();
$allCitas = $consulta3->fetch(PDO::FETCH_ASSOC);


Veterinario::tomarCitaVeterinario($conexionBD, $veterinario[0]['id']);

?>