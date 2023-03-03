<?php

include_once('../../user/php/templates/header.php');
include_once('mis_citas_vet.php');

?>

<div>
    <div>MIS CITAS ACEPTADAS</div>
    <br>
    <br>
    <div class="">
    <?php foreach ($vetCitas as $cita) { ?>
        <div>
        <p><?php echo $cita['estado'] ?></p>
        <p><?php echo $cita['asunto'] ?></p>
        <p><?php echo $cita['mensaje'] ?></p>
        <p><?php echo $cita['fecha'] ?></p>
        <p><?php echo $cita['nombre'] ?></p>
        <br>
        <br>
        </div>
            
    <?php } ?>
    </div>
</div>