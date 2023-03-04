<?php

//El objetivo de este archivo es cambiar el estado de la cita a Ended

$idCita = $_GET['id'];


include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();


$sql = "UPDATE CITAS SET estado='Done' WHERE id_cita = $idCita";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();

echo "<script>
alert('Cita terminada :)')
window.location.href = '/veterinario/php/dashboard_citas_accepted.php'
</script>"
?>