<?php

include('../templates/header.php');
include('../citas.php');

?>

<div>
    <div>
        <div>Tus citas</div>
        <div>
            <a href="form_agregar_cita.php"><button>Agregar cita</button></a>
        </div>
        <br><br><br>
        <div class="citas">
            <?php foreach ($clienteCitas as $cita) { ?>
                <div>
                <p>Cita común</p>
                <p><?php echo $cita['estado'] ?></p>
                <p><?php echo $cita['asunto'] ?></p>
                <p><?php echo $cita['mensaje'] ?></p>
                <p><?php echo $cita['fecha'] ?></p>
                <br>
                <br>
            </div>
            
            <?php } ?>
            
            <br><br>
        </div>
    </div>
</div>

<?php  include('../templates/footer.php');  ?>