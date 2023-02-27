<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>

<body>
    REGISTER
    <br><br>
    <form action="../session/register.php" method="post">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="nombre">
        <br><br>
        <label for="password">Apellido</label>
        <input type="text" name="apellido" id="apellido" placeholder="apellido">
        <br><br>
        <label for="password">Correo</label>
        <input type="text" name="correo" id="correo" placeholder="correo">
        <br><br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="contraseña">
        <br><br>

        <br><br>

        <button type="submit">Iniciar sesión</button>
    </form>

</body>

</html>