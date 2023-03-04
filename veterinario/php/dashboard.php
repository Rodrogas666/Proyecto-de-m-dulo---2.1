<?php

include_once('../../user/php/templates/header.php');
include_once('recibir_citas.php');

?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .titulo {
        font-weight: bold;
    }

    .contenedor_citas {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }

    .citas {
        border: 1px solid black;
        padding: 1rem;
        margin: 1rem;
        border-radius: 10px;
    }

    .main {
        margin: 2rem;
    }
</style>

<div>
    <div>
        <h1 class="titulo">CITAS DE LOS CLIENTES</h1>
    </div>
    <br>
    <br>
    <div class="contenedor_citas">
        <?php foreach ($clienteCitas as $cita) { ?>
            <form class="citas" action="dashboard.php" method="post">
                <p><?php echo $cita['estado'] ?></p>
                <p><?php echo $cita['asunto'] ?></p>
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