<?php

include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();

$id_veterinario = $_SESSION['veterinario'];

$sql = "SELECT * FROM `veterinariocitas` INNER JOIN citas ON veterinariocitas.id_cita = citas.id_cita INNER JOIN mascota ON mascota.id = citas.id_mascota";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$vetCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);


?>