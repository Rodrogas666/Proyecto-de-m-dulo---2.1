<?php

include_once('../../user/php/templates/header.php');
include_once('recibir_citas.php');

?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .titulo {
        font-weight: bold;
        padding-left: 2rem;
        padding-top: 2rem;
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

    .btn-agregar{
        margin-top: 1rem;
        border-radius: 5px;
        border: none;
        width: 5.8rem;
        height: 37px;
        color: white;
        cursor: pointer;
        transition: 0.5s;
        background-color: #45C676;
        transition: 0.5s;
    }

    .btn-agregar:hover{
        background-color: #ffffff;
        border: solid 2px #45C676;
        color: #45C676;
    }
</style>

<div>
    <div>
        <h1 class="titulo">Citas de los clientes</h1>
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
                <button type="submit" name="accion" value="agregar" class="btn-agregar">Agregar cita</button>
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