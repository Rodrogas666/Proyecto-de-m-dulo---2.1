<?php

$conexionBD = BD::crearInstancia();


$idRegistroMedico = $_GET['id']

$sqlResult = "SELECT * FROM registro_medico WHERE id = $idRegistroMedico";
$sqlResult = $db->query($sqlResult)
$sqlResult=$sqlResult->fetch_assoc()

//SQL RESULT LO PUEDEN LLAMAR REGISTRO MEDICO PORQ YA TIENE LOS DATOS FETCHEADOS DE LA BD//



$consulta = $conexionBD->prepare();
$consulta->execute();

$listaMascotas = $consulta->fetchAll();

?>

