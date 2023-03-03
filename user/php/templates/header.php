<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styles_index.css">
    <title>Veterinaria</title>
</head>


<body>

<header>
    <nav>
        <div>

            <?php

            session_start();

            if (isset($_SESSION['usuario'])) { ?>
                <a href="../views/home.php">Home</a>
                <a href="#">Sobre nosotros</a>
                <a href="../views/vista_citas.php">Citas</a>
                <a href="../views/vista_mascotas.php">Mascotas</a>
                <a href="../session/cerrar_sesion.php">Cerrar sesión</a>
            <?php }
            else if (isset($_SESSION['veterinario'])) { ?>
                <a href="../../veterinario/php/dashboard.php">Todas las citas</a>
                <a href="../../veterinario/php/dashboard_citas_accepted.php">Citas aceptadas</a>
                <a href="../../user/php/session/cerrar_sesion.php">Cerrar sesión</a>
            <?php } 
            else if (!isset($_SESSION['usuario']) || !isset($_SESSION['veterinario'])) {  ?>
                <a href="../views/home.php">Home</a>
                <a href="#">Sobre nosotros</a>
                <a href="../views/form_login.php">Iniciar sesión</a>
                <a href="../views/form_register.php">Registrarse</a>
            <?php } ?>

            
            
        </div>
    </nav>
</header>