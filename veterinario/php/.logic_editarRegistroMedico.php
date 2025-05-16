<?php

/*
        document.getElementById("enfermedades").value = registro.enfermedades
        document.getElementById("examenes").value = registro.examenes
        document.getElementById("medicamentos").value = registro.medicamentos
        document.getElementById("resultados").value = registro.resultados
        document.getElementById("idMascota").value = registro.idMascota
        document.getElementById("idRegistro").value = registro.idRegistro

*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include_once('../../config/bd.php');
        include_once('../../classes/RegistroMedico.php');

        $conexionBD = BD::crearInstancia();

        RegistroMedico::editarRegistroMedico($conexionBD);
}
