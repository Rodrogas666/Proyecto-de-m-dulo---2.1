<?php
include('../templates/header.php');

?>  
<link rel="stylesheet" href="../../css/agregar_mascotas.css">
    <div class="container-form">
        <div class="info-form">
            <h2>Registra a tu mascota</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eligendi est voluptates quae ipsam eius, in
                quasi odio porro aut vel beatae aperiam.</p>
            <img src="../../src/img/f1280x720-966888_1098563_7846.jpg" alt="" id="wenamechi">
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