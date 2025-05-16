<?php

//El objetivo de este archivo es cambiar el estado de la cita a Ended



include_once('../../config/bd.php');
include_once('../../classes/Cita.php');
$conexionBD = BD::crearInstancia();

Cita::finalizarCita($conexionBD);
