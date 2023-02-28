<?php 

include_once('../mascotas.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add pet</title>
</head>
<body>
    

<form action='../../php/views/vista_mascotas.php' method="post">
<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="">
<br>
<br>
<label for="raza">Raza</label>
<input type="text" name="raza" id="">
<br>
<br>
<label for="edad">Edad</label>
<input type="text" name="edad" id="">
<br>
<br>
<button type="submit" class="add">Añadir mascota</button>

</form>


