<?php

include_once('../../../config/bd.php');
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

// session_start();
$id_cliente = $_SESSION['usuario'];

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

            $ultimo_id_mascota = $conexionBD->lastInsertId();

            $sql2 = "INSERT INTO clientemascotas (id, id_mascota, id_cliente) VALUES(NULL, :id_mascota, :id_cliente)";
            $consulta2 = $conexionBD->prepare($sql2);
            $consulta2->bindParam(':id_mascota', $ultimo_id_mascota);
            $consulta2->bindParam(':id_cliente', $id_cliente);
            $consulta2->execute();

            header("Location: vista_mascotas.php");
    } else {
        echo "Llena todo";
    }
}

// $consulta = $conexionBD->prepare("SELECT * FROM clientemascotas");
// $consulta->execute();
// $listaMascotas = $consulta->fetchAll();

$consulta = $conexionBD->prepare("SELECT * FROM `clientemascotas` INNER JOIN mascota ON clientemascotas.id_mascota = mascota.id WHERE id_cliente = $id_cliente");
$consulta->execute();
$listaMascotas = $consulta->fetchAll();

//ver registro médico
//lleva a otra págiana y ahí te salen los datos de las mascotas

?>
