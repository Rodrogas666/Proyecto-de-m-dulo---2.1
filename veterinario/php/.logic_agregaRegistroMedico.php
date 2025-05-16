<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    include_once('../../config/bd.php');
    include_once('../../classes/RegistroMedico.php');

    $conexionBD = BD::crearInstancia();


    RegistroMedico::agregarRegistroMedico($conexionBD);
}
