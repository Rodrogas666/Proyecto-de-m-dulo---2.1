<?php 

include_once('../mascotas.php');
include_once('../templates/header.php');

?>



<table>
    <tr>
        <th>Número</th>
        <th>Nombre</th>
        <th>Raza</th>
        <th>Edad</th>
    </tr>
    <tr> 
    <?php foreach($listaMascotas as $mascota){ ?>
        <th><?php echo $mascota['id']?></th>
        <th><?php echo $mascota['nombre']?></th>
        <th><?php echo $mascota['raza']?></th>
        <th><?php echo $mascota['edad']?></th>
    </tr>
    <?php }?>
</table>
<br><br>
<a name="" id="" class="btn btn-primary" href="form_agregar_mascota.php" role="button">Añadir mascota?</a>


<?php
include_once('../templates/footer.php');

?>

