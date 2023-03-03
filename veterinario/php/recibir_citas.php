<?php

include_once('../../config/bd.php');
$conexionBD = BD::crearInstancia();

$id_veterinario = $_SESSION['veterinario'];


//Para traer todas las citas no tomadas con el nombre de la mascota
$sql = "SELECT * FROM `clientemascotas` INNER JOIN citas ON clientemascotas.id_mascota = citas.id_mascota INNER JOIN mascota ON mascota.id = citas.id_mascota WHERE estado = 'Not taken'";
$consulta = $conexionBD->prepare($sql);
$consulta->execute();
$clienteCitas = $consulta->fetchAll(PDO::FETCH_ASSOC);

// print_r($clienteCitas);

if ($_POST) {
    $id_cita = isset($_POST['id']) ? $_POST['id'] : '';
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    $estado = 'Taken';


    if ($accion != '') {

        if ($accion == 'agregar') {
            
            $sql2 = "UPDATE citas SET estado = :estado WHERE id_cita=:id";
            $consulta2 = $conexionBD->prepare($sql2);
            $consulta2->bindParam(':id', $id_cita);
            $consulta2->bindParam(':estado', $estado);
            $consulta2->execute();

            $sql3 = "INSERT INTO veterinariocitas (id, id_veterinario, id_cita) VALUES (NULL, :id_veterinario, :id_cita)";
            $consulta3 = $conexionBD->prepare($sql3);
            $consulta3->bindParam(':id_veterinario', $id_veterinario);
            $consulta3->bindParam(':id_cita', $id_cita);
            $consulta3->execute();
        }
    }

    echo $id_cita;

    

}


?>