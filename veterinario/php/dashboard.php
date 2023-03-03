<?php

include_once('../../user/php/templates/header.php');
include_once('recibir_citas.php');

?>


    <div>
        <div>CITAS DE LOS CLIENTES</div>
        <br>
        <br>
        <div class="citas">
        <?php foreach ($clienteCitas as $cita) { ?>
            <form action="dashboard.php" method="post">
                <p><?php echo $cita['estado'] ?></p>
                <p><?php echo $cita['asunto'] ?></p>
                <p><?php echo $cita['mensaje'] ?></p>
                <p><?php echo $cita['fecha'] ?></p>
                <p><?php echo $cita['nombre'] ?></p>
                
                <input type="hidden" name="id" value="<?php echo $cita['id_cita'] ?>">
                <button type="submit" name="accion" value="agregar">Agregar cita</button>
                <br>
                <br>
                <br>
            </form>
        <?php } ?>
        </div>
    </div>


<?php

include_once('../../user/php/templates/footer.php');

?>    