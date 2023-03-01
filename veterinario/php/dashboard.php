<?php

include_once('recibir_citas.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div>
        <div>CITAS DE LOS CLIENTES</div>
        <br>
        <br>
        <div class="citas">
        <?php foreach ($clienteCitas as $cita) { ?>
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
</body>
</html>