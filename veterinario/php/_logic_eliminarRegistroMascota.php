<?php
session_start();


if (isset($_SESSION['veterinario'])) {


    include_once('../../config/bd.php');
    include_once('../../classes/RegistroMedico.php');
    $conexionBD = BD::crearInstancia();
    RegistroMedico::eliminarRegistroMedico($conexionBD);
}
