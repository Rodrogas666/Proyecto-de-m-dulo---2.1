<?php
include_once '../../../classes/Cliente.php';

Cliente::cerrar_sesion();

header('Location:../views/form_login.php');


?>