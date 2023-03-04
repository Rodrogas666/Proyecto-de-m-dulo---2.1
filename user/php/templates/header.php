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
        <div class="hader">
            <div class="logo">
                <img src="../templates/img/Mew.png" alt="" id="img-h">
            </div>
            <?php

            session_start();

            if(!isset($_SESSION['usuario'])&& !isset($_SESSION['veterinario']) && !in_array(basename($_SERVER['PHP_SELF']), array('home.php', 'about_us.php', 'form_register.php', 'form_login.php'))){
                header("Location: ../views/form_login.php");
                exit();
            }

            if (isset($_SESSION['usuario'])) { ?>
                <div class="info-h">
                <a href="../views/home.php">Home</a>
                <a href="../views/about_us.php">Sobre nosotros</a>
                <a href="../views/vista_citas.php">Citas</a>
                <a href="../views/vista_mascotas.php">Mascotas</a>
                </div>
                <div class="boton-h">
                <a href="../session/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            <?php }
            else if (isset($_SESSION['veterinario'])) { ?>
                <div class="info-h">
                <a href="../../veterinario/php/dashboard.php">Todas las citas</a>
                <a href="../../veterinario/php/dashboard_citas_accepted.php">Citas aceptadas</a>
                </div>
                <div class="boton-h">
                <a href="../../user/php/session/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            <?php } 
            else if (!isset($_SESSION['usuario']) || !isset($_SESSION['veterinario'])) {  ?>
                <div class="info-h">
                <a href="../views/home.php">Home</a>
                <a href="../views/about_us.php">Sobre nosotros</a>
                </div>
                <div class="boton-h">
                <a href="../views/form_login.php">Iniciar sesión</a>
                <div class="boton-h2">
                <a href="../views/form_register.php">Registrarse</a>
                </div>
                </div>
            <?php } ?>

            
            
        </div>
    </nav>
</header>