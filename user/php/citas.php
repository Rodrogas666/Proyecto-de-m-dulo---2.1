<?php

include_once '../../config/bd.php';
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();


$asunto = isset($_POST['asunto']) ? $_POST['asunto'] : '';
$fecha_hora = isset($_POST['fecha']) ? $_POST['fecha'] : '';



?>