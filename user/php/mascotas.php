<?php

include_once('../../../config/bd.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

if ($_POST) {

    if ($_POST['nombre']!= '' || $_POST['raza']!= ''|| $_POST['edad']!= '') {

            $nombre = $_POST['nombre'];
            $raza = $_POST['raza'];

            $edad = $_POST['edad'];

            $sql = "INSERT INTO mascota (id, nombre, raza, edad) VALUES(NULL, :nombre, :raza, :edad)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':raza', $raza);
            $consulta->bindParam(':edad', $edad);
            $consulta->execute();
    } else {
        echo "Llena todo";
    }
}

$consulta = $conexionBD->prepare("SELECT * FROM mascota");
$consulta->execute();
$listaMascotas = $consulta->fetchAll();

//ver registro médico
//lleva a otra págiana y ahí te salen los datos de las mascotas

?>
