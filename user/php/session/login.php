<?php

include_once '../../../config/bd.php';
include_once '../../../classes/Cliente.php';
//Hace la conexión a la base de datos
$conexionBD = BD::crearInstancia();

Cliente::login($conexionBD);

/*
if ($_POST) {
$name = $_POST['name'];
$password = $_POST['password'];
// echo $name;
// echo $password;
$con = mysqli_connect("localhost", "root", "", "testing");
$sql = "INSERT INTO `infoUsuario` (`idUsuario`, `name`, `password`) VALUES (NULL, '$name', '$password')";
$resultado  = mysqli_query($con, $sql);
mysqli_close($con);
}
/*
?>
/*$sql = "SELECT * FROM cursos WHERE id=:id";
$consulta = $conexionBD->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();
$curso=$consulta->fetch(PDO::FETCH_ASSOC); */

?>
