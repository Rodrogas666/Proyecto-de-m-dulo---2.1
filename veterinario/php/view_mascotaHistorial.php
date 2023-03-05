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
                <img src="img/Mew.png" alt="" id="img-h">
            </div>
            <?php

            session_start();

            if(!isset($_SESSION['usuario']) && !isset($_SESSION['veterinario']) && !in_array(basename($_SERVER['PHP_SELF']), array('home.php', 'about_us.php', 'form_register.php', 'form_login.php'))){
                header("Location: ../views/form_login.php");
                exit();
            }

            if (isset($_SESSION['usuario'])) { ?>
                <div class="info-h">
                <a href="../../user/php/views/home.php">Home</a>
                <a href="../../user/php/views/about_us.php">Sobre nosotros</a>
                <a href="../../user/php/views/vista_citas_usuario.php">Citas</a>
                <a href="../../user/php/views/mascota_vista.php">Mascotas</a>
                </div>
                <div class="boton-h">   
                <a href="../session/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            <?php }
            else if (isset($_SESSION['veterinario'])) { ?>
                <div class="info-h">
                <a href="../../veterinario/php/dashboard.php">Citas pendientes</a>
                <a href="../../veterinario/php/dashboard_citas_accepted.php">Citas aceptadas</a>
                <a href="../../veterinario/php/view_ended_citas.php">Citas Finalizadas</a>
                <a href="../../veterinario/php/view_mascotas.php">Registro medico</a>    
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

<?php

include_once('_data_registroMedicoMascota.php');
include("./.logic_editarRegistroMedico.php");


?>
<link rel="stylesheet" href="../../user/css/styles_index.css">
<style>
    .hidden{
        display: none;
    }
    .bg-black {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.20);
    }

    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        min-width: 300px;
    }

    .popup-text {
        outline: none;
        border: 1px solid gray;
        border-radius: 8px;
        padding: 0.3rem;
    }

    .popup-header {
        display: flex;
        justify-content: space-between;
    }

    .popup-quit {
        cursor: pointer;
    }



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
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .main {
        margin: 2rem;
    }

    .btn-medico {
        padding: 0.7rem;
        border-radius: 8px;
        color: white;
        border: 1px solid white;
        text-decoration: none;
        background-color: #000000;
        transition: ease-in 100ms;
    }

    .btn-medico:hover {
        color: black;
        background-color: white;
        border: 1px solid black;
    }

    .btns {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
</style>
<div class="main">
    <div>
        <h1 class="titulo">¡Observe el registro médico!</h1>
    </div>
    <br>
    <br>
    <div class="contenedor_citas">

        <?php if (empty($registrosMedicos)) { ?>
            <p>No hay registros médicos para esta mascota</p>
        <?php  } ?>
        <?php foreach ($registrosMedicos as $registro) { ?>
            <div class="citas">
                <p> <span style="font-weight:700;">Exámenes:</span> <?php echo $registro['examenes'] ?></p>
                <p> <span style="font-weight:700;">Resultados:</span> <?php echo $registro['resultados'] ?></p>
                <p> <span style="font-weight:700;">Enfermedades:</span> <?php echo $registro['enfermedades'] ?></p>
                <p> <span style="font-weight:700;">Medicamentos:</span> <?php echo $registro['medicamentos'] ?></p>
                <br>

                <?php if (isset($_SESSION['veterinario'])) { ?>
                <div class="btns">
                    
                <button onclick="showPopup({
                        examenes: `<?= $registro['examenes'] ?>`,
                        resultados: `<?= $registro['resultados'] ?>`,
                        enfermedades: `<?= $registro['enfermedades'] ?>`,
                        medicamentos: `<?= $registro['medicamentos'] ?>`,
                        idMascota: <?= $registro['id_mascota'] ?>,
                        idRegistro: <?= $registro['id'] ?>
                    })">
                    Editar
                </button>
                    <a href="_logic_eliminarRegistroMascota.php?id_mascota=<?=$registro['id_mascota'] ?>&id_registro=<?=$registro['id'] ?>">Eliminar</a>
                </div>

                <?php } ?>
            </div>

        <?php } ?>
    </div>
</div>

<div class="hidden bg-black"></div>
<div class="hidden" id="popup">
    <form class="popup-content" method='post'>
        <div class="popup-header">
            <span></span>
            <p class="popup-quit" onclick="quitPopup()">X</p>
        </div>
        <label for="">Exámenes</label>
        <input required   class="popup-text" id="examenes" name="examenes" type="text" placeholder="Examenes: -Examen1 -Examen2 -Examen3">

        <label for="">Resultados</label>
        <input required class="popup-text" id="resultados" name="resultados" type="text" placeholder="Resultados: -Resultado1 -Resultado2 -Resultado3">

        <label for="">Enfermedades</label>
        <input required class="popup-text" id="enfermedades" name="enfermedades" type="text" placeholder="Enfermedades: -Enfermedade1 -Enfermedade2 -Enfermedade3">

        <label for="">Medicamentos</label>
        <input required class="popup-text" id="medicamentos" name="medicamentos" type="text" placeholder="Medicamentos: -Medicamento1 -Medicamento2 -Medicamento3">

        <input hidden type="text" name="id_mascota" id="idMascota">
        <input hidden type="text" name="id_registro" id="idRegistro">
        <input type="submit" value="Editar reporte medico">
    </form>

</div>

<script>
    function showPopup(registro) {
        const popup = document.querySelector("#popup")
        const blackScreen = document.querySelector(".bg-black")



        document.getElementById("enfermedades").value = registro.enfermedades
        document.getElementById("examenes").value = registro.examenes
        document.getElementById("medicamentos").value = registro.medicamentos
        document.getElementById("resultados").value = registro.resultados
        document.getElementById("idMascota").value = registro.idMascota
        document.getElementById("idRegistro").value = registro.idRegistro

        popup.classList.remove("hidden");
        blackScreen.classList.remove("hidden");
    }

    function quitPopup() {
        const popup = document.querySelector("#popup")
        const blackScreen = document.querySelector(".bg-black")

        popup.classList.add("hidden");
        blackScreen.classList.add("hidden");
    }
</script>


<?php

include_once('../../user/php/templates/footer.php');

?>