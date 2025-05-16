<?php

include_once('../../config/bd.php');
include_once('../../classes/Cita.php');
$conexionBD = BD::crearInstancia();

$vetCitas = Cita::obtenerCitasTaken($conexionBD);

?>