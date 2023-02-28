<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles_citas.css">
    <title>Document</title>
</head>

<body>
    <div class="padre">
        <div class="agregar-cita">
            <div class="text1">
                <h1>Mis citas</h1>
                <p>Check and filter all your medical appoiments here</p>
            </div>
            <div class="boton-citas">
                <button id="bt1">Agregar cita</button>
                <button id="bt2">Cita de emergencia</button>
            </div>
        </div>
        <div class="tabla">
            <div class="titulos">
                <h4>Status</h4>
                <h4>Tipo de cita</h4>
                <h4>Fecha/Tiempo</h4>
                <h4>Asunto</h4>
                <h4>Doctor</h4>
                <h4>eliminar</h4>
            </div>
            <div class="celda">
                <p>Pendiente</p>
                <p>Rapida</p>
                <p>20/03/2023</p>
                <p>C cayo</p>
                <p>Quinter god</p>
                <button id="eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</body>

</html>