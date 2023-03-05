<?php

include_once('../../user/php/templates/header.php');
include_once('mis_citas_vet.php');

?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .titulo{
        font-weight: bold;
    }
    .contenedor_citas{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
    }
    .citas{
        border: 1px solid black;
        padding: 1rem;
        margin: 1rem;
        border-radius: 10px;
    }
    .main{
        margin: 2rem;
    }
</style>
<div class="main">
    <div>
        <h1 class="titulo">MIS CITAS ACEPTADAS</h1>
    </div>
    <br>
    <br>
    <div class="contenedor_citas">
    <?php foreach ($vetCitas as $cita) { ?>
        <div class="citas">
            <p><?php echo $cita['estado'] ?></p>
            <p><?php echo $cita['asunto'] ?></p>
            <p><?php echo $cita['fecha'] ?></p>
            <p><?php echo $cita['nombre'] ?></p>
            <br>
            <br>
            <a href=".logic_finalizarCita.php?id=<?=$cita['id_cita']?>"> Finalizar cita</a>
        </div>
            
    <?php } ?>
    </div>
</div>
<?php

include_once('../../user/php/templates/footer.php');

?>