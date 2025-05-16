<?php
session_start();

include_once('../../config/bd.php');
include_once('../../classes/Veterinario.php');
$conexionBD = BD::crearInstancia();

Veterinario::inviteVeterinarioCita($conexionBD);
?>