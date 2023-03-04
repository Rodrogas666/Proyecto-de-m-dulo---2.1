<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/agregar_mascotas.css">
    <title>Document</title>
</head>
<body>
<?php
include('../templates/header.php');

?>
    <div class="container-form">
        <div class="info-form">
            <h2>Registra a tu mascota</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eligendi est voluptates quae ipsam eius, in
                quasi odio porro aut vel beatae aperiam.</p>
            <img src="../src/img/f1280x720-966888_1098563_7846.jpg" alt="" id="wenamechi">
        </div>
        <div class="for">
            <form action="#">
                <input type="text" name="nombre" placeholder="El nombre" class="campo">
                <input type="number" name="email" placeholder="La edad" class="campo">
                <input type="text" name="raza" placeholder="La raza" class="campo">
                <input type="submit" name="enviar" value="Enviar" class="btn-enviar">
            </form>
        </div>
    </div>
<?php
include('../templates/footer.php');

?>
</body>
</html>