
<?php
include('../templates/header.php');
include('../mascotas.php');

?>
<link rel="stylesheet" href="../../css/style_mascosta_vista.css">
    <div class="Father">
        <br>
        <div class="titulo">
            <h2>Tus mascotas</h2>
            <b><input type="submit" value="Agregar mascotas"></b>
        </div>
        <div class="sub">
        <?php foreach($listaMascotas as $mascota){ ?>
            <div class="cards">
                <H3><?php echo $mascota['nombre']?></H3>
                <img src="../../src/img/Perrito.jpg" alt="" id="perro">
                <div class="texto">
                <p><b>Detalles</b></p>
                <p>Especie: <?php echo $mascota['especie']?></p>
                <p>Raza: <?php echo $mascota['raza']?></p>
                <p>Genero: <?php echo $mascota['genero']?></p>
                </div>  
                <br>
                <div class="botones">
                    <button id="b1"><b>Editar</b></button>
                    <button id="b2"><b>Eliminar</b></button>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
<?php
include('../templates/footer.php');

?>
</body>
</html>